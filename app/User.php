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
        'name', 'email', 'password', 'typeable_id', 'typeable_type'
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
        }
    }
}
