@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Update data sebaran terumbu karang</h4>
            <form action="{{ route('data-sebaran-terumbu-karang.update', $datasebaranterumbukarang->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="formGroupExampleInput">Kabupaten/Kota</label>
                    <input name="lokasi" type="text" class="form-control" id="formGroupExampleInput"
                        placeholder="Kabupaten/Kota" value="{{ $datasebaranterumbukarang->lokasi }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Luas lahan terumbu karang</label>
                    <input name="luas_lahan" type="text" class="form-control" id="formGroupExampleInput"
                        placeholder="Luas lahan terumbu karang" value="{{ $datasebaranterumbukarang->luas_lahan }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Kondisi terumbu karang baik</label>
                    <input name="kondisi_baik" type="text" class="form-control" id="formGroupExampleInput"
                        placeholder="Kondisi terumbu karang baik" value="{{ $datasebaranterumbukarang->kondisi_baik }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Kondisi terumbu karang sedang</label>
                    <input name="kondisi_sedang" type="text" class="form-control" id="formGroupExampleInput"
                        placeholder="Kondisi terumbu karang sedang"
                        value="{{ $datasebaranterumbukarang->kondisi_sedang }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Kondisi terumbu karang rusak</label>
                    <input name="kondisi_rusak" type="text" class="form-control" id="formGroupExampleInput"
                        placeholder="Kondisi terumbu karang rusak"
                        value="{{ $datasebaranterumbukarang->kondisi_rusak }}">
                </div>
                <button type="submit" class="btn btn-primary">
                    Kirim
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
