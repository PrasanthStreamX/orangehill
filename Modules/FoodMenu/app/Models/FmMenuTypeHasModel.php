<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FmMenuTypeHasModel extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['type_id','model_type','label','model_id'];

    public function type(): HasOne
    {
        return $this->hasOne(FmMenuTypeHasModel::class, 'type_id', 'id');
    }
}
