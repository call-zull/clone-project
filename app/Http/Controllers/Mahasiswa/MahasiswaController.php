<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $activity = Report::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();
        $projects = Project::all();
        return view('mahasiswa.index', compact('activity', 'projects'));
    }

    public function storeActivityReport(Request $request)
    {
        // $request->all();
        $request->validate([
            'batch_id' => 'required',
            'user_id' => 'required',
            'position_id' => 'required',
            'project_id' => 'required',
            'report_date' => 'required',
            'activity' => 'required',
        ]);

        Report::create($request->all());

        return redirect()->back()->with('success', 'Laporan Aktivitas Berhasil Ditambahkan');
    }
}
