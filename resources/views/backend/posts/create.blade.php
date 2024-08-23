@extends('backend.layouts.main', ['title' => 'Tambah Post'])

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Dashboard</h3>
                            <h6 class="op-7 mb-2">Tambah Post</h6>
                        </div>
                        <div class="ms-md-auto py-2 py-md-0">
                            {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
                            {{-- <a href="#" class="btn btn-primary btn-round"><i class="fa fa-plus"></i> Tambah User</a> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Tambah Post</h4>
                            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" id="slug-display" class="form-control" readonly>
                                        <input type="hidden" name="slug" id="slug" required>
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="excerpt" class="form-label">Excerpt</label>
                                    <input type="text" name="excerpt" id="excerpt" class="form-control" required>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar</label>
                                    <div class="input-group">
                                        <input type="text" name="image" id="fileUrl" class="form-control" readonly>
                                        <button type="button" class="btn btn-secondary" onclick="openFileManager()">Pilih
                                            Gambar</button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Konten</label>
                                    <textarea name="content" id="editor" class="form-control" rows="10"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="draft">Draft</option>
                                        <option value="published">Published</option>
                                        <option value="trashed">Trashed</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan skrip TinyMCE -->
    <script src="{{ asset('backend/tinymce/tinymce.min.js') }}"></script>
    <script>
        const baseURL = "{{ url('/') }}/";

        document.getElementById('title').addEventListener('input', function() {
            const title = this.value;
            const slug = title.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter non-alphanumeric
                .trim() // Hapus spasi di awal/akhir
                .replace(/\s+/g, '-') // Ganti spasi dengan tanda hubung
                .replace(/-+/g, '-'); // Hapus tanda hubung ganda

            document.getElementById('slug-display').value = baseURL + slug; // Tampilkan URL lengkap
            document.getElementById('slug').value = slug; // Simpan hanya slug
        });

        function openFileManager() {
            let route_prefix = "{{ url('laravel-filemanager') }}";
            window.open(route_prefix + '?type=file', 'FileManager', 'width=800,height=600');
        }

        window.SetUrl = function(items) {
            if (items.length > 0) {
                let file_url = items[0].url;
                document.getElementById('fileUrl').value = file_url;
                // Optionally, update a preview of the selected image
                // document.getElementById('filePreview').src = file_url;
            }
        };

        tinymce.init({
            selector: '#editor',
            height: 500,
            menubar: 'file edit view insert format tools table help',
            plugins: [
                'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | removeformat | table link image media | code fullscreen preview',
            toolbar_mode: 'sliding',
            content_css: [
                'https://www.tiny.cloud/css/codepen.min.css'
            ],
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype === 'image') {
                    let route_prefix = "{{ url('laravel-filemanager') }}";
                    window.open(route_prefix + '?type=file', 'FileManager', 'width=800,height=600');
                    window.SetUrl = function(items) {
                        let file_url = items[0].url;
                        callback(file_url, {
                            alt: items[0].name
                        });
                    };
                }
            },
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    </script>
@endsection
