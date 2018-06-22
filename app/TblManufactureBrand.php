<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblManufactureBrand extends Model
{
     protected $fillable = ['manufacture_name','manufacture_description','publication_status'];
}
