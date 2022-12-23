@extends('layouts.master')

@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Create data sebaran terumbu karang</h4>
                <form action="{{ route('data-sebaran-terumbu-karang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kabupaten/Kota</label>
                        <input name="lokasi" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kabupaten/Kota">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Luas lahan terumbu karang</label>
                        <input name="luas_lahan" type="text" class="form-control" id="formGroupExampleInput" placeholder="Luas lahan terumbu karang">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kondisi terumbu karang baik</label>
                        <input name="kondisi_baik" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kondisi terumbu karang baik">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kondisi terumbu karang sedang</label>
                        <input name="kondisi_sedang" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kondisi terumbu karang sedang">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kondisi terumbu karang rusak</label>
                        <input name="kondisi_rusak" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kondisi terumbu karang rusak">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
