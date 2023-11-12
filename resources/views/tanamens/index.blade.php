@extends('layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Tanaman</h1>
        <a href="{{ route('tanamens.create') }}" class="btn btn-primary">Tambah Tanaman</a>
    </div>

    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table id="tanaman" class="table  table-bordered table-hover display">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Tanggal tanam</th>
                <th>Tanggal Panen</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Created</th>
                <th>Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($tanamen->count() > 0)
                @foreach ($tanamen as $tanaman)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $tanaman->nama }}</td>
                        <td class="align-middle">{{ $tanaman->kategoris->kategori }}</td>
                        <td class="align-middle">{{ $tanaman->deskripsi }}</td>
                        <td class="align-middle">{{ Carbon\Carbon::parse($tanaman->tanam)->translatedFormat('l, d F Y') }}
                        </td>
                        <td class="align-middle">{{ Carbon\Carbon::parse($tanaman->panen)->translatedFormat('l, d F Y') }}
                        </td>
                        <td class="align-middle">{{ $tanaman->bibits->jumlah }}</td>
                        <td class="align-middle">Rp{{ number_format($tanaman->bibits->harga, 0, ',', '.') }}</td>
                        <td class="align-middle">Rp{{ number_format($tanaman->bibits->total, 0, ',', '.') }}</td>
                        <td class="align-middle">{{ $tanaman->created_at->translatedFormat('l, d F Y H:i:s') }}</td>
                        <td class="align-middle">{{ $tanaman->updated_at->translatedFormat('l, d F Y H:i:s') }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('tanamens.show', $tanaman->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('tanamens.edit', $tanaman->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('tanamens.destroy', $tanaman->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Tanaman tidak ditemukan!</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
