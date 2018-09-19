<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Genre extends Model
{
    protected $fillable = ['name','slug'];

    public function films(){
        return $this->hasMany('App\Film');
    }

    public function setAttributeSlug(){
        return Str::slug($this->name);
    }
}
