@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-appstore"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ $jenis }}</h2>
                            <p class="m-b-0 text-muted">Jenis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-build"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ $geojenis }}</h2>
                            <p class="m-b-0 text-muted">Geo Jenis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-file"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ $peraturan }}</h2>
                            <p class="m-b-0 text-muted">Peraturan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-form"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ $datamangrove }}</h2>
                            <p class="m-b-0 text-muted">Data Mangrove</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
