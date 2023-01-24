@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('data-sebaran-terumbu-karang.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah data
            </a>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align: center">
                                <th rowspan="2">Kabupaten/Kota</th>
                                <th rowspan="2">Luas Lahan Terumbu Karang</th>
                                <th colspan="3">Kondisi terumbu Karang</th>
                            </tr>
                            <tr style="text-align: center">
                                <th>Baik</th>
                                <th>Sedang</th>
                                <th>Rusak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $datasebaranterumbukarang as $file )
                            <tr style="text-align: center">
                                <th>{{ $file->lokasi }}</th>
                                <th>{{ $file->luas_lahan }}</th>
                                <th>{{ $file->kondisi_baik }}</th>
                                <th>{{ $file->kondisi_sedang }}</th>
                                <th>{{ $file->kondisi_rusak }}</th>
                                <th>
                                    <a href="{{ route('data-sebaran-terumbu-karang.edit', $file->id) }}"
                                        class="btn btn-info">
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
<!-- Content Wrapper END -->

</div>
@endsection
