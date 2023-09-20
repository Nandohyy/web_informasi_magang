<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pekerjaan',
        'perusahaan',
        'departemen',
        'deskripsi',
        'kualifikasi',
        'lokasi',
        'tanggal_buka',
        'tanggal_tutup'
    ];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class);
    }
}
