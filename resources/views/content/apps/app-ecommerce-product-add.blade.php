@extends('content.layouts.layoutMaster')

@section('title', 'eCommerce Product Add - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-product-add.js') }}"></script>
    <script>
        const form = document.querySelector('form');
        const hidden = document.querySelector('#description');
        const editor = document.querySelector('#ecommerce-category-description');

        form.addEventListener('submit', function() {
            hidden.value = editor.querySelector('.ql-editor').innerHTML;
        });
    </script>
@endsection

@section('content')
    <h2 class="py-3 mb-0">
        <span class="text-slate-950">افزودن محصول</span>
    </h2>
    {{-- add customer --}}
    <form action="{{ url('/app/ecommerce/product/add') }}" method="POST">
        @csrf
        <div class="row">
            <!-- First column-->
            <div class="col-12 col-lg-8">
                <!-- Product Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">Product information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-name">Name</label>
                            <input type="text" class="form-control" id="ecommerce-product-name"
                                placeholder="Product name" name="name" aria-label="Product name">
                        </div>
                        <div class="row mb-3">
                            <div class="col"><label class="form-label" for="ecommerce-product-price">PRICE</label>
                                <input type="number" class="form-control" id="ecommerce-product-price" placeholder="PRICE"
                                    name="price" aria-label="Product PRICE">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
    <div class="app-ecommerce">

        <!-- Add Product -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

            <div class="d-flex flex-column justify-content-center bg-red-800">
                <h4 class="mb-1 mt-3 bg"></h4>

            </div>
        </div>

        <form action="{{ url('/app/ecommerce/product/add') }}" method="POST">
            @csrf
            <div class="row">
                <!-- First column-->
                <div class="col-12 col-lg-8">
                    <!-- Product Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Product information</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-name">Name</label>
                                <input type="text" class="form-control" id="ecommerce-product-name"
                                    placeholder="Product name" name="name" aria-label="Product name">
                            </div>
                            <div class="row mb-3">
                                <div class="col"><label class="form-label" for="ecommerce-product-price">PRICE</label>
                                    <input type="number" class="form-control" id="ecommerce-product-price"
                                        placeholder="PRICE" name="price" aria-label="Product PRICE">
                                </div>
                                <div class="col"><label class="form-label"
                                        for="ecommerce-product-quantity">quantity</label>
                                    <input type="text" class="form-control" id="ecommerce-product-quantity"
                                        placeholder="0" name="stock" aria-label="Product quantity">
                                </div>
                            </div>
                            <!-- Description -->
                            <div>
                                <input type="hidden" name="description" id="description">
                                <label class="form-label">Description (Optional)</label>
                                <div class="form-control p-0 pt-1">
                                    <div class="comment-toolbar border-0 border-bottom">
                                        <div class="d-flex justify-content-start">
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
                                    <div class="comment-editor border-0 pb-4" id="ecommerce-category-description">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    @endsection
