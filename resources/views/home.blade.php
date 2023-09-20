@extends('layouts.app')
@section('content')
<div class="mt-5">
    <div class="d-md-flex justify-content-between mb-5 align-items-center">
        <h2>   Informasi Lowongan Magang</h2>
        <div class="card border-0 shadow-sm rounded-3 p-0">
            <div class="card-body px-3 py-2">
                <form class="form-inline" method="GET" action="{{ route('search') }}">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-9 col-md-8 col-12">
                            <input type="text" class="form-control font-sm"
                                placeholder="Cari program magang..." name="search">
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <button class="btn btn-primary w-100" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        <div class="row g-5 justify-content-start">
            @foreach ($data as $loker)
                <div class="col-lg-4">
                    <div class="card border-0 shadow p-2 rounded-4">
                        <div class="card-body">
                            <img src="{{ asset('/img/akebonologo.png') }}" alt="logo"
                                height="30" class="mb-3">
                            <h6 class="card-title fw-bold mb-3">{{ $loker->nama_pekerjaan }}</h6>
                            <p class="card-text text-muted mb-1 font-sm">
                                <i class="bi bi-briefcase-fill me-1"></i>
                                {{ $loker->perusahaan }}
                            </p>
                            <p class="card-text text-muted font-sm mb-4">
                                <i class="bi bi-geo-alt-fill me-1"></i>
                                {{ $loker->lokasi }}
                            </p>
                            <p class="card-text font-sm mb-1">
                                Akhir Pendaftaran {{ \Carbon\Carbon::parse($loker->tanggal_tutup)->format('j M Y') }}
                            </p>
                            <hr class="fw-bold border-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text mb-1 font-sm">
                                    <i class="bi bi-person-fill me-1"></i>
                                    <span class=" text-primary ">
                                        Departemen {{ $loker->departemen }}
                                    </span>
                                </p>
                                <a href="{{ route('detail', ['id' => $loker->id]) }}"
                                    class="btn btn-primary font-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example" class="mt-5">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($data->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}"
                            aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $data->currentPage() ? 'active' : '' }}">
                        <a class="page-link"
                            href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($data->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}"
                            aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>

    </div>
@endsection
