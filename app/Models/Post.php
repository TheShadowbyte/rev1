<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body'];

    /**
     * @param $id
     *
     * @return mixed
     */
    public static function find( $id ) {

        return static::all()->firstWhere('id', $id);

    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public static function findOrFail( $id ) {

        $post = static::find($id);

        if ( !$post ) {
            throw new ModelNotFoundException();
        }

        return $post;

    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

}
