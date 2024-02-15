<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
          Role::create(['name' => 'superadmin','guard_name'=>'web']);
          Role::create(['name' => 'user','guard_name'=>'web']);

//        $adminRole->givePermissionTo('all');
    }
}
