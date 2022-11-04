<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SeederTableRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisions = [
            "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"
        ];
        $role = Role::create(['name' => 'Super Usuario']);
        $role->syncPermissions($permisions);

//        $permisions = [
//            "5", "6", "7", "8", "17", "19", "21", "22", "23", "24",'25', '26', '27', '28', '29', '30', '31', '32',
//        ];
//        $role = Role::create(['name' => 'Administrador']);
//        $role->syncPermissions($permisions);
    }
}
