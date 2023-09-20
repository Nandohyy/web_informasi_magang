@extends('layouts.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header mt-3">
                            <h4>
                                Data Pendaftar Magang
                            </h4>
                            <div class="card-header-form">
                                <form method="GET"
                                    action="{{ route('admin.search_peserta') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            placeholder="Search" name="keyword"
                                            value="{{ old('keyword') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama Lowongan</th>
                                            <th>Nama Lengkap</th>
                                            <th>Asal Sekolah</th>
                                            <th>Domisili</th>
                                            <th>E-mail</th>
                                            <th>No-telp</th>
                                            <th>Curiculum Vitae</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendaftar as $index => $data)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->loker->nama_pekerjaan }}</td>
                                                <td>{{ $data->nama_lengkap }}</td>
                                                <td>{{ $data->asal_sekolah }}</td>
                                                <td>{{ $data->domisili }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->nohp }}</td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $data->cv) }}"
                                                        class="btn btn-primary"
                                                        target="_blank">Lihat CV</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Data
                                                    Empty</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
