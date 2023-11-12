@extends('layouts.app')
@section('title', 'Create karyawan')
@section('contents')
    <h1 class="mb-0">Tambah karyawan</h1>

    <hr />
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="karyawan" class="form-control" placeholder="Nama karyawan">
            </div>
            <div class="col">
                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="harga" class="form-control" placeholder="Harga">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Tanggal Dibuat</label>
                <input type="date" name="create" class="form-control" placeholder="Tanggal Created">
            </div>
            <div class="col">
                <textarea class="form-control" name="catatan" placeholder="Catatan"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
