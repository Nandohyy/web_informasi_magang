@extends('layouts.app')
@section('content')
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
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold">
                            Deskripsi
                        </h5>
                        <p class="card-text">{!! $loker->deskripsi !!}</p>
                    </div>  
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">
                        <h4 class="text-center">Intern Overview</h4>
                        <div class="mt-5">
                            <div>
                                <h6 class="card-text">Departemen</h6>
                                <p class="card-text fw-bold">{{ $loker->departemen }}</p>
                            </div>
                            <div class="mt-4">
                                <h6 class="card-text">Kualifikasi</h6>
                                <p class="card-text fw-bold">{{ $loker->kualifikasi }}</p>
                            </div>
                            <div class="mt-4">
                                <h6 class="card-text">Lokasi</h6>
                                <p class="card-text fw-bold">{{ $loker->lokasi }}</p>
                            </div>
                        </div>
                        <button type="button"
                            class="btn btn-primary mt-5 w-100 rounded-pill py-2 fs-5 fw-bold"
                            data-bs-toggle="modal"
                            data-bs-target="#daftarModal">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="daftarModal" tabindex="-1" aria-labelledby="daftarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title px-4" id="daftarModalLabel">Form Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-3">
                    <form class="row g-3" method="POST" action="{{ route('regist') }}"
                        enctype="multipart/form-data" onsubmit="return validateFileSize()">
                        @csrf
                        <input type="hidden" class="form-control" id="loker_id"
                            name="loker_id" value="{{ $loker->id }}">
                        <div class="col-12">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text"
                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                id="nama_lengkap" name="nama_lengkap"
                                value="{{ old('nama_lengkap') }}" required>
                            @error('nama_lengkap')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                            <input type="text"
                                class="form-control @error('asal_sekolah') is-invalid @enderror"
                                id="asal_sekolah" name="asal_sekolah"
                                value="{{ old('asal_sekolah') }}" required>
                            @error('asal_sekolah')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="domisili" class="form-label">Domisili</label>
                            <input type="text"
                                class="form-control @error('domisili') is-invalid @enderror"
                                id="domisili" name="domisili" value="{{ old('domisili') }}"
                                required>
                            @error('domisili')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}"
                                required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nohp" class="form-label">No. Telp</label>
                            <input type="number"
                                class="form-control @error('nohp') is-invalid @enderror"
                                id="nohp" name="nohp" value="{{ old('nohp') }}"
                                required>
                            @error('nohp')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="cv" class="form-label">CV</label>
                            <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" value="{{ old('cv') }}" accept=".pdf" required>
                            @error('cv')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            <small class="text-muted font-sm">
                                Ukuran maks pdf 2mb.
                            </small>
                        </div>                        
                        <div class="col-12 mt-5">
                            <button type="submit"
                                class="btn btn-primary w-100 rounded-3 py-2 fs-6">Submit</button>
                        </div>
                    </form>
                    @if (Session::has('message'))
                    <script>
                        swal("Terima kasih","{{ Session::get('message')}}",'success',{
                            button: true,
                            button:"Kembali",
                        });
                    </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateFileSize() {
            const fileInput = document.getElementById('cv');
            const fileSize = fileInput.files[0].size / 1024 / 1024; 
    
            if (fileSize > 2) {
                swal("Ukuran file terlalu besar", "File yang diupload harus kurang dari 2 MB.", 'error');
                return false; 
            }
    
            return true; 
        }
    </script>

@endsection