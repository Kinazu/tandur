@extends('layouts.app')
@section('title', 'Home Tanaman')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Tanaman</h1>
        <a href="{{ route('tanamans.create') }}" class="btn btn-primary">Tambah Tanaman</a>
    </div>

    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Tanggal tanam</th>
                <th>Tanggal Panen</th>
                <th>Created</th>
                <th>Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            +
            @if ($tanaman->count() > 0)
                @foreach ($tanaman as $tnm)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $tnm->nama }}</td>
                        <td class="align-middle">{{ $tnm->kategoris->kategori }}</td>
                        <td class="align-middle">{{ $tnm->deskripsi }}</td>
                        <td class="align-middle">{{ $tnm->tanam }}</td>
                        <td class="align-middle">{{ $tnm->panen }}</td>
                        <td class="align-middle">{{ $tnm->created_at }}</td>
                        <td class="align-middle">{{ $tnm->updated_at }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('tanamans.show', $tnm->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('tanamans.edit', $tnm->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('tanamans.destroy', $tnm->id) }}" method="POST" type="button"
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
