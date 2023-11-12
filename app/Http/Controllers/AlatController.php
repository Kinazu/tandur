<?php

namespace App\Http\Controllers;

use App\Models\Alats;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alats = Alats::orderBy('created_at', 'DESC')->get();

        return view('alats.index', compact('alats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
        return view('alats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'alat' => 'required|string',
        ]);
        $alats = new Alats([
            'alat' => $request->get('alat'),
            'jumlah' => $request->get('jumlah'),
            'harga' => $request->get('harga'),
            'catatan' => $request->get('catatan'),
        ]);
    
        $alats->total = $alats->total();

        return redirect()->route('alats')->with('Berhasil', 'alats berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $alats)
    {
        //
        $alats = Alats::find($alats);

        if (!$alats) {
            return abort(404);
        }

        return view('alats.show', compact('alats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $alats)
    {
        //
        $alats = Alats::find($alats);

        if(!$alats) {
            return abort(404);
        }

        return view('alats.edit', compact('alats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $alats)
    {
        //
        $alats = Alats::findorFail($alats)->update($request->all());

        return redirect()->route('alats')->with('berhasil', 'alats berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $alats)
    {
        //
        $alats = Alats::find($alats);

        $alats->delete();

        return redirect()->route('alats')->with('alats', 'alats berhasil dihapus');
    }
}