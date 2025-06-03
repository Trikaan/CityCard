<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = auth()->user()->cards()->with(['transactions', 'rides'])->get();
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'nullable|string|unique:cards,number'
        ]);

        $card = auth()->user()->cards()->create([
            'number' => $request->number ?? Str::random(16),
            'balance' => 0
        ]);

        return redirect()->route('cards.show', $card)
            ->with('success', 'Card created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        $this->authorize('view', $card);
        
        $card->load(['transactions' => function($query) {
            $query->latest();
        }, 'rides' => function($query) {
            $query->latest();
        }]);

        return view('cards.show', compact('card'));
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
    public function destroy(Card $card)
    {
        $this->authorize('delete', $card);
        
        $card->delete();

        return redirect()->route('cards.index')
            ->with('success', 'Card deleted successfully.');
    }
}
