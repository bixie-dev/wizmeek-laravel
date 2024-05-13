<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admin\Channel;
use App\Models\Admin\Eac;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    public function favoriteChannels() {
        return $this->belongsToMany(Channel::class, 'channel_user_likes', 'user_id', 'channel_id');
    }

    public function following() {
        return $this->belongsToMany(User::class, 'user_follows', 'user_id', 'follow_id');
    }
    public function followers() {
        return $this->belongsToMany(User::class, 'user_follows', 'follow_id', 'user_id');
    }
    public function eac() {
        return $this->hasOne(Eac::class, 'user_id', 'id');
    }
}
