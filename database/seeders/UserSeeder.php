<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'dev.streamx@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Administrator";
            $user->email = "dev.streamx@gmail.com";
            $user->username = 'superadmin';
            $user->password = Hash::make('abc@123');
            $user->email_verified_at = now();
            $user->save();
        }
    }
}
