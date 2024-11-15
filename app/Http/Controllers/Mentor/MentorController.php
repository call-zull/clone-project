<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\LearningOutComes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    /**
     * Display the list of activity reports that the mentor can manage.
     */
    public function index()
    {
        // Ambil posisi mentor yang sedang login
        $mentor = Auth::user();
        $positionId = $mentor->position_id;

        // Ambil laporan aktivitas mahasiswa yang memiliki posisi sama dengan mentor
        $reports = Report::with('user', 'project') // Mengambil data terkait user dan project
            ->whereHas('user', function ($query) use ($positionId) {
                $query->where('position_id', $positionId); // Filter berdasarkan posisi yang sama
            })
            ->get();

        // Dump untuk debug (opsional)
        // dd($reports);

        // Tampilkan laporan ke view
        return view('mentor.index', compact('reports'));
    }

    public function profile()
    {
        return view('mentor.profile');
    }

    /**
     * Approve a student's activity report and assign CPL.
     */
    // public function approveReport(Request $request, $reportId)
    // {
    //     $report = Report::findOrFail($reportId);

    //     // Validasi bahwa mentor yang sedang login adalah mentor yang sesuai
    //     if (Auth::user()->position_id != $report->position_id) {
    //         return back()->withErrors('You are not authorized to approve this report.');
    //     }

    //     // Set status laporan ke approved dan pilih CPL
    //     $report->status = 1; // 1 berarti approved
    //     $report->cheked_by = Auth::id(); // Mentor yang melakukan approval
    //     $report->learningOutComes()->sync($request->learning_outcomes); // Sync dengan CPL yang dipilih
    //     $report->save();

    //     return back()->with('success', 'Report approved successfully.');
    // }

    // /**
    //  * Add revision message to a student's activity report.
    //  */
    // public function reviseReport(Request $request, $reportId)
    // {
    //     $report = Report::findOrFail($reportId);

    //     // Validasi bahwa mentor yang sedang login adalah mentor yang sesuai
    //     if (Auth::user()->position_id != $report->position_id) {
    //         return back()->withErrors('You are not authorized to revise this report.');
    //     }

    //     // Simpan pesan revisi
    //     $report->rejected_reason = $request->rejected_reason;
    //     $report->status = 2; // 2 berarti revisi
    //     $report->save();

    //     return back()->with('success', 'Revisions added successfully.');
    // }
}
