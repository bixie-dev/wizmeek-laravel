<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* Models */
use App\Models\User;
use App\Models\Admin\Channel;

class RepeatRequest extends Model
{
    use HasFactory;
    protected $table = 'repeat_requests';
    protected $guarded = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function channel(){
        return $this->belongsTo(Channel::class, 'channel_id');
    }
}
