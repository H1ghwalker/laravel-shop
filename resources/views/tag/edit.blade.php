@extends('layouts.app')
@section('content')
    <div>
        <h4>Form for editing the tag</h4>
        <form action="{{ route('tag.update', $tag->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Tag name" value="{{ $tag->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Update tag</button>
        </form>
    </div>
@endsection