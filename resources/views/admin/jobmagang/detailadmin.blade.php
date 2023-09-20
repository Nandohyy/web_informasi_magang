@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
    <div class="mt-70">
        <div class="row g-5 justify-content-start">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="fw-bold">{{ $loker->nama_pekerjaan }}</h4>
                        <h6>{{ $loker->perusahaan }}</h6>
                    </div>
                    <div>
                        <h6>Pendaftaran</h6>
                        <p>
                            {{ \Carbon\Carbon::parse($loker->tanggal_buka)->format('j M') }}
                            -
                            {{ \Carbon\Carbon::parse($loker->tanggal_tutup)->format('j M Y') }}
                        </p>
                    </div>
                </div>
                <hr class="my-4">
                <div class="card card-info">
                    <div class="card-body p-4">
                        <h5 class="fw-bold">
                            Deskripsi
                        </h5>
                        <p class="card-text">{!! $loker->deskripsi !!}</p>
                    </div>  
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-info">
                    <div class="card-body p-5">
                        <h4 class="text-center">Intern Overview</h4>
                        <div class="mt-3">
                            <div>
                                <h6 class="card-text">Departemen</h6>
                                <p class="card-text fw-bold">{{ $loker->departemen }}</p>
                            </div>
                            <div class="mt-4">
                                <h6 class="card-text">Kualifikasi</h6>
                                <p class="card-text fw-bold">{{ $loker->kualifikasi }}</p>
                            </div>
                            <div class="mt-4 mb-3">
                                <h6 class="card-text">Lokasi</h6>
                                <p class="card-text fw-bold">{{ $loker->lokasi }}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.view.edit_data', ['id' => $loker->id]) }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="{{ route('admin.view.data') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-alt-circle-left"></i>Kembali</a>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
@endsection
