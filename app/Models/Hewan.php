<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Hewan extends Model
{

    protected $table = 'hewan'; 
     protected $fillable = [
        'nama',
        'jenis',
        'usia' => 'integer',
        'jenis_kelamin',
        'deskripsi',
        'gambar',
        'status', // Tambahkan kolom 'status' di sini
    ];
}
