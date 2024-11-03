@extends('backend.layouts.main', ['title' => 'Tambah Menu'])

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Tambah Menu</h3>
                </div>
            </div>
            <form method="POST" action="{{ route('menus.store') }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                @csrf
                                {{-- <!-- Menu ID Field -->
                                <div class="mb-3">
                                    <label for="menu_id" class="form-label">Menu ID</label>
                                    <input type="text" name="menu_id" id="menu_id" value="{{ old('menu_id') }}"
                                        class="form-control" required>
                                </div> --}}
                                <input type="hidden" name="menu_id" value="1" required>
                                <!-- Label Field -->
                                <div class="mb-3">
                                    <label for="label" class="form-label">Label</label>
                                    <input type="text" name="label" id="label" value="{{ old('label') }}"
                                        class="form-control" required>
                                </div>

                                <!-- URL Field -->
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="text" name="url" id="url" value="{{ old('url') }}"
                                        class="form-control">
                                </div>

                                <!-- Parent ID Field -->
                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">Parent Menu</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value="">None</option>
                                        @foreach ($menuItems as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('parent_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Order Field -->
                                <div class="mb-3">
                                    <label for="order" class="form-label">Order</label>
                                    <input type="number" name="order" id="order" value="{{ old('order') }}"
                                        class="form-control" required>
                                </div>

                                <!-- Page ID Field -->
                                <div class="mb-3">
                                    <label for="page_id" class="form-label">Page </label>
                                    <select name="page_id" id="page_id" class="form-control">
                                        <option value="">None</option>
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}"
                                                {{ old('page_id') == $page->id ? 'selected' : '' }}>
                                                {{ $page->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
