@extends('layouts.app')
@section('content')
    <div>
        <a class="btn btn-success mb-3" href="{{ route('product.create') }}">Add product</a>
        @foreach ($products as $product)
            <div>
                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="{{ route('product.show', $product->id) }}">{{ $product->id }}. {{ $product->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
