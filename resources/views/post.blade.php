<?php

use App\Models\Post;

/**
 * @var Post $post
 */
?>
<!doctype html>

<title>My Site</title>
<link rel="stylesheet" href="/rev1.css" />

<body>

    <article>
        <h2>
            <a href="/posts/<?= $post->slug ?>">
                <?= $post->title; ?>
            </a>
        </h2>
        <h5>Published on <?= $post->date; ?></h5>
        <p><?= $post->body; ?></p>
    </article>
    <a href="/posts">Go Back</a>

</body>
