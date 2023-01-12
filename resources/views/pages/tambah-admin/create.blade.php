@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h4>Tambah pengguna</h4>
            <form action="{{ route('tambah-pengguna-register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="formGroupExampleInput"
                        placeholder="Email@gmail.com">
                </div>
                <div class="form-group">
                    <select name="roles" class="form-control input-sm select2">
                        <option value="">Pilih role sebagai apa ?</option>
                        <option value="ADMIN">ADMIN</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    Kirim
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
