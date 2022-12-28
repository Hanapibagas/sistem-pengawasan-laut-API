@extends('layouts.master')

@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Update geo jenis</h4>
                <form action="{{ route('jenis-geo.update', $geojenis->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <select name="jenis_id" required class="form-control">
                            <option value="{{ $geojenis->jenis_id }}">Jangan Diubah</option>
                            @foreach ( $jenis as $jenis )
                                <option value="{{ $jenis->id }}">
                                    {{ $jenis->jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Geo</label>
                        <input value="{{ $geojenis->nama_geo }}" name="nama_geo" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Geo">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Deskripsi</label>
                        <input name="deskripsi" type="file" class="form-control" id="formGroupExampleInput" placeholder="Jenis">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Diperbolehkan</label>
                        <textarea name="di_perbolehkan" type="text" class="form-control" rows="10" id="formGroupExampleInput" placeholder="Silahkan isi pemanfaatan ruang">{{ $geojenis->di_perbolehkan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tidak Diperbolehkan  </label>
                        <textarea name="tidak_diperbolehkan" type="text" class="form-control" rows="10" id="formGroupExampleInput" placeholder="Silahkan isi pemanfaatan ruang">{{ $geojenis->tidak_diperbolehkan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Diperbolehkan Degan Syarat</label>
                        <textarea name="diperbolehkan_bersyarat" type="text" class="form-control" rows="10" id="formGroupExampleInput" placeholder="Silahkan isi pemanfaatan ruang">{{ $geojenis->diperbolehkan_bersyarat }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
