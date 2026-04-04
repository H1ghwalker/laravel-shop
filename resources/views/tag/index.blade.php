@extends('layouts.app')
@section('content')
    <div>
        <a class="btn btn-success mb-3" href="{{ route('tag.create') }}">Add tag</a>
        @foreach ($tags as $tag)
            <div>
                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="{{ route('tag.show', $tag->id) }}">{{ $tag->id }}. {{ $tag->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
