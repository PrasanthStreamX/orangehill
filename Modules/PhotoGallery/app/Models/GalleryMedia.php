<?php

namespace Modules\PhotoGallery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GalleryMedia extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['gallery_id','media_id', 'weight'];

    public function gallery(): HasOne
    {
        return $this->hasOne(Gallery::class);
    }
    public function media(): HasOne
    {
        return $this->hasOne(Media::class);
    }
    
}
