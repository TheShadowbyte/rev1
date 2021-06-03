<?php


namespace App\Models;


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
     */
    public static function all() {

        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->slug,
                $document->excerpt,
                $document->date,
                $document->body()
            ));

    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public static function find( $slug ) {

        return static::all()->firstWhere('slug', $slug);

    }

}
