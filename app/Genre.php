<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name','slug'];

    public function setAttributeSlug(){
        return str_slug($this->name);
    }
}
