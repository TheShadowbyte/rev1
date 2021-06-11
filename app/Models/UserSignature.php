<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mews\Purifier\Facades\Purifier;

class UserSignature extends Model
{
    use HasFactory;

    protected $attributes = array(
        'content' => ''
    );

    /**
     * @param $content
     */
    public function setContentAttribute($content) {

        $this->attributes['content'] = Purifier::clean($content);

    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public static function find( $user_id ) {

        return static::all()->firstWhere('user_id', $user_id);

    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public static function findOrFail( $user_id ) {

        $user_signature = static::find($user_id);

        if ( !$user_signature ) {
            throw new ModelNotFoundException();
        }

        return $user_signature;

    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
