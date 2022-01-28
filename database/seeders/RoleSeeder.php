<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleClient = Role::create(['name' => 'Client']);

        Permission::create(['name'=>'admin.index'])->assignRole($roleAdmin);
        Permission::create(['name'=>'category.create'])->assignRole($roleAdmin);
        Permission::create(['name'=>'product.create'])->assignRole($roleAdmin);

        Permission::create(['name'=>'product.index'])->assignRole($roleClient);


    }
}
