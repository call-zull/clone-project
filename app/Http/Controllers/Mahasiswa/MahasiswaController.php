<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $activities = Report::with('checker', 'project')->where('user_id', $user->id)
            ->orderBy('report_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        $projects = Project::all();
        return view('mahasiswa.index', compact('activities', 'projects'));
    }

    public function storeActivityReport(ActivityRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $validated['batch_id'] = auth()->user()->batchUsers->batch_id;
        $validated['position_id'] = auth()->user()->position_id;
        $validated['project_id'] = $request->project_id;
        Report::create($validated);

        return redirect()->back()->with('success', 'Laporan Aktivitas Berhasil Ditambahkan');
    }

    public function updateActivityReport(Request $request, Report $report)
    {
        $validated = $request->validate([
            'activity' => 'required|string',
        ]);
        $report->update($validated);
        return redirect()->back()->with('success', 'Laporan Aktivitas Berhasil Diubah');
    }
}
