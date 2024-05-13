<?php

namespace App\Models\Admin\Submits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitsGenres extends Model
{
    use HasFactory;

    protected $table = 'submits_genres';
    protected $guarded = false;
}
