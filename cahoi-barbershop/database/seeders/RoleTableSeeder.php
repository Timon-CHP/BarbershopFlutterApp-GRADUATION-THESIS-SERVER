<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_id' => '1',
            'name' => 'admin',
        ]);
        
        Role::create([
            'role_id' => '2',
            'name' => 'user',
        ]);
    }
}
