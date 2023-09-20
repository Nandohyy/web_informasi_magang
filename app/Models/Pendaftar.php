<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'loker_id',
        'nama_lengkap',
        'asal_sekolah',
        'domisili',
        'email',
        'nohp',
        'cv'
    ];

    public function loker()
    {
        return $this->belongsTo(Loker::class);
    }
}
