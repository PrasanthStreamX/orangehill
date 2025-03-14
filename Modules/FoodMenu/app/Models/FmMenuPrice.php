<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;

class FmMenuPrice extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['menu_id','type','price','active','available','note'];
}
