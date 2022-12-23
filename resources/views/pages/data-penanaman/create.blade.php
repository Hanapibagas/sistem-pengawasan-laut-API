@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Create data mangrove</h4>
                <form action="{{ route('data-penanaman.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tahun</label>
                        <select name="tahun_id" required class="form-control">
                            <option value="">Pilih Tahun</option>
                            @foreach ( $tahun as $tahun )
                                <option value="{{ $tahun->id }}">
                                    {{ $tahun->tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Desa/Kec</label>
                        <input name="daerah" type="text" class="form-control" id="formGroupExampleInput" placeholder="Desa/Kec">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kabupaten</label>
                        <input name="kabupaten" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kabupaten">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jumlah Batang</label>
                        <input name="jumlah_batang" type="number" class="form-control" id="formGroupExampleInput" placeholder="Jumlah Batang">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
