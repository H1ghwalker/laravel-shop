@extends('layouts.app')
@section('content')
    <div>
        <h4>Form for adding the category</h4>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Category name">
            </div>
            <button type="submit" class="btn btn-primary">Add category</button>
        </form>
    </div>
@endsection
