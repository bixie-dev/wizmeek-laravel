<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Channel;

class RepeatRequest extends Model
{
    use HasFactory;

    protected $table = 'repeat_request_by_channel';
    protected $guarded = false;

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }
}
