<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;

class FmMenuItemPrice extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['item_id','title','price','active','available', 'weight', 'note'];
}
