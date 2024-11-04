<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $batchId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        Position::create($request->all());

        return redirect()->route('bacth.cpl.index', ['batch' => $batchId])
            ->with('success', 'Position berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
