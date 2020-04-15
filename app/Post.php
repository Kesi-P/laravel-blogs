<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
   use SoftDeletes;

   protected $fillable = [
     'title','content','category_id','featured','slug'
   ];

   public function getFeaturedAttribute($featured)
   {
     return asset($featured);
   }
   //new date
   protected $date = ['deleted_at'];

   public function category()
   {
     return $this->beongsTo('App\Category');
   }
   //tags->tags be a sigular
   //posts->post p before t
   //create a new table post_tag
   public function tags()
   {
     return $this->belongsToMany('App\Tag');
   }
}
