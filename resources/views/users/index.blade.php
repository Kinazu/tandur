@extends('layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List karyawan</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah karyawan</a>
    </div>

    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table id="karyawan" class="table  table-bordered table-hover display">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Umur</th>
                <th>No Telpon</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count() > 0)
                @foreach ($users as $karyawan)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $karyawan->nama }}</td>
                        <td class="align-middle">{{ $karyawan->alamat }}</td>
                        <td class="align-middle">{{ $karyawan->umur }}</td>
                        <td class="align-middle">{{ $karyawan->notelp }}</td>
                        <td class="align-middle">{{ $karyawan->email }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('users.show', $users->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('users.edit', $users->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $users->id) }}" method="POST" type="button"
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
                    <td class="text-center" colspan="5">karyawan tidak ditemukan!</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
