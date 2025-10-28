<?php

namespace App\Http\Controllers;

use App\Models\LandLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandLogController extends Controller
{

    public function index()
    {
        $landLogs = LandLog::with('profile')->get();
        return view('phase4', compact('landLogs'));
    }

    // phase4のinput値を受け取る
    public function create(Request $request)
    {

        // $landLogs = LandLog::all();
        // return view('phase4', compact('landLogs'));
    }

    // 保存する
    public function store(Request $request)
    {
        Log::info('LandLogs store called', $request->all());
        //  dd($request->all());

        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'landarea' => 'required|decimal:0,1',
            'far' => 'required|integer|min:1',
            'bcr' => 'required|integer|min:1',
            'floor' => 'required|integer|min:1|max:3',
            'builable_area' => 'required|integer|min:1',
            'pricePerTsubo' => 'required|integer|min:1',
        ]);
        LandLog::create([
            'profile_id' => 1,
            'address' => $validated['address'],
            'landarea' => $validated['landarea'],
            'far' => $validated['far'],
            'bcr' => $validated['bcr'],
            'floor' => $validated['floor'],
            'builable_area'  => $validated['builable_area'],
            'pricePerTsubo' =>  $validated['pricePerTsubo'],
        ]);


        return redirect()->route('phase4')->with('success', '登録が完了しました');
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
