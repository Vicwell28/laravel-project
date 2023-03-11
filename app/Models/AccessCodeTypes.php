<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessCodeTypes extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'access_code_type';

    protected $fillable = ['name'];


    public function validateCodesAccess()
    {
        return $this->hasMany(ValidateCodesAccess::class);
    }
}
