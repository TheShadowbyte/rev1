@extends('layout')

@section('content')

    <article>
        <h2>
            {{ $post->title }}
        </h2>
        <h5>Published on {{ $post->date }}</h5>
        <p>{{ $post->body }}</p>
    </article>
    <a href="/posts">Go Back</a>

@endsection
