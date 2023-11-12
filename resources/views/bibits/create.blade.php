@extends('layouts.app')
@section('title', 'Create bibit')
@section('contents')
    <h1 class="mb-0">Tambah Bibit Tanaman</h1>

    <hr />
    <form action="{{ route('bibits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="bibit" class="form-control" placeholder="Nama Bibit">
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
