@extends('layout')

@section('content')

    <h1>All Posts</h1>

    @foreach ( $posts as $post )

        <article class="{{ $loop->even ? 'even' : 'odd' }}">
            <h2>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h2>
            <p style="overflow: hidden;">
                <a href="/categories/{{ $post->category->slug }}" style="background: red; color: white; float: left; padding: 5px 10px; text-decoration: none;">{{ $post->category->name }}</a>
            </p>
            <h5>Published on {{ $post->created_at }}</h5>
            <p>{{ $post->excerpt }}</p>
        </article>

        <hr/>

    @endforeach

@endsection
