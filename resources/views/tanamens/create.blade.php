@extends('layouts.app')
@section('title', 'Create Tanaman')
@section('contents')
    <h1 class="mb-0">Tambah Tanaman</h1>

    <hr />
    <form action="{{ route('tanamens.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
            <div class="col">
                <label for="bibits_id">Pilih Bibit</label>
                <select name="bibits_id">
                    @foreach ($bibits as $id => $bibit)
                        <option value="{{ $id }}">{{ $bibit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="kategoris_id">Pilih Kategori</label>
                <select name="kategoris_id">
                    @foreach ($kategoris as $id => $kategori)
                        <option value="{{ $id }}">{{ $kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="tanam">Tanggal Tanam</label>
                <input type="date" name="tanam" class="form-control" placeholder="Tanggal Tanam">
            </div>
            <div class="col">
                <label for="panen">Tanggal Panen</label>
                <input type="date" name="panen" class="form-control" placeholder="Tanggal Panen">
            </div>
            <div class="col">
                <label for="created">Tanggal Dibuat</label>
                <input type="date" name="created_at" class="form-control" placeholder="Tanggal created">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
