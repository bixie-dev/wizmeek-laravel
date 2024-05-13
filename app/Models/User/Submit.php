<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Submits\Genre;
use App\Models\User;

class Submit extends Model
{
    use HasFactory;

    protected $table = 'submits';
    protected $guarded = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genre() {
        return $this->belongsToMany(Genre::class, 'submits_genres', 'submit_id', 'genre_id');
    }
}
