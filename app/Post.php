<?php

namespace App;
use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     use Taggable;

     protected $fillable = ['title', 'description'];
}
