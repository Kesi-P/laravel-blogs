<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
   use SoftDeletes;

   protected $fillable = [
     'title','content','category_id','featured'
   ];
   //new date
   protected $date = ['deleted_at'];

   public function category()
   {
     return $this->beongsTo('App\Category');
   }
}
