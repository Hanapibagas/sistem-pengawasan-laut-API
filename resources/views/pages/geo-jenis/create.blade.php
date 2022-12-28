@extends('layouts.master')

@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Create geo jenis</h4>
                <form action="{{ route('jenis-geo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <select name="jenis_id" required class="form-control">
                            <option value="">Pilih Jenis</option>
                            @foreach ( $jenis as $jenis )
                                <option value="{{ $jenis->id }}">
                                    {{ $jenis->jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Geo</label>
                        <input name="nama_geo" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Geo">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Peta</label>
                        <input name="deskripsi" type="file" class="form-control" id="formGroupExampleInput" placeholder="Jenis">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Diperbolehkan</label>
                        <textarea name="di_perbolehkan" type="text" class="block w-full" placeholder="Silahkan isi pemanfaatan ruang"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tidak Diperbolehkan  </label>
                        <textarea name="tidak_diperbolehkan" type="text" class="block w-full" placeholder="Silahkan isi pemanfaatan ruang"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Diperbolehkan Degan Syarat</label>
                        <textarea name="diperbolehkan_bersyarat" type="text" class="block w-full" placeholder="Silahkan isi pemanfaatan ruang"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection

@push('add-script')
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('di_perbolehkan');
        CKEDITOR.replace('tidak_diperbolehkan');
        CKEDITOR.replace('diperbolehkan_bersyarat');
    </script>
@endpush
