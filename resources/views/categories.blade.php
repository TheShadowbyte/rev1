@extends('layout')

@section('content')

    <h1>All Categories</h1>

    @foreach ( $categories as $category )

        <h4>
            <a href="/categories/{{ $category->slug }}">
                {{ $category->name }}
            </a>
        </h4>

        @foreach( $category->posts as $post )
            <h5>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h5>
        @endforeach

        <hr/>

    @endforeach

@endsection
