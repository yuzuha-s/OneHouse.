<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    public function index() {}


    public function create() {}


    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'list' => 'required|string|min:1|max:255'
        // ]);

        // Phase::create([
        //     'list' => $validated[]

        // ])
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
