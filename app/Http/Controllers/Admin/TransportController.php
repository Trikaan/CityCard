<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Transport;
use App\Models\TransportType;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transports = Transport::with(['city', 'transportType'])->get();
        return view('admin.transports.index', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $transportTypes = TransportType::all();
        return view('admin.transports.create', compact('cities', 'transportTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'transport_type_id' => 'required|exists:transport_types,id',
            'city_id' => 'required|exists:cities,id',
        ]);

        Transport::create($request->all());

        return redirect()->route('admin.transports.index')
            ->with('success', 'Transport created successfully.');
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
    public function edit(Transport $transport)
    {
        $cities = City::all();
        $transportTypes = TransportType::all();
        return view('admin.transports.edit', compact('transport', 'cities', 'transportTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transport $transport)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'transport_type_id' => 'required|exists:transport_types,id',
            'city_id' => 'required|exists:cities,id',
        ]);

        $transport->update($request->all());

        return redirect()->route('admin.transports.index')
            ->with('success', 'Transport updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transport $transport)
    {
        $transport->delete();

        return redirect()->route('admin.transports.index')
            ->with('success', 'Transport deleted successfully.');
    }
}
