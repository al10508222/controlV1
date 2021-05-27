<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserExternal extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $guard = 'external';

    const ACTIVATED = 1;
    const DESACTIVE = 0;

    protected $fillable = [
        'email',
        'active'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'password'
    ];

}
 