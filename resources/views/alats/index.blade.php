@extends('layouts.app')
@section('title', 'Home Alat')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Alat Pertanian</h1>
        <a href="{{ route('alats.create') }}" class="btn btn-primary">Tambah Alat</a>
    </div>

    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table id="alat" class="table  table-bordered table-hover display">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Alat</th>
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
            @if ($alats->count() > 0)
                @foreach ($alats as $alat)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $alat->alat }}</td>
                        <td class="align-middle">{{ $alat->jumlah }}</td>
                        <td class="align-middle">Rp{{ number_format($alat->harga, 0, ',', '.') }}</td>
                        <td class="align-middle">Rp{{ number_format($alat->total, 0, ',', '.') }}</td>
                        <td class="align-middle">{{ $alat->catatan }}</td>
                        <td class="align-middle">{{ $alat->created_at->translatedFormat('l, d F Y H:i:s') }}</td>
                        <td class="align-middle">{{ $alat->updated_at->translatedFormat('l, d F Y H:i:s') }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('alats.show', $alat->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('alats.edit', $alat->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('alats.destroy', $alat->id) }}" method="POST" type="button"
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
                    <td class="text-center" colspan="5">alat tidak ditemukan!</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
