<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Maker;
use Illuminate\Http\Request;

class MakerController extends Controller
{
    public function index(Request $request)
    {
        // $makers = Maker::with('profile')->get();
        $makers = Maker::with('features.category')->get();
        return view('phase2', compact('makers'));
    }
    // 新規作成する
    public function create(Request $request)
    {
        $features = Feature::all();
        return view('phase2_edit', compact('features'));
    }

    // 保存する
    public function store(Request $request)
    {
        dd($request->all());
        // $validated = $request->validate([

        //     'name' => 'required|string|max:255',
        //     'star' => 'required|array',
        //     'star.*' => 'integer|min:1|max:5',
        //     'features' =>'array',
        //     'features.*' => 'integer|exists:features,id',
        // ]);
        // // starの最大値のみを取得
        // $maxStar = max($validated['star']);

        // // $validated['profile_id'] = $profile->id ?? 1;

        // $maker = Maker::create([
        //     'profile_id' => 1,
        //     'name' => $validated['name'],
        //     'sales' => $validated['sales'] ?? null,
        //     'option' => $validated['option'] ?? null,
        //     'star' => $maxStar,


        // ]);

        // if(!empty($validated['features'])) {
        //     $maker->feature()->attach($validated['features']);
        // }
        // return redirect()->route('phase2')->with('success', '登録が完了しました');
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
