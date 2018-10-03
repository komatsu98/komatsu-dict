<?php

namespace App;

class WordForm extends Model
{
    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
