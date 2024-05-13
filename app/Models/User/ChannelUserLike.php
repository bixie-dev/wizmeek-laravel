<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelUserLike extends Model
{
    use HasFactory;

    protected $table = 'channel_user_likes';
    protected $guarded = false;
}
