<?php

namespace App;

class Tag extends Model
{
    protected $table = "tags";

    public function words()
    {
        return $this->belongsToMany(Word::class,'word_tag','tag_id','word_id');
    }

    public function sources()
    {
        return $this->belongsToMany(Tag::class, 'source_tag', 'tag_id', 'source_id');
    }
}
