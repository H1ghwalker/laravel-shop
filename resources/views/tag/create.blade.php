@extends('layouts.app')
@section('content')
    <div>
        <h4>Form for adding the tag</h4>
        <form action="{{ route('tag.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Tag name">
            </div>
            <button type="submit" class="btn btn-primary">Add tag</button>
        </form>
    </div>
@endsection
