<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\TokenMail;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {

        //     $user = Auth::user();

        //     $myUrl = URL::temporarySignedRoute('token', now()->addMinutes(1), ['user' => $user->id]);

        //     $data = array(
        //         'url' => $myUrl,
        //         'name' => $user->name,
        //         'email' => $user->email
        //     );

        //     Mail::send('components.mail-body', $data, function ($message) use ($data) {
        //         $message->to($data['email'], $data['name'])
        //                 ->subject('Codigo de seguridad');
        //     });

        //     return view("mailview", ['user_id' => $user->id]);

        //     // $token = $user->createToken('MyApp')->accessToken;
        //     // return response()->json(['token' => $token], 200);
        // }


        // NO SE HAN PROPORCONADO CREDENCIALES CORRECTAS.

        $credentials = $request->only('email', 'password');

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::VERIFY_CODE)->with(['email' => $credentials["email"], 'password' => $credentials["password"]]);;
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
