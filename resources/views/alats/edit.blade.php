@extends('layouts.app')
@section('title', 'Edit alat')
@section('contents')
    <h1 class="mb-0">Edit Alat Pertanian</h1>

    <hr />
    <form action="{{ route('alats.update', $alats->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">alat</label>
                <input type="text" name="upuk" class="form-control" placeholder="alat" value="{{ $alats->alat }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $alats->jumlah }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{ $alats->harga }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Catatan</label>

                <textarea class="form-control" name="catatan" placeholder="catatan">{{ $alats->Catatan }}</textarea>

            </div>
            <div class="col mb-3">
                <label class="form-label">Tanggal Update</label>
                <input type="date" name="update" class="form-control" placeholder="Tanggal Update"
                    value="{{ $alats->updated_at }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
            </div>
        </div>
    </form>
@endsection
