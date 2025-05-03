<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    protected $table = 'verifikasi';
    protected $guarded = ['id'];
    
    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }
}
