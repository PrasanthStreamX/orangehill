<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\FoodMenu\Database\Factories\FmMenuPriceFactory;

class FmMenuPrice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['type_id', 'item_id', 'title','price','weight','note'];

    // protected static function newFactory(): FmMenuPriceFactory
    // {
    //     // return FmMenuPriceFactory::new();
    // }
}
