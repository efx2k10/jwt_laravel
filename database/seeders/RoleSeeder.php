<?php

namespace Database\Seeders;

use App\Models\User\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (['admin', 'user', 'manager'] as $role_name) {
            $role = new Role();
            $role->name = $role_name;
            $role->slug = $role_name;
            $role->save();

            unset($role);

        }


    }
}
