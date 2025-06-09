<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use Illuminate\Http\Request;

class HewanController extends Controller
{

 public function index()
    {
        // Mengambil semua data dari tabel 'hewans' menggunakan Model Hewan
        // Ini akan mengembalikan Laravel Collection berisi objek Hewan
        $hewans = Hewan::all();

        // Mengirim variabel $hewans ke view 'user.hewan'
        // Pastikan path view sesuai dengan lokasi file .blade.php Anda
        return view('user.hewan', compact('hewans'));
        // Alternatif lain untuk mengirim data:
        // return view('user.hewan')->with('hewans', $hewans);
    }
}

