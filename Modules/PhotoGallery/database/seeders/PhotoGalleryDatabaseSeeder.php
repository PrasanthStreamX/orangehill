<?php

namespace Modules\PhotoGallery\Database\Seeders;

use Illuminate\Database\Seeder;

class PhotoGalleryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(GallerySeeder::class);
    }
}
