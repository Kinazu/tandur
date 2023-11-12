@extends('layouts.app')
@section('title', 'Home Bibit')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Bibit Tanaman</h1>
        <a href="{{ route('bibits.create') }}" class="btn btn-primary">Tambah Bibit</a>
    </div>

    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table id="bibit" class="table  table-bordered table-hover display">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Bibit</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Catatan</th>
                <th>Created</th>
                <th>Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($bibits->count() > 0)
                @foreach ($bibits as $bibit)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $bibit->bibit }}</td>
                        <td class="align-middle">{{ $bibit->jumlah }}</td>
                        <td class="align-middle">Rp{{ number_format($bibit->harga, 0, ',', '.') }}</td>
                        <td class="align-middle">Rp{{ number_format($bibit->total, 0, ',', '.') }}</td>
                        <td class="align-middle">{{ $bibit->catatan }}</td>
                        <td class="align-middle">{{ $bibit->created_at->translatedFormat('l, d F Y H:i:s') }}</td>
                        <td class="align-middle">{{ $bibit->updated_at->translatedFormat('l, d F Y H:i:s') }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('bibits.show', $bibit->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('bibits.edit', $bibit->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('bibits.destroy', $bibit->id) }}" method="POST" type="button"
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
                    <td class="text-center" colspan="5">bibit tidak ditemukan!</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
