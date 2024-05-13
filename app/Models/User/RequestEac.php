<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Eac;

class RequestEac extends Model
{
    use HasFactory;

    protected $table = 'request_eacs';
    protected $guarded = false;

    public function eac() {
        return $this->belongsTo(Eac::class, 'eac_id', 'id');
    }
}
