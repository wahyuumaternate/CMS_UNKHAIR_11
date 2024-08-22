@extends('backend.layouts.main', ['title' => 'Dashboard'])
@push('css')
    <style>
        .storage-usage-info {
            display: none;
        }
    </style>
@endpush
@push('scripts')
@endpush
@section('body')
    <div class="container">
        <div class="page-inner">

            <div class="row">
                {{-- Implementasi File Manager --}}
                <div class="col-md-12">
                    <iframe src="{{ url('laravel-filemanager?type=Files') }}"
                        style="width: 100%; height: 80vh; border: none; overflow: hidden;">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
