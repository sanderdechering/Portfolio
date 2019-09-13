<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [ ];

    public function image(){
        return $this->hasMany(Image::class);
    }
}
