<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    public function index()
    {
        $checkLists = Checklist::with('profile')->get();
        return view('phase1', compact('checkLists'));
    }

    public function create() {}

    //リストを登録する
    public function store(Request $request)
    {
        $validated = $request->validate([
            'list' => 'required|string|min:0',
            'phase_id' =>  'required|integer',
        ]);
        $checkList = Checklist::create([
            'profile_id' => 1,
            'phase_id' => $request->phase_id,
            'checked' => false,
            'list' => $validated['list'],
        ]);
        return redirect()->route('phase1')->with('success', '登録を変更しました');
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
