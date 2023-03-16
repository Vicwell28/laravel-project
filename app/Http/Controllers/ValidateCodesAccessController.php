<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ValidateCodesAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class ValidateCodesAccessController extends Controller
{
    public function store(Request $request)
    {
        //1
        $user = Auth::user();

        $myUrl = URL::temporarySignedRoute('token', now()->addMinutes(1), ['user' => $user->id]);

        $data = array(
            'url' => $myUrl,
            'name' => $user->name,
            'email' => $user->email
        );

        Mail::send('components.mail-body', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])
                ->subject('Codigo de seguridad');
        });

        return view("mailview", ['user_id' => $user->id]);
    }



    public function store_validate(Request $request)
    {
        //4
        $user = User::find(intval($request->input('user_id')));

        $token = [
            $request->input('uno'),
            $request->input('dos'),
            $request->input('tres'),
            $request->input('cuatro'),
            $request->input('cinco'),
            $request->input('seis'),
        ];

        if (count($token) != 6) {
            return view("mailview", ['user_id' => $user->id]);
        }

        if (!$user) {
            return view("mailview", ['user_id' => $user->id]);
        }

        $user_token = $user->validateCodesAccess->first();

        if ($user_token){
            if ($user_token->access_code_type_id != 1) {
                return view("mailview", ['user_id' => $user->id]);
            }
        } else {
            return view("mailview", ['user_id' => $user->id]);
        }

        if (password_verify(implode("", $token), $user_token->code)) {
            Session::put('token', $user_token->code);
            return redirect('dashboard');
        }

        return view("mailview", ['user_id' => $user->id]);
    }



    public function show($user) {

        //2
        $user = User::find(intval($user));

        if (!$user) {
            return "NO SE ENCONRO AL USIARO";
        }

        $numero_aleatorio_str = strval(mt_rand(100000, 999999));

        $numero_aleatorio_array = str_split($numero_aleatorio_str);

        $numero_aleatorio_encriptada = password_hash($numero_aleatorio_str, PASSWORD_DEFAULT);

        $token = $user->validateCodesAccess->first();

        if ($token) {
            $token->code = $numero_aleatorio_encriptada;
            $token->access_code_type_id = 2;
            $token->user_id = $user->id;
            $token->save();
        } else {
            ValidateCodesAccess::create([
                'code' => $numero_aleatorio_encriptada,
                'access_code_type_id' => 2,
                'user_id' => $user->id
            ]);
        }

        return view('token-code', ['data' => $numero_aleatorio_array]);
    }


    public function store_validate_movil(Request $request)
    {
        //3
        $requestCode = $request->code;

        $allCodes = ValidateCodesAccess::all();


        foreach ($allCodes as $code) {

            if (password_verify($requestCode, $code->code)) {

                $user = User::find(intval($code->user_id));

                if (!$user) {
                    return "NO SE ENCONRO AL USIARO";
                }

                $numero_aleatorio_str = strval(mt_rand(100000, 999999));

                $numero_aleatorio_encriptada = password_hash($numero_aleatorio_str, PASSWORD_DEFAULT);

                $token = $user->validateCodesAccess->first();

                if ($token) {
                    $token->code = $numero_aleatorio_encriptada;
                    $token->access_code_type_id = 1;
                    $token->user_id = $user->id;
                    $token->save();
                } else {
                    ValidateCodesAccess::create([
                        'code' => $numero_aleatorio_encriptada,
                        'access_code_type_id' => 1,
                        'user_id' => $user->id
                    ]);
                }

                return $numero_aleatorio_str;
            }
        }
        return "codigo mal";
    }
}
