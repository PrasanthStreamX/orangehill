<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;

class FmMenuLike extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['type','menu_id','review_id','user_id','author'];
}
