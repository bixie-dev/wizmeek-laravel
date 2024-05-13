<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\ChatMessage;
use App\Models\User\ChannelUserLike;
use App\Models\Admin\RepeatRequest;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function chatMessages() {
        return $this->hasMany(ChatMessage::class, 'channel_id');
    }

    public function hasLikes(){
        return $this->hasMany(ChannelUserLike:: class, 'channel_id');
    }

    public function repeat_requests()
    {
        return $this->hasMany(RepeatRequest::class, 'channel_id');
    }
}
