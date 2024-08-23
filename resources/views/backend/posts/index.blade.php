@extends('backend.layouts.main', ['title' => 'Dashboard'])

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Post</h3>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="{{ route('posts.index') }}">
                        <i class="fa fa-list"></i> Semua ({{ $totalPosts }})
                    </a>

                    @if ($hasTrashed)
                        <a href="{{ route('posts.index', ['status' => 'trashed']) }}">
                            <i class="fa fa-trash"></i> Sampah ({{ $totalTrashed }})
                        </a>
                    @endif

                    <a href="#" class="btn btn-label-info btn-round me-2"><i class="fa fa-plus"></i> Tambah Post</a>
                    <!-- Tambahkan tombol notifikasi -->
                    {{-- <a href="#" id="displayNotif" class="btn btn-success">Tampilkan Notifikasi</a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('posts.bulk_action') }}" method="POST">
                                @csrf
                                <div class="d-flex mb-3">
                                    <select name="action" class="form-select me-2" style="width: 200px;">
                                        <option value="" disabled selected>Pilih Tindakan Bulk</option>
                                        @if ($status !== 'trashed')
                                            <option value="trash">Pindahkan ke Sampah</option>
                                            <option value="publish">Terbitkan Terpilih</option>
                                            <option value="draft">Buat Menjadi Draft Terpilih</option>
                                        @else
                                            <option value="delete">Hapus Permanen</option>
                                            <option value="kembalikan">Kembalikan</option>
                                        @endif
                                    </select>
                                    <button type="submit" class="btn btn-primary">Terapkan</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>Judul</th>
                                                <th>Status</th>
                                                <th>Penulis</th>
                                                <th>Kategori</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td><input type="checkbox" name="selected_posts[]"
                                                            value="{{ $post->id }}"></td>
                                                    <td><a
                                                            href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                                    </td>
                                                    <td>
                                                        @if (\App\Enums\PostStatus::isPublished($post->status))
                                                            <span class="badge badge-success">{{ $post->status }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ $post->status }}</span>
                                                        @endif
                                                    </td>

                                                    <td>{{ $post->author }}</td>
                                                    <td>{{ $post->category }}</td>
                                                    <td>
                                                        @php
                                                            $dates = \App\Helpers\DateHelper::formatDates(
                                                                $post->created_at,
                                                                $post->updated_at,
                                                                $post->deleted_at,
                                                            );
                                                        @endphp

                                                        @if (\App\Enums\PostStatus::isPublished($post->status))
                                                            <small>Telah
                                                                Terbit<br>{{ $dates['updatedAt'] }}</small>
                                                        @elseif (\App\Enums\PostStatus::isDraft($post->status))
                                                            <small>Telah Dibuat Pada<br>{{ $dates['createdAt'] }}</small>
                                                        @else
                                                            <small>Telah Dihapus Pada<br>{{ $dates['deletedAt'] }}</small>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Skrip notifikasi -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify.js/0.4.2/notify.min.js"></script>
    <script>
        $(document).ready(function() {
            // Menampilkan notifikasi jika ada pesan sukses
            @if (session('success'))
                $.notify({
                    title: 'Berhasil!',
                    message: '{{ session('success') }}',
                    icon: 'fa fa-check'
                }, {
                    type: 'success',
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    delay: 2000, // Durasi tampilan notifikasi dalam milidetik
                    timer: 2000 // Durasi tampilan notifikasi dalam milidetik
                });
            @endif

            // Menampilkan notifikasi jika ada pesan error
            @if (session('error'))
                $.notify({
                    title: 'Error!',
                    message: '{{ session('error') }}',
                    icon: 'fa fa-times'
                }, {
                    type: 'danger',
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    delay: 2000, // Durasi tampilan notifikasi dalam milidetik
                    timer: 2000 // Durasi tampilan notifikasi dalam milidetik
                });
            @endif

            // Tombol notifikasi tambahan
            $("#displayNotif").on("click", function() {
                var placementFrom = 'bottom'; // Menampilkan dari bawah
                var placementAlign = 'right'; // Penempatan di kanan
                var state = 'success'; // Jenis notifikasi (success, danger, dll.)
                var style = 'withicon'; // Menampilkan ikon

                var content = {
                    message: 'Notifikasi berhasil ditampilkan!',
                    title: "Notifikasi",
                    icon: style === "withicon" ? "fa fa-bell" : "none",
                    url: "index.html",
                    target: "_blank"
                };

                $.notify(content, {
                    type: state,
                    placement: {
                        from: placementFrom,
                        align: placementAlign
                    },
                    delay: 2000, // Durasi tampilan notifikasi dalam milidetik
                    timer: 2000 // Durasi tampilan notifikasi dalam milidetik
                });
            });

            document.getElementById('select-all').onclick = function() {
                var checkboxes = document.getElementsByName('selected_posts[]');
                for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                }
            }
        });
    </script>
@endsection
