<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransportType;
use Illuminate\Http\Request;

class TransportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportTypes = TransportType::all();
        return view('admin.transport-types.index', compact('transportTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.transport-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:transport_types,name'
        ]);

        TransportType::create($request->all());

        return redirect()->route('admin.transport-types.index')
            ->with('success', 'Transport type created successfully.');
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
    public function edit(TransportType $transportType)
    {
        return view('admin.transport-types.edit', compact('transportType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransportType $transportType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:transport_types,name,' . $transportType->id
        ]);

        $transportType->update($request->all());

        return redirect()->route('admin.transport-types.index')
            ->with('success', 'Transport type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransportType $transportType)
    {
        $transportType->delete();

        return redirect()->route('admin.transport-types.index')
            ->with('success', 'Transport type deleted successfully.');
    }
}
