@extends('content.layouts.layoutMaster')

@section('title', 'Edit Product')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label" for="name">Product Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}" placeholder="Enter product name">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label" for="description">Description</label>
                <textarea id="description" name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Enter description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label class="form-label" for="price">Price</label>
                <input type="number" step="0.01" id="price" name="price"
                    class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $product->price) }}" placeholder="Enter price">
                @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Stock -->
            <div class="mb-3">
                <label class="form-label" for="stock">Stock</label>
                <input type="number" id="stock" name="stock"
                    class="form-control @error('stock') is-invalid @enderror"
                    value="{{ old('stock', $product->stock) }}" placeholder="Enter stock quantity">
                @error('stock')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('app-ecommerce-product-category') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
