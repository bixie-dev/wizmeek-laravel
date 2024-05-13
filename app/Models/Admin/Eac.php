<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Eac extends Model
{
    use HasFactory;

    protected $table = 'eacs';

    protected $guarded = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function users_multiple_reg(){
        return $this->hasMany(User::class, 'promo_code');
    }
}
