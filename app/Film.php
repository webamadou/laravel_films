<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['name','slug','description','release_date','rating','ticket_price','country_id','genre_id','photo',];

    public function genre(){
        return $this->belongsTo('App\Genre');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function setAttributeSlug(){
        return Str::slug($this->name);
    }
}
