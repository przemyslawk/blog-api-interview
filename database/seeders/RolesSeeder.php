<?php

namespace Database\Seeders;

use App\Infrastructure\Role\Persistence\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'name' => 'Admin',
            'description' => 'Administrator',
        ]);

        Role::create([
            'name' => 'Editor',
            'description' => 'Editor',
        ]);

        Role::create([
            'name' => 'User',
            'description' => 'User'
        ]);
    }
}
