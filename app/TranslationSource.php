<?php

namespace App;

class TranslationSource extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'source_tag', 'source_id', 'tag_id');
    }

    public function translations()
    {
        return $this->hasMany(Translation::class, 'source_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
