<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    public function index()
    {
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'list' => 'required|string|min:1|max:255'
        // ]);

        // Phase::create([
        //     'list' => $validated[]

        // ])
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
