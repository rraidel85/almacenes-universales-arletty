<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisions = [
            //table roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //table users
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

             //table ventas
             'ver-venta',
             'crear-venta',
             'editar-venta',
             'borrar-venta',

             
        ];

        foreach ($permisions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
