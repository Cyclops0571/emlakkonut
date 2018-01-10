<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApartmentVideosUrl extends Model
{
    protected $fillable = ['apartment_id', 'url', 'name'];
}
