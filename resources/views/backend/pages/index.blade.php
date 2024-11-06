@extends('backend.layouts.main', ['title' => 'Indeks Halaman'])

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Halaman</h3>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="{{ route('pages.create') }}" class="btn btn-label-info btn-round me-2"><i class="fa fa-plus"></i>
                        Tambah Halaman</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pages.bulk_action') }}" method="POST">
                                @csrf
                                <div class="d-flex mb-3">
                                    <select name="action" class="form-select me-2" style="width: 200px;">
                                        <option value="" disabled selected>Pilih Tindakan Bulk</option>
                                        <option value="trash">Pindahkan ke Sampah</option>
                                        <option value="publish">Terbitkan</option>
                                        <option value="draft">Buat Menjadi Draft</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Terapkan</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>Judul</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                                <th>Tanggal Dibuat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pages as $page)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="selected_pages[]"
                                                            value="{{ $page->id }}">
                                                    </td>
                                                    <td><a
                                                            href="{{ route('pages.show', $page->id) }}">{{ $page->title }}</a>
                                                    </td>
                                                    <td>{{ $page->slug }}</td>
                                                    <td>
                                                        @if ($page->status === 'published')
                                                            <span
                                                                class="badge badge-success">{{ ucfirst($page->status) }}</span>
                                                        @else
                                                            <span
                                                                class="badge badge-danger">{{ ucfirst($page->status) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $page->created_at->format('d M Y') }}</td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            document.getElementById('select-all').onclick = function() {
                var checkboxes = document.getElementsByName('selected_pages[]');
                for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                }
            }
        });
    </script>
@endpush
