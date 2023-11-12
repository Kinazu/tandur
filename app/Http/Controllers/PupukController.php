<?php

namespace App\Http\Controllers;

use App\Models\Pupuks;
use Illuminate\Http\Request;

class PupukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pupuks = Pupuks::orderBy('created_at', 'DESC')->get();

        return view('pupuks.index', compact('pupuks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
        return view('pupuks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'pupuk' => 'required|string',
        ]);
        $pupuks = new Pupuks([
            'pupuk' => $request->get('pupuk'),
            'jumlah' => $request->get('jumlah'),
            'harga' => $request->get('harga'),
            'catatan' => $request->get('catatan'),
        ]);
//Hitung Total Harga
        $pupuks->total = $pupuks->total();

        $pupuks->save();

        return redirect()->route('pupuks')->with('Berhasil', 'Pupuks berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $pupuks)
    {
        //
        $pupuks = Pupuks::find($pupuks);

        if (!$pupuks) {
            return abort(404);
        }

        return view('pupuks.show', compact('pupuks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $pupuks)
    {
        //
        $pupuks = Pupuks::find($pupuks);

        if(!$pupuks) {
            return abort(404);
        }

        return view('pupuks.edit', compact('pupuks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pupuks)
    {
        //
        $pupuks = Pupuks::findorFail($pupuks)->update($request->all());

        return redirect()->route('pupuks')->with('berhasil', 'Pupuks berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $pupuks)
    {
        //
        $pupuks = Pupuks::find($pupuks);

        $pupuks->delete();

        return redirect()->route('pupuks')->with('pupuks', 'Pupuks berhasil dihapus');
    }
}