<?php

namespace Modules\GiftCard\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['price','collection_method','name','email','phone','address_1','address_2','city','zip','party_name','party_email','party_phone'];
}
