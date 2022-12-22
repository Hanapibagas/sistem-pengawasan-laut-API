@extends('layouts.master')

@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Update peraturan</h4>
                <form action="{{ route('praturan.update', $peraturan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Geo</label>
                        <input value="{{ $peraturan->nama_peraturan }}" name="nama_peraturan" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Geo">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Deskripsi</label>
                        <input name="peraturan" type="file" class="form-control" id="formGroupExampleInput" placeholder="Jenis">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
