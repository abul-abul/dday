<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
   protected $table = 'youtube';

   
	protected $fillable = ['video','width','height', 'article_id','autoplay','info','panel'];
}
