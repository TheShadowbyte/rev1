@extends('layout')

@section('content')

    <h1>All Posts</h1>

    @foreach ( $posts as $post )

        <article class="{{ $loop->even ? 'even' : 'odd' }}">
            <h2>
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h2>
            <h5>Published on {{ $post->date }}</h5>
            <p>{{ $post->excerpt }}</p>
        </article>

        <hr/>

    @endforeach

@endsection
