<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $guarded = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
