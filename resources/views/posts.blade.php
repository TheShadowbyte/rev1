<!doctype html>

<title>My Site</title>
<link rel="stylesheet" href="/rev1.css" />

<body>

    <h1>All Posts</h1>

    @foreach ( $posts as $post )
        <article>
            <h2>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h2>
            <h5>Published on {{ $post->date }}</h5>
            <p>{{ $post->excerpt }}</p>
        </article>
    <hr/>
    @endforeach

</body>
