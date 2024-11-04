@extends('backend.layouts.main')

@push('css')
    <style>
        /* General styling for Nestable items */
        .dd {
            max-width: 600px;
            margin: 20px auto;
        }

        /* Styling for each menu item handle */
        .dd-item>.dd-handle {
            padding: 12px 16px;
            margin-bottom: 6px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: move;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
        }

        /* Nested list visual hierarchy */
        .dd-list {
            padding-left: 20px;
            border-left: 2px solid #ddd;
            margin-top: 8px;
        }

        /* Remove any built-in expand/collapse buttons */
        .dd-item>button {
            display: none !important;
        }

        /* Special styling for the dragging element */
        .dd-dragel {
            position: absolute;
            pointer-events: none;
            z-index: 1000;
        }

        .dd-dragel .dd-handle {
            background-color: #e2e6ea;
            border-color: #ccc;
        }

        /* Card container for the menu */
        .card {
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 16px;
        }

        /* Button styling */
        .submit-btn {
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endpush

@section('body')
    <div class="container">
        <div class="page-inner">
            <h3 class="fw-bold mb-3">Menu Structure</h3>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Tambah Menu</h2>
                            <form action="{{ route('menus.store') }}" method="POST" class="p-4 border rounded">
                                @csrf


                                <!-- Label Field -->
                                <div class="mb-3">
                                    <label for="label" class="form-label">Label</label>
                                    <input type="text" name="label" id="label" class="form-control" required
                                        maxlength="255">
                                    @error('label')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- URL Field -->
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL (optional)</label>
                                    <input type="text" name="url" id="url" class="form-control"
                                        maxlength="255">
                                    @error('url')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Parent ID Field -->
                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">Parent (optional)</label>
                                    <select name="parent_id" id="parent_id" class="form-select">
                                        <option value="" selected>-- Select Parent --</option>
                                        @foreach ($menuItems as $item)
                                            <option value="{{ $item->id }}">{{ $item->label }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Order Field -->
                                {{-- <div class="mb-3">
                                    <label for="order" class="form-label">Order</label>
                                    <input type="number" name="order" id="order" class="form-control" required>
                                    @error('order')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <!-- Page ID Field -->
                                <div class="mb-3">
                                    <label for="page_id" class="form-label">Page (optional)</label>
                                    <select name="page_id" id="page_id" class="form-select">
                                        <option value="" selected>-- Select Page --</option>
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('page_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Save Menu Item</button>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Struktur Menu</h2>
                            <!-- Nestable Menu Structure -->
                            <div class="dd" id="nestable">
                                <ol class="dd-list">
                                    @foreach ($menus as $menu)
                                        @foreach ($menu->items as $item)
                                            <li class="dd-item" data-id="{{ $item->id }}">
                                                <div class="dd-handle d-flex justify-content-between align-items-center">
                                                    {{ $item->label }}
                                                    <!-- Dropdown for Actions -->
                                                    <div class="dropdown" style="display: inline-block;">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle"
                                                            type="button" id="dropdownMenuButton{{ $item->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">

                                                        </button>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton{{ $item->id }}">
                                                            <li>
                                                                <form action="{{ route('menu-items.destroy', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Check for children and render nested items -->
                                                @if ($item->children->isNotEmpty())
                                                    <ol class="dd-list">
                                                        @foreach ($item->children as $child)
                                                            <li class="dd-item" data-id="{{ $child->id }}">
                                                                <div
                                                                    class="dd-handle d-flex justify-content-between align-items-center">
                                                                    {{ $child->label }}
                                                                    <div class="dropdown" style="display: inline-block;">
                                                                        <button
                                                                            class="btn btn-sm btn-primary dropdown-toggle"
                                                                            type="button"
                                                                            id="dropdownMenuButton{{ $child->id }}"
                                                                            data-bs-toggle="dropdown" aria-expanded="false">

                                                                        </button>
                                                                        <ul class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton{{ $child->id }}">
                                                                            <li>
                                                                                <form
                                                                                    action="{{ route('menu-items.destroy', $child->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="dropdown-item"
                                                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                                <!-- Check for sub-children -->
                                                                @if ($child->children->isNotEmpty())
                                                                    <ol class="dd-list">
                                                                        @foreach ($child->children as $subchild)
                                                                            <li class="dd-item"
                                                                                data-id="{{ $subchild->id }}">
                                                                                <div
                                                                                    class="dd-handle d-flex justify-content-between align-items-center">
                                                                                    {{ $subchild->label }}
                                                                                    <div class="dropdown"
                                                                                        style="display: inline-block;">
                                                                                        <button
                                                                                            class="btn btn-sm btn-primary dropdown-toggle"
                                                                                            type="button"
                                                                                            id="dropdownMenuButton{{ $subchild->id }}"
                                                                                            data-bs-toggle="dropdown"
                                                                                            aria-expanded="false">

                                                                                        </button>
                                                                                        <ul class="dropdown-menu"
                                                                                            aria-labelledby="dropdownMenuButton{{ $subchild->id }}">
                                                                                            <li>
                                                                                                <form
                                                                                                    action="{{ route('menu-items.destroy', $subchild->id) }}"
                                                                                                    method="POST">
                                                                                                    @csrf
                                                                                                    @method('DELETE')
                                                                                                    <button type="submit"
                                                                                                        class="dropdown-item"
                                                                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                                                                </form>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ol>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <!-- Hidden field to store serialized menu structure -->
            <textarea id="nestable-output" name="menu_structure" style="display: none;"></textarea>

        </div>
    </div>
@endsection

@push('scripts')
    <!-- Load jQuery and Nestable2 in correct order -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/nestable2@1.6.0/jquery.nestable.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Nestable with maxDepth set to 3
            $('#nestable').nestable({
                maxDepth: 3, // Limit nesting depth to 3 levels
                noDragClass: 'dd-nodrag'
            }).on('change', function() {
                // Serialize the structure whenever it changes
                const serializedData = $('#nestable').nestable('serialize');

                // Send the serialized data to the server via AJAX
                $.ajax({
                    url: '{{ route('menu.updateOrder') }}',
                    method: 'POST',
                    data: {
                        menu_structure: serializedData,
                        _token: '{{ csrf_token() }}' // Add CSRF token for security
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log(response.message);
                        } else {
                            console.error('Failed to update menu order.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('An error occurred:', error);
                    }
                });
            });
        });
    </script>
    <!-- JavaScript untuk menghindari konflik drag -->
    <script>
        document.querySelectorAll('.dropdown').forEach(handle => {
            handle.addEventListener('mousedown', function(event) {
                event.stopPropagation(); // Menghentikan propagasi event untuk menghindari konflik
            });
        });
    </script>
@endpush
