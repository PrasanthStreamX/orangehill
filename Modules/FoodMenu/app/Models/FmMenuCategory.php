<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class FmMenuCategory extends Model
{
    use SoftDeletes, NodeTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'info','description','note', 'thumb', 'cover_photo', 'parent_id','weight','active'];

}
