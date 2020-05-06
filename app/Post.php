<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;
class Post extends Model
{
  //  use SoftDeletes;
    
    protected $guarded = [];

    protected $dates =['published_at'];

    public function category() //$post->category->name
    {
        return $this->belongsTo(Category::class);
    }

    public function tags() //$post->category->name
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {

      $query->whereNotNull('published_at')
             ->where('published_at','<=', Carbon::now())
             ->latest('published_at');

    }

    public function getRoutekeyName()
    {

     return 'url';

    }

    public function photos()
    {
      return $this->hasMany(Photo::class);
    }
}
