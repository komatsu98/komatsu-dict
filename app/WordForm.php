<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordForm extends Model
{
    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
