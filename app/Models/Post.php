<?php


namespace App\Models;


use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {

    public $title;
    public $slug;
    public $excerpt;
    public $date;
    public $body;

    /**
     * Post constructor.
     *
     * @param $title
     * @param $slug
     * @param $excerpt
     * @param $date
     * @param $body
     */
    public function __construct( $title, $slug, $excerpt, $date, $body ) {
        $this->title   = $title;
        $this->slug    = $slug;
        $this->excerpt = $excerpt;
        $this->date    = $date;
        $this->body    = $body;
    }

    /**
     * @return Collection
     * @throws Exception
     */
    public static function all(): Collection {

        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->slug,
                    $document->excerpt,
                    $document->date,
                    $document->body()
                ))
                ->sortByDesc('date');
        });

    }

    /**
     * @param $slug
     *
     * @return mixed
     * @throws Exception
     */
    public static function find( $slug ) {

        return static::all()->firstWhere('slug', $slug);

    }

    /**
     * @param $slug
     *
     * @return mixed
     * @throws Exception
     */
    public static function findOrFail( $slug ) {

        $post = static::find($slug);

        if ( !$post ) {
            throw new ModelNotFoundException();
        }

        return $post;

    }

}
