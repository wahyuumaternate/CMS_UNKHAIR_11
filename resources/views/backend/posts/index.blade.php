@extends('backend.layouts.main', ['title' => 'Posts'])

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <div class="page-header">
                        <h3 class="fw-bold mb-3 fs-3">All Posts</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="{{ route('dashboard') }}">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">All Posts</a>
                            </li>
                            {{-- <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Basic Form</a>
                            </li> --}}
                        </ul>
                        </ul>
                        <div class="ms-md-auto py-2 py-md-0">
                            {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
                            {{-- <a href="#" class="btn btn-primary btn-round"><i class="fa fa-plus"></i> Tambah User</a> --}}
                        </div>
                    </div>
                    <a href="{{ route('posts.index') }}" class="me-2">
                        <i class="fa fa-list"></i> Semua ({{ $totalPosts }})
                    </a>
                    @if ($hasTrashed)
                        <a href="{{ route('posts.index', ['status' => 'trashed']) }}">
                            <i class="fa fa-trash"></i> Sampah ({{ $totalTrashed }})
                        </a>
                    @endif
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="{{ route('posts.create') }}" class="btn btn-label-info btn-round me-2"><i
                            class="fa fa-plus"></i> Tambah Post</a>
                    <!-- Tambahkan tombol notifikasi -->
                    {{-- <a href="#" id="displayNotif" class="btn btn-success">Tampilkan Notifikasi</a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="bulk-action-form" action="{{ route('posts.bulk_action') }}" method="POST">

                                @csrf
                                <div class="d-flex mb-3">
                                    <select id="bulkActionSelect" name="action" class="form-select me-2"
                                        style="width: 200px;">
                                        <option value="" disabled selected>Pilih Tindakan Bulk</option>
                                        @if ($status !== 'trashed')
                                            <option value="trash">Pindahkan ke Sampah</option>
                                            <option value="publish">Terbitkan</option>
                                            <option value="draft">Buat Menjadi Draft</option>
                                        @else
                                            <option value="delete">Hapus Permanen</option>
                                            <option value="kembalikan">Kembalikan</option>
                                        @endif
                                    </select>
                                    <button type="button" id="applyAction" class="btn btn-primary">Terapkan</button>
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
                                                    <td>
                                                        <input type="checkbox" name="selected_posts[]"
                                                            value="{{ $post->id }}">
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a>
                                                    </td>
                                                    <td>
                                                        @if (\App\Enums\PostStatus::isPublished($post->status))
                                                            <span class="badge badge-success">{{ $post->status }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ $post->status }}</span>
                                                        @endif
                                                    </td>

                                                    <td>{{ $post->author }}</td>
                                                    <td>
                                                        {{-- @foreach ($post->categories as $category)
                                                            {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                                                        @endforeach --}}
                                                        @foreach ($categories as $category)
                                                            @if ($category->id == $post->category_id)
                                                                {{ $category->name }}
                                                            @endif
                                                        @endforeach
                                                        {{-- {{ $post->categories->name }} --}}
                                                    </td>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            document.getElementById('select-all').onclick = function() {
                var checkboxes = document.getElementsByName('selected_posts[]');
                for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const applyButton = document.getElementById('applyAction');

            if (applyButton) {
                applyButton.addEventListener('click', function() {
                    const selectedAction = document.getElementById('bulkActionSelect').value;

                    if (selectedAction === 'delete') {
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, Hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('bulk-action-form').submit();
                            }
                        });
                    } else if (selectedAction) {
                        document.getElementById('bulk-action-form').submit();
                    } else {
                        Swal.fire({
                            title: 'Pilih Tindakan',
                            text: 'Anda harus memilih tindakan sebelum menerapkan!',
                            icon: 'info',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    </script>
@endpush
