@extends('layouts.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <h2 class="mb-4">Edit Data Lowongan Magang</h2>
            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('admin.edit_data', ['id' => $loker->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Job Intern</label>
                                                <input type="text" class="form-control" name="nama_pekerjaan" value="{{ $loker->nama_pekerjaan }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control" name="perusahaan" value="{{ $loker->perusahaan }}" readonly>
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Departemen</label>
                                                <select class="form-control" name="departemen">
                                                    <option value="HR" {{ $loker->departemen === 'HR' ? 'selected' : '' }}>HR</option>
                                                    <option value="IT" {{ $loker->departemen === 'IT' ? 'selected' : '' }}>IT</option>
                                                    <option value="Accounting" {{ $loker->departemen === 'Accounting' ? 'selected' : '' }}>Accounting</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea id="editor" name="deskripsi">{{ $loker->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kualifikasi</label>
                                                <select class="form-control" name="kualifikasi">
                                                    <option value="SMA/SMK" {{ $loker->kualifikasi === 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                                    <option value="D3" {{ $loker->kualifikasi === 'D3' ? 'selected' : '' }}>D3</option>
                                                    <option value="S1" {{ $loker->kualifikasi === 'S1' ? 'selected' : '' }}>S1</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Lokasi</label>
                                                <input type="text" class="form-control" value="{{ $loker->lokasi }}" readonly name="lokasi">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Buka</label>
                                                <input type="date" class="form-control" name="tanggal_buka" value="{{ $loker->tanggal_buka }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Tutup</label>
                                                <input type="date" class="form-control" name="tanggal_tutup" value="{{ $loker->tanggal_tutup }}">
                                            </div>
                                            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                            <a href="{{ route('admin.view.data') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-alt-circle-left"></i>Kembali</a> 
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
