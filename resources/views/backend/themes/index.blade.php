@extends('backend.layouts.main', ['title' => 'Themes'])

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Themes</h3>
                    {{-- <h6 class="op-7 mb-2">Themes</h6> --}}
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
                    {{-- <a href="#" class="btn btn-primary btn-round"><i class="fa fa-plus"></i> Tambah User</a> --}}
                </div>
            </div>
            <div class="row">
                @foreach ($themes as $theme)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Gambar Tema di Bagian Atas Kartu -->
                            <img src="{{ asset($theme->image) }}" alt="{{ $theme->name }}" class="card-img-top img-fluid">

                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="numbers">
                                            <h4 class="card-title">{{ $theme->name }}</h4>
                                            <h4 class="card-title">
                                                @if ($theme->active)
                                                    <span class="btn btn-success" style="cursor: default;">
                                                        <span class="btn-label">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                                                        Sedang Aktif
                                                    </span>
                                                @else
                                                    <a class="btn btn-warning" href="{{ route('ganti.tema', $theme->id) }}">
                                                        <span class="btn-label">
                                                            <i class="fa fa-exclamation-circle"></i>
                                                        </span>
                                                        Aktifkan
                                                    </a>
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
