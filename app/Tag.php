<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $guarded = [];

    public function words()
    {
        return $this->belongsToMany(Word::class,'word_tag','tag_id','word_id');
    }
}
