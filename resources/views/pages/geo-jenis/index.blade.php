@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('jenis-geo.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah data
            </a>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Nama Geo</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $geojenis as $file )
                            <tr>
                                <th scope="row">{{ $file->id }}</th>
                                <th>{{ $file->Jenis->jenis }}</th>
                                <th>{{ $file->nama_geo }}</th>
                                <th>{{ $file->deskripsi }}</th>
                                <th>
                                    <a href="{{ route('jenis-geo.edit', $file->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('jenis-geo.destroy', $file->id) }}" method="POST" class="d-inline">
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
