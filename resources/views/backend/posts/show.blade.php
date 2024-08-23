<!-- resources/views/posts/show.blade.php -->

@extends('backend.layouts.main', ['title' => 'Detail Post'])

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Detail Post</h3>
                    <h6 class="op-7 mb-2">View Post Details</h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    {{-- Add your buttons or links here --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">{{ $post->title }}</h4>
                    <p><strong>Slug:</strong> {{ $post->slug }}</p>
                    <p><strong>Excerpt:</strong> {{ $post->excerpt }}</p>
                    <p><strong>Content:</strong> {!! $post->content !!}</p>
                    <p><strong>Status:</strong> {{ $post->status }}</p>
                    @if ($post->image)
                        <p><strong>Image:</strong></p>
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" style="max-width: 100%;">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
