<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutFile extends Model
{
    use HasFactory;

    protected $fillable = ['signature_md5', 'path', 'auth_user', 'type'];
}
