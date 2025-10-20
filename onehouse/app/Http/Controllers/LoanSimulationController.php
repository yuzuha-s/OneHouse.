<?php

namespace App\Http\Controllers;

use App\Models\LoanSimulation;
use Illuminate\Http\Request;

class LoanSimulationController extends Controller
{

    public function index()
    {
        $loanSimulations = LoanSimulation::with('profile')->get();
        return view('default', compact('loanSimulations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // phase3のinput値を受け取る
    public function store(Request $request)
    {
        $validated = $request->validate([
            'loan' => 'required|numeric|min:0',
            'loan_term' => 'required|numeric|between:10,40',
            'age' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:0',
            'income' => 'required|numeric|min:0',
            'expense' => 'required|numeric|min:0',
        ]);

        $validated['profile_id'] = $profile->id ?? 1;

        LoanSimulation::create($validated);

        return response()->json([
            'message' => 'シミュレーションが完了しました！'
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
        $validated = $request->validate([
            'loan' => 'required|numeric|min:0',
            'loan_term' => 'required|numeric|between:10,40',
            'age' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:0',
            'income' => 'required|numeric|min:0',
            'expense' => 'required|numeric|min:0',
        ]);

        $profile_id =1;

        $loanSimulations = LoanSimulation::updateOrCreate(
            ['profile_id' => $profile_id],
            $validated+['profile_id' => $profile_id]
        );

        return response()->json([
            'message' => 'シミュレーションが完了しました！',
            'data' => $loanSimulations
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
