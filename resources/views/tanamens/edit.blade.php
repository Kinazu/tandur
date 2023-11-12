@extends('layouts.app')
@section('title', 'Edit Tanaman')
@section('contents')
    <h1 class="mb-0">Edit Tanaman</h1>

    <hr />
    <form action="{{ route('tanamens.update', $tanamen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $tanamen->nama }}">
            </div>
            <div class="col mb-3">
                <label for="bibits_id">Bibit</label>
                <select name="bibits_id">
                    @foreach ($bibits as $id => $bibit)
                        <option value="{{ $id }}">{{ $bibit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-1">
                <label for="kategoris_id">Pilih Kategori</label>
                <select name="kategoris_id">
                    @foreach ($kategoris as $id => $kategori)
                        <option value="{{ $id }}">{{ $kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Deskripsi</label>

                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi">{{ $tanamen->deskripsi }}</textarea>
            </div>
            <div class="col mb-3">
                <label class="form-label">Tanggal Tanam</label>
                <input type="date" name="tanam" class="form-control" placeholder="Tanggal tanam"
                    value="{{ $tanamen->tanam }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Tanggal Panen</label>
                <input type="date" name="panen" class="form-control" placeholder="Tanggal panen"
                    value="{{ $tanamen->panen }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Tanggal Update</label>
                <input type="date" name="updated" class="form-control" placeholder="Tanggal Update"
                    value="{{ $tanamen->updated_at }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
            </div>
        </div>
    </form>
@endsection
