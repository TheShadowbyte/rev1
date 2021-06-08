<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;

class UserSignature extends Model
{
    use HasFactory;

    public function setContentAttribute($content) {
        $this->attributes['content'] = Purifier::clean($content);
    }

}
