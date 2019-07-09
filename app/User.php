<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'is_active', 'name', 'email', 'password', 'typeable_id', 'typeable_type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserAvatarAttribute()
    {
        return asset('storage/'.$this->avatar);
    }
    
    public function typeable()
    {
        return $this->morphTo();
    }

    public function isActive()
    {
        return $this->is_active;
    }

    public function owner()
    {
        return $this->typeable();
    }

    public function user_type()
    {
        if ($this->typeable_type === "App\SuperAdmin") {
            return "Administrator";
        }elseif($this->typeable_type === "App\Employee"){
            return "Employee";
        }
    }

    public function sent_message(){
        return $this->hasMany('App\Employee');
    }

    public function inbox_message(){
        return $this->hasMany('App\Employee');
    }

    public function draft_message(){
        return $this->hasMany('App\Employee');
    }

    public function unread_inbox_message(){
        return $this->hasMany('App\Employee');
    }
}
