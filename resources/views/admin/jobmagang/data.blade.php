@extends('layouts.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <h2 class="mb-3">Data Lowongan Magang</h2>
            <a href="{{ route('admin.view.tambah_data') }}"
                class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah
                Lowongan</a>
                @if (session('success'))
                <div id="successAlert" class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            
                <script>
                    setTimeout(function () {
                        var successAlert = document.getElementById('successAlert');
                        if (successAlert) {
                            successAlert.style.display = 'none';
                        }
                    }, 5000); 
                </script>
            @endif
            <div class="row g-5 justify-content-center mt-4">
                @foreach ($data as $loker)
                    <div class="col-lg-4">
                        <div class="card card-info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="{{ asset('/img/akebonologo.png') }}" alt="logo" height="30">
                                    @if ($loker->status === 'Aktif')
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-secondary">Tidak Aktif</span>
                                    @endif
                                </div>
                                <h6 class="card-title fw-bold mt-3">{{ $loker->nama_pekerjaan }}
                                </h6>
                                <p class="card-text text-muted mb-1 font-sm">
                                    <i class="fas fa-briefcase me-1"></i>
                                    {{ $loker->perusahaan }}
                                </p>
                                <p class="card-text text-muted font-sm">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    {{ $loker->lokasi }}
                                </p>
                                <hr class="fw-bold border-1">
                                <a href="{{ route('admin.view.detail', ['id' => $loker->id]) }}" class="btn btn-icon icon-left btn-info"><i
                                        class="fas fa-info-circle"></i> Info</a>
                                <a href="{{ route('admin.view.edit_data', ['id' => $loker->id]) }}"
                                    class="btn btn-icon icon-left btn-primary"><i
                                        class="far fa-edit"></i> Edit</a>
                                <button class="btn btn-icon icon-left btn-danger"
                                    onclick="deleteLoker({{ $loker->id }})"><i
                                        class="fas fa-times"></i>
                                    Delete</button>
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
                        <li
                            class="page-item {{ $page == $data->currentPage() ? 'active' : '' }}">
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
        </section>
    </div>
    <script>
        function deleteLoker(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/admin/loker/' + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            Swal.fire('Deleted!',
                                'The data has been deleted.',
                                'success').then(() => {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            Swal.fire('Error!',
                                'An error occurred while deleting.',
                                'error');
                        }
                    });
                }
            });
        }
    </script>
@endsection
