<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Place;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\PlaceCategory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name'=>'admin'
        ]);
        Role::create([
            'name'=>'user'
        ]);
        User::factory()->create([
            'name' => 'admin',
            'surname'=>'admin2',
            'role_id'=>1,
            'email' => 'admin@example.com',
            'password'=>bcrypt('qwerty12345')
        ]);
        User::factory()->create([
            'name' => 'user',
            'surname'=>'user2',
            'role_id'=>2,
            'email' => 'user@example.com',
            'password'=>bcrypt('qwerty12345')
        ]);
        PlaceCategory::factory(5)->create();
        Place::factory()->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
