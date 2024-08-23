<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS (optional) -->
    <style>
        .post-content {
            background-color: #f8f9fa;
            border-radius: 0.375rem;
            padding: 1rem;
            border: 1px solid #dee2e6;
        }

        .post-image {
            max-width: 100%;
            border-radius: 0.375rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="my-4">
            <h1 class="text-center">Welcome to the Blog</h1>
        </header>
        <main>
            @foreach ($posts as $post)
                <div class="row mb-4">
                    <div class="col-md-12">
                        <!-- Post Title -->
                        <div class="d-flex align-items-center mb-3">
                            <h4 class="fw-bold">{{ $post->title }}</h4>
                        </div>

                        <!-- Post Details -->
                        <div class="mb-3">
                            <p><strong>Slug:</strong> <span class="text-muted">{{ $post->slug }}</span></p>
                            <p><strong>Excerpt:</strong> <span class="text-muted">{{ $post->excerpt }}</span></p>
                            <p><strong>Status:</strong> <span class="badge bg-primary">{{ $post->status }}</span></p>
                        </div>

                        <!-- Post Content -->
                        <div class="mb-3">
                            <strong>Content:</strong>
                            <div class="post-content">
                                {!! $post->content !!}
                            </div>
                        </div>

                        <!-- Post Image -->
                        @if ($post->image)
                            <div class="mb-3">
                                <strong>Image:</strong>
                                <div class="text-center">
                                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="post-image">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </main>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
