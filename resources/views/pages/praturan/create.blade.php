@extends('layouts.master')

@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Create peraturan</h4>
                <form action="{{ route('praturan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Peraturan</label>
                        <input name="nama_peraturan" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Peraturan">
                    </div>
                        <label for="formGroupExampleInput">Peraturan</label>
                        <input name="peraturan" type="file" class="form-control" id="formGroupExampleInput">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection

