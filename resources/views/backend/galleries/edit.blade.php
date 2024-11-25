@extends('backend.layouts.main', ['title' => 'Edit Gallery'])
@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3 fs-3">Edit Gallery</h3>
                </div>
            </div>

            <!-- Form untuk update gallery -->
            <form id="formGallery" action="{{ route('galleries.update', $gallery->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Gunakan metode PUT untuk update -->
                <input type="hidden" value="hh" name="image">
                <div class="row">
                    <!-- Main Form Section -->
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        value="{{ old('name', $gallery->name) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="permalink" class="form-label">Permalink *</label>
                                    <input type="text" class="form-control" id="permalink" name="slug" required
                                        value="{{ old('slug', $gallery->slug) }}">
                                    <small class="form-text text-muted">Preview:
                                        http://localhost/galleries/{{ old('slug', $gallery->slug) }}</small>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $gallery->description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sort Order</label>
                                    <input type="number" class="form-control" id="sort_order" name="sort_order"
                                        value="{{ old('sort_order', $gallery->sort_order) }}">
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured"
                                        {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">Is featured?</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Section -->
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5>Publish</h5>
                                <button type="submit" class="btn btn-primary w-100 mb-2">
                                    Save
                                </button>
                                <a href="{{ route('galleries.index') }}" class="btn btn-secondary w-100">Cancel</a>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="active"
                                        {{ old('status', $gallery->status) == 'active' ? 'selected' : '' }}>Published
                                    </option>
                                    <option value="inactive"
                                        {{ old('status', $gallery->status) == 'inactive' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Images Section -->
                    <div class="col-md-8">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="mt-4">Gallery Images</h5>
                                <button type="button" class="btn btn-secondary mb-3" onclick="openFileManager()">
                                    Select Images
                                </button>
                                <button type="button" class="btn btn-danger mb-3" onclick="resetGallery()">
                                    Reset Gallery
                                </button>

                                <div id="imagePreviewContainer" class="d-flex gap-2 flex-wrap">
                                    @foreach ($gallery->metas as $index => $meta)
                                        <div class="image-container">
                                            <!-- Input hidden untuk URL gambar -->
                                            <input type="hidden" name="gallery_images[{{ $index }}][image]"
                                                value="{{ $meta->image }}">

                                            <!-- Input hidden untuk deskripsi gambar -->
                                            <input type="hidden" name="gallery_images[{{ $index }}][description]"
                                                value="{{ $meta->description }}">

                                            <!-- Pratinjau gambar -->
                                            <img src="{{ asset($meta->image) }}" alt="Gallery Image {{ $index + 1 }}"
                                                class="img-thumbnail" onclick="openDescriptionModal(this.parentElement)">
                                            <span class="edit-icon"><i class="fa fa-edit"></i></span>
                                        </div>

                                        <!-- Modal for Adding or Updating Image Description -->
                                        <div class="modal fade" id="descriptionModal" tabindex="-1"
                                            aria-labelledby="descriptionModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="descriptionModalLabel">
                                                            Update Photo's Description
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" id="imagePath" />
                                                        <input type="text" class="form-control" id="imageDescription"
                                                            placeholder="Photo's description..." />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="deleteSelectedImage({{ $meta->id }})">
                                                            Delete this photo
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="updateDescription()">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-container img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            display: block;
            transition: opacity 0.3s ease;
            /* Tambahkan transisi untuk efek hover yang halus */
        }

        /* Efek overlay hitam transparan */
        .image-container::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            /* Warna hitam semi-transparan */
            opacity: 0;
            transition: opacity 0.3s ease;
            /* Transisi untuk efek halus */
            border-radius: 5px;
            /* Opsional: untuk memberikan sudut yang sedikit melengkung */
        }

        .image-container:hover::after {
            opacity: 1;
            /* Tampilkan overlay hitam saat di-hover */
        }

        .edit-icon,
        .delete-icon {
            position: absolute;
            color: white;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
            display: none;
        }

        .edit-icon {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .image-container:hover .edit-icon {
            display: block;
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageContainers = document.querySelectorAll(".image-container");
            imageContainers.forEach((imgContainer) => {
                imgContainer.onclick = () => openDescriptionModal(imgContainer);
            });
        });

        let selectedImageContainer;

        function openFileManager() {
            let route_prefix = "{{ url('cms-unkhair-filemanager') }}";
            window.open(
                route_prefix + "?type=file",
                "FileManager",
                "width=800,height=600"
            );
        }

        window.SetUrl = function(items) {
            const imageContainer = document.getElementById('imagePreviewContainer');
            let imageCount = imageContainer.children.length; // Hitung jumlah gambar yang ada

            items.forEach((item) => {
                let file_url = item.url;

                // Create preview with edit icon
                let imgContainer = document.createElement("div");
                imgContainer.classList.add("image-container");

                // Buat input tersembunyi untuk URL gambar
                let inputImage = document.createElement('input');
                inputImage.type = 'hidden';
                inputImage.name =
                    `gallery_images[${imageCount}][image]`; // Indeks berdasarkan jumlah gambar saat ini
                inputImage.value = file_url;
                imgContainer.appendChild(inputImage);

                // Buat input tersembunyi untuk deskripsi gambar
                let inputDesc = document.createElement('input');
                inputDesc.type = 'hidden';
                inputDesc.name =
                    `gallery_images[${imageCount}][description]`; // Indeks berdasarkan jumlah gambar saat ini
                inputDesc.value = ''; // Set deskripsi default sebagai kosong
                imgContainer.appendChild(inputDesc);

                console.log(inputDesc);


                let img = document.createElement("img");
                img.src = file_url;
                img.classList.add("img-thumbnail");
                imgContainer.onclick = () =>
                    openDescriptionModal(imgContainer, file_url);

                let editIcon = document.createElement("span");
                editIcon.classList.add("edit-icon");
                editIcon.innerHTML = '<i class="fa fa-edit"></i>';

                imgContainer.appendChild(img);
                imgContainer.appendChild(editIcon);
                imageContainer.appendChild(imgContainer);

                imageCount++; // Tambah hitungan untuk gambar berikutnya
            });
        };


        function openDescriptionModal(imgContainer, file_url) {

            selectedImageContainer = imgContainer; // Simpan container gambar yang sedang dipilih
            selectedDescriptionInput = imgContainer.querySelector(
                'input[name$="[description]"]'); // Cari input deskripsi di dalam container

            document.getElementById("imageDescription").value = selectedDescriptionInput.value ||
                ""; // Ambil nilai deskripsi
            const modal = new bootstrap.Modal(document.getElementById("descriptionModal"));
            modal.show();
        }

        // function openDescriptionModal(imgContainer) {
        //     selectedImageContainer = imgContainer; // Simpan container gambar yang sedang dipilih
        //     selectedDescriptionInput = imgContainer.querySelector(
        //         'input[name$="[description]"]'); // Cari input deskripsi di dalam container

        //     if (selectedDescriptionInput) {
        //         document.getElementById("imageDescription").value = selectedDescriptionInput.value ||
        //             ""; // Ambil nilai deskripsi
        //     } else {
        //         console.error("Input deskripsi tidak ditemukan.");
        //     }

        //     const modal = new bootstrap.Modal(document.getElementById("descriptionModal"));
        //     modal.show();
        // }

        function updateDescription() {
            const description = document.getElementById("imageDescription").value;
            selectedDescriptionInput.value = description; // Perbarui deskripsi
            // if (selectedDescriptionInput) {
            //     console.log("Deskripsi diperbarui:", description); // Debugging
            // } else {
            //     console.error("Tidak ada elemen deskripsi yang dipilih.");
            // }
            const modal = bootstrap.Modal.getInstance(document.getElementById("descriptionModal"));
            modal.hide();
        }


        function deleteSelectedImage(imageId) {
            console.log()
            selectedImageContainer.remove();
            const modal = bootstrap.Modal.getInstance(
                document.getElementById("descriptionModal")
            );
            modal.hide();

            // Kirim request untuk menghapus gambar dari database
            fetch(`/cms-unkhair/cp/delete-image/${imageId}`, {
                    method: 'get',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "csrf-token" // CSRF token Laravel
                    }
                })
                .then(response => {
                    if (response.ok) {
                        console.log('Image deleted successfully.');
                    } else {
                        console.log('Failed to delete image.');
                    }
                })
                .catch(error => {
                    console.log('Error:', error);
                });
        }

        function resetGallery() {
            const imageContainer = document.getElementById("imagePreviewContainer");
            imageContainer.innerHTML = ""; // Clear all images
            // Remove all hidden inputs for gallery images
            document
                .querySelectorAll('input[name="gallery_images[]"]')
                .forEach((input) => input.remove());
        }
    </script>
@endpush
