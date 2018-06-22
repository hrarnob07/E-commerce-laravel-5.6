<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblCategory extends Model
{
   protected $fillable = ['category_name','category_description','publication_status'];
}
