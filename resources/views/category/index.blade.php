@extends('layouts.app')
@section('content')
    <div>
        <a class="btn btn-success mb-3" href="{{ route('category.create') }}">Add category</a>
        @foreach ($categories as $category)
            <div>
                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="{{ route('category.show', $category->id) }}">{{ $category->id }}. {{ $category->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
