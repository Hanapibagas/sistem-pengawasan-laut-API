@extends('layouts.master')

@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Create about</h4>
                <form action="{{ route('jenis.update', $jenis->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis</label>
                        <input value="{{ $jenis->jenis }}" name="jenis" type="text" class="form-control" id="formGroupExampleInput" placeholder="Jenis">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
