@extends('layouts.master')

@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Create jenis</h4>
                <form action="{{ route('jenis.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis</label>
                        <input name="jenis" type="text" class="form-control" id="formGroupExampleInput" placeholder="Jenis">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
