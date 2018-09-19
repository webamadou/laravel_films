<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['name','slug','description','release_date','rating','ticket_price','country_id','genre_id','photo',];

    public function genre(){
        return $this->belongsTo('App\Genre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(){
        return $this->belongsTo('App\Country');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function setAttributeSlug(){
        return Str::slug($this->name);
    }
}
