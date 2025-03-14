<?php

namespace Modules\PhotoGallery\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\PhotoGallery\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gallery = Gallery::where('slug', 'default')->first();
        if (is_null($gallery)) {
            $gallery = new Gallery();
            $gallery->title = "Default";
            $gallery->description = "Default Photo Gallery";
            $gallery->save();
        }
    }
}
