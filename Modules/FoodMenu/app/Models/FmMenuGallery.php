<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;

class FmMenuGallery extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['menu_id','media','media_type','storage','title'];
}
