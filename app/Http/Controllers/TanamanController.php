<?php

namespace App\Http\Controllers;

use App\Models\Kategoris;
use App\Models\Tanamen;
use App\Models\Bibits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hanya pengguna dengan peran tertentu yang dapat mengakses indeks tanamen
        // if (Auth::user()->type == 'admin') {
        //     $tanamen = tanamen::with('kategoris')->get();
        //     return view('admin.index', compact('tanamen'));
        // } elseif (Auth::user()->type == 'supplier') {
        //     $tanamen = tanamen::orderBy('created_at', 'DESC')->get();
        //     return view('supplier.index', compact('tanamen'));
        // } else
        if (Auth::user()->type == 'user') {
            $tanamen = tanamen::orderBy('created_at', 'DESC')->get();
        } else {
            // Pengguna dengan peran lain diarahkan ke halaman yang sesuai
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        return view('tanamens.index', compact('tanamen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategoris = Kategoris::pluck('kategori', 'id');
        $bibits = Bibits::pluck('bibit', 'id');
        return view('tanamens.create', compact('kategoris', 'bibits'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
        ]);
        $tanamen = new Tanamen([
            'nama' => $request->get('nama'),
            'bibits_id' => $request->get('bibits_id'),
            'kategoris_id' => $request->get('kategoris_id'),
            'deskripsi' => $request->get('deskripsi'),
            'tanam' => $request->get('tanam'),
            'panen' => $request->get('panen'),
        ]);

        $tanamen->save();

        return redirect()->route('tanamens')->with('success', 'tanamen added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tanamen = tanamen::find($id);

        if (!$tanamen) {
            return abort(404); // Menampilkan halaman 404 jika produk tidak ditemukan
        }

        return view('tanamens.show', compact('tanamen'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tanamen = tanamen::find($id);

        $kategoris = Kategoris::pluck('kategori', 'id');
        $bibits = Bibits::pluck('bibit', 'id');
        return view('tanamens.edit', compact('kategoris', 'tanamen', 'bibits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validasi request jika diperlukan

    // Ambil data tanaman berdasarkan ID
    $tanaman = Tanamen::find($id);

    // Perbarui data tanaman dengan data dari request
    $tanaman->nama = $request->input('nama');
    $tanaman->deskripsi = $request->input('deskripsi');
    $tanaman->tanam = $request->input('tanam');
    $tanaman->panen = $request->input('panen');
    $tanaman->kategoris_id = $request->input('kategoris_id');
    $tanaman->bibits_id = $request->input('bibits_id');

    // Simpan perubahan ke database
    $tanaman->save();

    return redirect()->route('tanamens')->with('success', 'tanaman updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tanamen = tanamen::findOrFail($id);

        $tanamen->delete();

        return redirect()->route('tanamens')->with('success', 'tanamen deleted successfully');
    }

    public function sidebar()
    {
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin');
        } elseif (auth()->user()->type == 'supplier') {
            return redirect()->route('supplier.tanamens');
        } else {
            return redirect()->route('tanamens');
        }
    }

    // public function dashboard()
    // {
    //     Tanamen::withCount('id')->orderBy('id', 'asc')->paginate(10);
    //     return view ('dashboard')->withCount('id')
    // }
}