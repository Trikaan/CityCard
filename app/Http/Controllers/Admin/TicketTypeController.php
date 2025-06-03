<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketType;
use App\Models\TransportType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketTypes = TicketType::with('transportType')->get();
        return view('admin.ticket-types.index', compact('ticketTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transportTypes = TransportType::all();
        return view('admin.ticket-types.create', compact('transportTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'transport_type_id' => 'required|exists:transport_types,id'
        ]);

        TicketType::create($request->all());

        return redirect()->route('admin.ticket-types.index')
            ->with('success', 'Ticket type created successfully.');
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
    public function edit(TicketType $ticketType)
    {
        $transportTypes = TransportType::all();
        return view('admin.ticket-types.edit', compact('ticketType', 'transportTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketType $ticketType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'transport_type_id' => 'required|exists:transport_types,id'
        ]);

        $ticketType->update($request->all());

        return redirect()->route('admin.ticket-types.index')
            ->with('success', 'Ticket type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketType $ticketType)
    {
        $ticketType->delete();

        return redirect()->route('admin.ticket-types.index')
            ->with('success', 'Ticket type deleted successfully.');
    }
}
