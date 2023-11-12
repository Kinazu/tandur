<?php

namespace App\Http\Controllers;

use App\Models\Bibits;
use Illuminate\Http\Request;

class BibitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bibits = Bibits::orderBy('created_at', 'DESC')->get();

        return view('bibits.index', compact('bibits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
        return view('bibits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'bibit' => 'required|string',
        ]);
        $bibits = new Bibits([
            'bibit' => $request->get('bibit'),
            'jumlah' => $request->get('jumlah'),
            'harga' => $request->get('harga'),
            'catatan' => $request->get('catatan'),
        ]);

        $bibits->total = $bibits->total();

        $bibits->save();    

        return redirect()->route('bibits')->with('Berhasil', 'bibits berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $bibits)
    {
        //
        $bibits = Bibits::find($bibits);

        if (!$bibits) {
            return abort(404);
        }

        return view('bibits.show', compact('bibits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $bibits)
    {
        //
        $bibits = Bibits::find($bibits);

        if(!$bibits) {
            return abort(404);
        }

        return view('bibits.edit', compact('bibits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $bibits)
    {
        //
        $bibits = Bibits::findorFail($bibits)->update($request->all());

        return redirect()->route('bibits')->with('berhasil', 'bibits berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $bibits)
    {
        //
        $bibits = Bibits::find($bibits);

        $bibits->delete();

        return redirect()->route('bibits')->with('bibits', 'bibits berhasil dihapus');
    }

}