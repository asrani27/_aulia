<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $table = 'evaluasi';
    protected $guarded = ['id'];

    public function verifikasi()
    {
        return $this->belongsTo(Verifikasi::class);
    }
}
