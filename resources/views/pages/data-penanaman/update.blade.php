@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Update data mangrove</h4>
            <form action="{{ route('data-penanaman.update', $datapenanaman->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="formGroupExampleInput">Desa/Kec</label>
                    <input name="daerah" type="text" class="form-control" id="formGroupExampleInput"
                        placeholder="Desa/Kec" value="{{ $datapenanaman->daerah }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Kabupaten</label>
                    <input name="kabupaten" type="text" class="form-control" id="formGroupExampleInput"
                        placeholder="Kabupaten" value="{{ $datapenanaman->kabupaten }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Jumlah Batang</label>
                    <input name="jumlah_batang" type="number" class="form-control" id="formGroupExampleInput"
                        placeholder="Jumlah Batang" value="{{ $datapenanaman->jumlah_batang }}">
                </div>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
