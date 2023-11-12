@extends('layouts.app')
@section('title', 'Show Tanaman')
@section('contents')
    <h1 class="mb-0">Detail Tanaman</h1>

    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ $tanamen->nama }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">kategori</label>
            <input type="text" name="kategori" class="form-control" placeholder="Kategori"
                value="{{ $tanamen->kategoris->kategori }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" placeholder="Deskripsi" readonly>{{ $tanamen->deskripsi }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tanggal Tanam</label>
            <input type="text" name="tanam" class="form-control" placeholder="Tanggal Tanam"
                value="{{ $tanamen->tanam }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Tanggal Panen</label>
            <input type="text" name="panen" class="form-control" placeholder="Tanggal Panen"
                value="{{ $tanamen->panen }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $tanamen->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $tanamen->updated_at }}" readonly>
        </div>
    </div>
@endsection
