@extends('layouts.app')
@section('content')
    <div>
        <h4>Form for editing the category</h4>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Category name" value="{{ $category->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Update category</button>
        </form>
    </div>
@endsection