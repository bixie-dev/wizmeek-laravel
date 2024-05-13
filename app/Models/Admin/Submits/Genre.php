<?php

namespace App\Models\Admin\Submits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Submit;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';
    protected $guarded = false;

    public function submits() {
        return $this->belongsToMany(Submit::class, 'submits_genres', 'genre_id', 'submit_id');
    }
}
