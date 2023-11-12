@extends('layouts.app')
@section('title', 'Show bibit')
@section('contents')
    <h1 class="mb-0">Detail Bibit</h1>

    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Bibit</label>
            <input type="text" name="bibit" class="form-control" placeholder="bibit" value="{{ $bibits->bibit }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $bibits->jumlah }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{ $bibits->harga }}"
                readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total</label>
            <input type="text" name="total" class="form-control" placeholder="Total" value="{{ $bibits->total }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Catatan</label>
            <textarea class="form-control" name="description" placeholder="Catatan" readonly>{{ $bibits->catatan }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $bibits->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $bibits->updated_at }}" readonly>
        </div>
    </div>
@endsection
