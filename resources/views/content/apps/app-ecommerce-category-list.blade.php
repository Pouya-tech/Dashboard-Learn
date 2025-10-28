@extends('content.layouts.layoutMaster')

@section('title', 'eCommerce Product Category - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-ecommerce.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-category-list.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">eCommerce /</span> Category List
    </h4>

    <div class="app-ecommerce-category">
        <!-- Category List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table id="productTable"
                    class="table table-striped table-bordered text-center align-middle datatables-category-list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-nowrap text-sm-end"> Name &nbsp;</th>
                            <th class="text-nowrap text-sm-end"> Description </th>
                            <th class="text-lg-center">Price</th>
                            <th class="text-nowrap text-sm-end"> stock </th>
                            <th class="text-nowrap text-sm-end"> Edit </th>
                            <th class="text-nowrap text-sm-end"> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{!! $product->description !!}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td><a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                        class="btn btn-md btn-primary ">Edit</a></td>
                                <td>
                                    <form action="{{ route('product.delete', $product->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا برای حذف مطمئنید؟')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Offcanvas to add new customer -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList"
            aria-labelledby="offcanvasEcommerceCategoryListLabel">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4">
                <h5 id="offcanvasEcommerceCategoryListLabel" class="offcanvas-title">Add Category</h5>
                <button type="button" class="btn-close bg-label-secondary text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <!-- Offcanvas Body -->
            <div class="offcanvas-body border-top">
                <form class="pt-0" id="eCommerceCategoryListForm" onsubmit="return true">
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-category-title">Title</label>
                        <input type="text" class="form-control" id="ecommerce-category-title"
                            placeholder="Enter category title" name="categoryTitle" aria-label="category title">
                    </div>
                    <!-- Slug -->
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-category-slug">Slug</label>
                        <input type="text" id="ecommerce-category-slug" class="form-control" placeholder="Enter slug"
                            aria-label="slug" name="slug">
                    </div>
                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-category-image">Attachment</label>
                        <input class="form-control" type="file" id="ecommerce-category-image">
                    </div>
                    <!-- Parent category -->
                    <div class="mb-3 ecommerce-select2-dropdown">
                        <label class="form-label" for="ecommerce-category-parent-category">Parent category</label>
                        <select id="ecommerce-category-parent-category" class="select2 form-select"
                            data-placeholder="Select parent category">
                            <option value="">Select parent Category</option>
                            <option value="Household">Household</option>
                            <option value="Management">Management</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Office">Office</option>
                            <option value="Automotive">Automotive</option>
                        </select>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div class="form-control p-0 py-1">
                            <div class="comment-editor border-0" id="ecommerce-category-description">
                            </div>
                            <div class="comment-toolbar border-0">
                                <div class="d-flex justify-content-end">
                                    <span class="ql-formats me-0">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Status -->
                    <div class="mb-4 ecommerce-select2-dropdown">
                        <label class="form-label">Select category status</label>
                        <select id="ecommerce-category-status" class="select2 form-select"
                            data-placeholder="Select category status">
                            <option value="">Select category status</option>
                            <option value="Scheduled">Scheduled</option>
                            <option value="Publish">Publish</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <!-- Submit and reset -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Add</button>
                        <button type="reset" class="btn bg-label-danger" data-bs-dismiss="offcanvas">Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<style>
    #productTable {
        table-layout: fixed !important;
        width: 100% !important;
    }

    #productTable th,
    #productTable td {
        text-align: center !important;
        vertical-align: middle !important;
        white-space: nowrap !important;
    }

    #productTable th:nth-child(1),
    #productTable td:nth-child(1) {
        width: 10% !important;
    }

    #productTable th:nth-child(2),
    #productTable td:nth-child(2) {
        width: 20% !important;
    }

    #productTable th:nth-child(3),
    #productTable td:nth-child(3) {
        width: 35% !important;
    }

    #productTable th:nth-child(4),
    #productTable td:nth-child(4) {
        width: 20% !important;
    }

    #productTable th:nth-child(5),
    #productTable td:nth-child(5) {
        width: 15% !important;
    }

    #productTable th:nth-child(6),
    #productTable td:nth-child(6) {
        width: 14% !important;
    }

    #productTable th:nth-child(7),
    #productTable td:nth-child(7) {
        width: 14% !important;
    }
</style>
