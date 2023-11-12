@extends('layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Pupuk pupuk</h1>
        <a href="{{ route('pupuks.create') }}" class="btn btn-primary">Tambah Pupuk</a>
    </div>

    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table id="pupuk" class="table  table-bordered table-hover display">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Pupuk</th>
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
            @if ($pupuks->count() > 0)
                @foreach ($pupuks as $pupuk)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $pupuk->pupuk }}</td>
                        <td class="align-middle">{{ $pupuk->jumlah }}</td>
                        <td class="align-middle">Rp{{ number_format($pupuk->harga, 0, ',', '.') }}</td>
                        <td class="align-middle">Rp{{ number_format($pupuk->total, 0, ',', '.') }}</td>
                        <td class="align-middle">{{ $pupuk->catatan }}</td>
                        <td class="align-middle">{{ $pupuk->created_at->translatedFormat('l, d F Y H:i:s') }}</td>
                        <td class="align-middle">{{ $pupuk->updated_at->translatedFormat('l, d F Y H:i:s') }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('pupuks.show', $pupuk->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('pupuks.edit', $pupuk->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('pupuks.destroy', $pupuk->id) }}" method="POST" type="button"
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
                    <td class="text-center" colspan="5">pupuk tidak ditemukan!</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
