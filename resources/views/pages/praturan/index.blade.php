@extends('layouts.master')

@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text : "{{ session('status') }}",
    });
</script>
@endif

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('praturan.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah data
            </a>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama Peraturan</th>
                                <th scope="col">Peraturan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $peraturan as $file )
                            <tr>
                                <th scope="row">{{ $file->id }}</th>
                                <th>{{ $file->nama_peraturan }}</th>
                                <th>{{ $file->peraturan }}</th>
                                <th>
                                    <a href="{{ route('praturan.edit', $file->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('praturan.destroy', $file->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                                </th>
                            </tr>
                            @empty
                            <tr>
                                <th class="text-center" colspan="7">Data tidak di temukan</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->

</div>
@endsection
