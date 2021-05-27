<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserProfile;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;
    protected $table="users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $with = ['GetProfile'];

    protected $fillable = [
        'username',
        'profile_id',
        'has_two_fa',
        'name',
        'last_name',
        'second_lastname',
        'email',
        'password',
    ];

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function GetProfile()
    {
        return $this->hasOne(UserProfile::class,'id','profile_id');
    }
    
    public function profile(){
        return $this->hasOne('App\Models\UserProfile','id','profile_id');
    }

    public function projects(){
        return $this->belongsToMany('App\Models\Project', 'user_projects', 'user_id', 'project_id');
    }

    public function getPermissions(){
        $auth_role = UserProfile::where('id',$this->profile_id)->with('permissions')->first();
        $perms = []; 
        foreach($auth_role->permissions as $perm){
            array_push($perms,$perm->key);
        }
        return $perms;
    }

    public function hasPermissions($req_keys){
        $user_perms = $this->getPermissions();
        $has_all = true;
        foreach($req_keys as $req_perm){
            if( !in_array($req_perm,$user_perms) ){
                $has_all = false;
            }
        }
        return $has_all;
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('username', 'like', '%' . $search . '%');
                    $q->orWhere('name', 'like', '%' . $search . '%');
                    $q->orWhere('last_name', 'like', '%' . $search . '%');
                    $q->orWhere('second_lastname', 'like', '%' . $search . '%');
                    $q->orWhere('email', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
