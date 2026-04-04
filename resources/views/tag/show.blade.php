@extends('layouts.app')
@section('content')
    <div>
        <div>{{ $tag->id }}. {{ $tag->name }}</div>
    </div>
    <div>
        <div>
            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="{{ route('tag.edit', $tag->id) }}">
                Edit the tag
            </a>
        </div>
        <div>
            <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Delete tag</button>
            </form>
        </div>
    </div>
    <div>
        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            href="{{ route('tag.index') }}"><- Get back</a>
    </div>
@endsection
