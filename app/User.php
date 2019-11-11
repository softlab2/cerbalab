<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_roles');
    }
 
    public function getDiscount(){
        $roleDiscount = 0;
        if($this->roles->count()){
            foreach ($this->roles as $role) {
                if($role->getDiscount() > $roleDiscount){
                    $roleDiscount = $role->getDiscount();
                }
            }
        }
        if($roleDiscount > $this->discount){
            return $roleDiscount;
        }else{
            return $this->discount;
        }
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
 
    public function hasRole($check)
    {
        return in_array($check, $this->roles()->pluck('name')->toArray());
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }
                                                                                                
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }
     
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Mail\Notifications\ResetPasswordNotification($token));
    }
}
