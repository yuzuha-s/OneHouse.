<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanSimulationRequest;
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
            'loan' => 'required|numeric|min:1',
            'loan_term' => 'required|numeric|between:10,40',
            'age' => 'required|numeric|min:1',
            'rate' => 'required|numeric|min:0.1',
            'income' => 'required|numeric|min:1',
            'expense' => 'required|numeric|min:1',
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

    public function update(LoanSimulationRequest $request, $id)
    {
        $validated =  $request->validated();
        $profile_id = 1;

        $loanSimulations = LoanSimulation::updateOrCreate(
            ['profile_id' => $profile_id],
            $validated + ['profile_id' => $profile_id]
        );

        return response()->json([
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
