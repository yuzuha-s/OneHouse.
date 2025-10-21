<?php

namespace App\Http\Controllers;

use App\Models\Maker;
use Illuminate\Http\Request;

class MakerController extends Controller
{
    public function index()
    {
        // $makers = Maker::with('profile')->get();
        $makers = Maker::with('features.category')->get();
        return view('phase2', compact('makers'));
    }
    // 新規作成する
    public function create(Request $request)
    {
        return view('phase2_edit');
    }

    // 保存する
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['profile_id'] = $profile->id ?? 1;

        Maker::create($validated);
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
