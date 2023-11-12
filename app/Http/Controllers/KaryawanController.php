<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy('created_at', 'DESC')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|string',
        ]);
        $users = new User([
            'nama' => $request->get('nama'),
            'jumlah' => $request->get('jumlah'),
            'harga' => $request->get('harga'),
            'catatan' => $request->get('catatan'),
        ]);
    
        $users->total = $users->total();

        return redirect()->route('users')->with('Berhasil', 'users berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $users)
    {
        //
        $users = User::find($users);

        if (!$users) {
            return abort(404);
        }

        return view('users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $users)
    {
        //
        $users = User::find($users);

        if(!$users) {
            return abort(404);
        }

        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $users)
    {
        //
        $users = User::findorFail($users)->update($request->all());

        return redirect()->route('users')->with('berhasil', 'users berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $users)
    {
        //
        $users = User::find($users);

        $users->delete();

        return redirect()->route('users')->with('users', 'users berhasil dihapus');
    }
}