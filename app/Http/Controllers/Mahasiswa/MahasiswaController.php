<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function storeActivityReport(Request $request)
    {
        // return $request->all();
        $request->all([
            'batch_id' => 'required',
            'user_id' => 'required',
            'position_id' => 'required',
            'project_id' => 'required',
            'activity' => 'required',
        ]);

        Report::create($request->all());

        return redirect()->back()->with('success', 'Laporan Aktivitas Berhasil Ditambahkan');
    }
}
