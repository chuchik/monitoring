<?php

use Illuminate\Database\Seeder;

class AddRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            'name' => 'super',
            'description' => 'Super user of system',
            'internal_role' => true
        ]);
        \App\Role::create([
            'name' => 'admin',
            'description' => 'Administrator account',
            'internal_role' => false
        ]);
        \App\Role::create([
            'name' => 'user',
            'description' => 'Standard user of account',
            'internal_role' => false
        ]);
    }
}
