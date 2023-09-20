@extends('layouts.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <h2 class="mb-4">Tambah Data Lowongan Magang</h2>
            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('admin.tambah_data') }}" method="POST">
                                @csrf
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
                                                <input type="text" class="form-control"
                                                    name="nama_pekerjaan">
                                            </div>
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control" name="perusahaan" value="PT.Akebono Brake Astra Indonesia" readonly>
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Departemen</label>
                                                <select class="form-control"
                                                    name="departemen">
                                                    <option value="HR">HR</option>
                                                    <option value="IT">IT</option>
                                                    <option value="Accounting">Accounting
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea id="editor" name="deskripsi"></textarea>
                                                <!--Disuruh Pake CKEditor-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kualifikasi</label>
                                                <select class="form-control"
                                                    name="kualifikasi">
                                                    <option value="SMA/SMK">SMA/SMK</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Lokasi</label>
                                                <input type="text" class="form-control" value="Jakarta Utara" readonly
                                                    name="lokasi">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Buka</label>
                                                <input type="date" class="form-control"
                                                    name="tanggal_buka">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Tutup</label>
                                                <input type="date" class="form-control"
                                                    name="tanggal_tutup">
                                            </div>
                                            <button class="btn btn-primary mr-1"
                                                type="submit">Submit</button>
                                            <button class="btn btn-warning"
                                                type="reset">Reset</button>
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
