<?php

namespace App;

class Translation extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function source()
    {
        return $this->belongsTo(TranslationSource::class);
    }
}
