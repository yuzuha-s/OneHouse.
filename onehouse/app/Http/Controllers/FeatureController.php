<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('phase2_edit', compact('features'));
    }

    public function create()
    {
        //
    }
    // 保存する
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'tag' => 'required|string|max:100',
        ]);

        Feature::create($validated);

        return redirect()->route('phase2')->with('success', '登録が完了しました');
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
