@extends('layouts.master')

@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Create about</h4>
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
                        <label for="formGroupExampleInput">Deskripsi</label>
                        <input name="deskripsi" type="file" class="form-control" id="formGroupExampleInput" placeholder="Jenis">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
