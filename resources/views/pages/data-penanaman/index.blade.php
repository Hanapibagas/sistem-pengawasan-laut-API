@extends('layouts.master')

@push('add-style')

@endpush

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('data-penanaman.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah data
            </a>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tahun</th>
                                <th scope="col">Daerah</th>
                                <th scope="col">Kabupaten</th>
                                <th scope="col">Jumlah Batang</th>
                                <th scope="col">Akasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $datapenanaman as $file )
                            <tr>
                                <th>{{ $file->TahunPenanaman->tahun }}</th>
                                <th>{{ $file->daerah }}</th>
                                <th>{{ $file->kabupaten }}</th>
                                <th>{{ $file->jumlah_batang }}</th>
                                <th>
                                    <a href="{{ route('data-penanaman.edit', $file->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
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
@endsection

@push('add-script')

@endpush
