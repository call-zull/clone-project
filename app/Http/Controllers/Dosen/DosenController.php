<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    /**
     * Menampilkan daftar laporan aktivitas yang dapat dilihat oleh dosen.
     */
    public function index()
    {
        // Ambil posisi dosen yang sedang login
        $dosen = Auth::user();
        $positionId = $dosen->position_id;

        // Ambil laporan aktivitas mahasiswa yang memiliki posisi "Programmer" atau sesuai dengan yang diinginkan
        $reports = Report::with('user', 'project')  // Mengambil data terkait user dan project
            ->whereHas('user', function ($query) use ($positionId) {
                // Mengambil laporan hanya untuk mahasiswa dengan posisi yang sesuai (misalnya Programmer)
                $query->where('position_id', $positionId);  // Filter berdasarkan posisi yang sama
            })
            ->get();

        // Tampilkan laporan ke view
        return view('dosen.index', compact('reports'));
    }
}