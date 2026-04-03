@extends('layouts.app')
@section('content')
    <div>
        <h4>Form for adding the product</h4>
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Product name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control" name="description" placeholder="Product description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="price">Price</label>
                <input value="{{ old('price') }}" class="form-control" name="price" step="0.01" min="0"
                    placeholder="0.00">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Image</label>
                <input type="text" class="form-control" name="image" placeholder="Image URL">
            </div>
            <div class="mb-3">
                <label class="form-label" for="stock">Stock</label>
                <input value="{{ old('stock') }}" type="number" class="form-control" name="stock" step="any"
                    min="0" placeholder="0">
                @error('stock')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="category">Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? 'selected' : '' }} 
                            value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tags">Tags</label>
                <select class="form-select" multiple aria-label="Multiple select example" name="tags[]">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add product</button>
        </form>
    </div>
@endsection
