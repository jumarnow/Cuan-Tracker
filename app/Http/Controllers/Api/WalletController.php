<?php

namespace App\Http\Controllers\Api;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Wallet::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'currency' => 'required|string',
            'balance' => 'required|integer',
            'icon' => 'nullable|string',
        ]);

        $wallet = Wallet::create($validated);
        return response()->json($wallet, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wallet = Wallet::findOrFail($id);
        return response()->json($wallet, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'currency' => 'required|string',
            'balance' => 'required|integer',
            'icon' => 'nullable|string',
        ]);

        $wallet = Wallet::findOrFail($id);
        $wallet->update($validated);
        return response()->json($wallet, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->delete();
        return response()->json(null, 204);
    }
}
