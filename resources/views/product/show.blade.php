@extends('layouts.app')
@section('content')
    <div>
        <div>{{ $product->id }}. {{ $product->name }}</div>
        <div>Description: {{ $product->description }}</div>
    </div>
    <div>
        <div>
            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="{{ route('product.edit', $product->id) }}">
                Edit the product
            </a>
        </div>
        <div>
            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Delete product</button>
            </form>
        </div>
    </div>
    <div>
        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            href="{{ route('product.index') }}"><- Get back</a>
    </div>
@endsection
