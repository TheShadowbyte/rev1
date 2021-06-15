@extends('layout')

@section('content')

    <article>
        <h2>
            {{ $post->title }}
        </h2>
        <p style="overflow: hidden;">
            <a href="/categories/{{ $post->category->slug }}" style="background: red; color: white; float: left; padding: 5px 10px; text-decoration: none;">{{ $post->category->name }}</a>
        </p>
        <strong><p>Author: <a href="#">{{ $post->user->name }}</a></p></strong>
        <h5>Published on {{ $post->created_at }}</h5>
        <p>{{ $post->body }}</p>
    </article>
    <a href="/posts">Go Back</a>

@endsection
