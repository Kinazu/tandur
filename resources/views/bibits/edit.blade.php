@extends('layouts.app')
@section('title', 'Edit bibit')
@section('contents')
    <h1 class="mb-0">Edit Bibit</h1>

    <hr />
    <form action="{{ route('bibits.update', $bibits->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Bibit</label>
                <input type="text" name="upuk" class="form-control" placeholder="bibit" value="{{ $bibits->bibit }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah"
                    value="{{ $bibits->jumlah }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{ $bibits->harga }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Catatan</label>

                <textarea class="form-control" name="catatan" placeholder="catatan">{{ $bibits->Catatan }}</textarea>

            </div>
            <div class="col mb-3">
                <label class="form-label">Tanggal Update</label>
                <input type="date" name="update" class="form-control" placeholder="Tanggal Update"
                    value="{{ $bibits->updated_at }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
            </div>
        </div>
    </form>
@endsection
