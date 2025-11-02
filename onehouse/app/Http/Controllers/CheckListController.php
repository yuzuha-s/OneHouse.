<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Phase;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    public function indexPhase1()
    {
        return view('phase1');


        // $checkLists = Checklist::with('profile')->get();
        // return view('phase1', compact('checkLists'));
    }
    public function indexPhase5()
    {
        return view('phase5');
    }


    public function create() {}

    //リストを登録する
    public function store(Request $request)
    {

        $validated = $request->validate([
            'list' => 'required|string|min:1|max:255',
        ]);
        $phase = Phase::firstOrCreate([
            'number' => 6,
            'list' => $validated['list'],
        ]);
        $checklist = Checklist::firstOrCreate([
            'profile_id' => 1,
            'phase_id'   => $phase->id,
            'checked' => false,
            'list' => $validated['list'],
        ]);

        return response()->json([
            'success' => true,
            'checklist' => $checklist,
            'number' => $number,
        ]);
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
