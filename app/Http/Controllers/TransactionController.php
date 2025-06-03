<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = auth()->user()->cards()->with(['transactions' => function($query) {
            $query->latest();
        }])->get();

        return view('transactions.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'card_id' => 'required|exists:cards,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $card = Card::findOrFail($request->card_id);
        
        $this->authorize('deposit', $card);

        try {
            DB::transaction(function() use ($card, $request) {
                $transaction = $card->transactions()->create([
                    'amount' => $request->amount,
                    'type' => 'deposit'
                ]);

                $card->increment('balance', $request->amount);
            });

            return redirect()->back()->with('success', 'Card topped up successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to process transaction.');
        }
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
