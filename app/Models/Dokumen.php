<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    protected $guarded = ['id'];
    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }
    public function verifikasi()
    {
        return $this->hasMany(Verifikasi::class);
    }
}
