<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedLink extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','info', 'description', 'url', 'thumb', 'weight', 'active'];
}
