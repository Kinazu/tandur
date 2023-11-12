@extends('layouts.app')
@section('title', 'Show alat')
@section('contents')
    <h1 class="mb-0">Detail Alat Pertanian</h1>

    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">alat</label>
            <input type="text" name="alat" class="form-control" placeholder="alat" value="{{ $alats->alat }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $alats->jumlah }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{ $alats->harga }}"
                readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total</label>
            <input type="text" name="total" class="form-control" placeholder="Total" value="{{ $alats->total }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Catatan</label>
            <textarea class="form-control" name="description" placeholder="Catatan" readonly>{{ $alats->catatan }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $alats->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $alats->updated_at }}" readonly>
        </div>
    </div>
@endsection
