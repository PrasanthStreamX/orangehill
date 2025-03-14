<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;

class FmMenuReview extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['menu_id','user_id','author','comment'];
    
}
