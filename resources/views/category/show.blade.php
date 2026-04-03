@extends('layouts.app')
@section('content')
    <div>
        <div>{{ $category->id }}. {{ $category->name }}</div>
    </div>
    <div>
        <div>
            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="{{ route('category.edit', $category->id) }}">
                Edit the category
            </a>
        </div>
        <div>
            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Delete category</button>
            </form>
        </div>
    </div>
    <div>
        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            href="{{ route('category.index') }}"><- Get back</a>
    </div>
@endsection
