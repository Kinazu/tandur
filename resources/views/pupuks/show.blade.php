@extends('layouts.app')
@section('title', 'Show Pupuk')
@section('contents')
    <h1 class="mb-0">Detail Pupuk</h1>

    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Pupuk</label>
            <input type="text" name="pupuk" class="form-control" placeholder="Pupuk" value="{{ $pupuks->pupuk }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $pupuks->jumlah }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{ $pupuks->harga }}"
                readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total</label>
            <input type="text" name="total" class="form-control" placeholder="Total" value="{{ $pupuks->total }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Catatan</label>
            <textarea class="form-control" name="description" placeholder="Catatan" readonly>{{ $pupuks->catatan }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $pupuks->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $pupuks->updated_at }}" readonly>
        </div>
    </div>
@endsection
