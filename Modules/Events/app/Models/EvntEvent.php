<?php

namespace Modules\Events\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Nwidart\Modules\Facades\Module;

class EvntEvent extends Model
{

    protected $appends = ['foodmenu'];
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','description','notes','start_date','end_date','thumb','active'];

    public function getFoodmenuAttribute()
    {
        $menu = null;
        if(Module::has('FoodMenu')){
            $model_type = 'App\\'.get_class($this);
            $item = DB::table('fm_menu_type_has_models')->where('model_type', $model_type)->where('model_id', $this->id)->first();
            if($item){
                $menu = $item->id;
            }
        }
        return $menu;
    }
}
