<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\LearningOutComes;
use App\Models\Position;
use Illuminate\Http\Request;

class LearningOutComeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Batch $batch)
    {
        $positions = Position::all();
        return view('batch.cpl.index', compact('positions', 'batch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($batch, $position)
    {
        return view('learning-out-comes.create', compact('batch', 'position'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $batch, $position)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $validatedData['batch_id'] = $batch;
        $validatedData['position_id'] = $position;

        LearningOutcomes::create($validatedData);

        return redirect()->route('bacth.cpl.show', ['batch' => $batch, 'position' => $position])
            ->with('success', 'Learning Outcome created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show($batch, $position)
    {
        $learningOutcomes = LearningOutComes::with('batch', 'position')
            ->where('batch_id', $batch)
            ->where('position_id', $position)->get();
        return view('learning-out-comes.index', compact('learningOutcomes', 'batch', 'position'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($batch, $position, LearningOutComes $learning_outcome)
    {

        return view('learning-out-comes.edit', compact('learning_outcome', 'batch', 'position'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $batch, $position,  LearningOutComes $learning_outcome)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $validatedData['batch_id'] = $batch;
        $validatedData['position_id'] = $position;

        $learning_outcome->update($validatedData);

        return redirect()->route('bacth.cpl.show', ['batch' => $batch, 'position' => $position])
            ->with('success', 'Learning Outcome updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningOutComes $learning_outcome)
    {
        $learning_outcome->delete();

        return redirect()->back();
        return redirect()->route('bacth.index');
    }
}
