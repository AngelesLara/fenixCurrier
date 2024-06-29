<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'ADMIN']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'admin.home', 'description' => 'ver panel de control'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.usuarios.index', 'description' => 'ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.edit', 'description' => 'asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.empleados.index', 'description' => 'ver listado de empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.create', 'description' => 'crear empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.edit', 'description' => 'editar empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.destroy', 'description' => 'eliminar empleado'])->syncRoles([$role1]);


        Permission::create(['name' => 'admin.clientes.index', 'description' => 'ver listado de clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.create', 'description' => 'crear cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.edit', 'description' => 'editar cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.destroy', 'description' => 'eliminar cliente'])->syncRoles([$role1]);


        Permission::create(['name' => 'admin.destinos.index', 'description' => 'ver listado de destinos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.destinos.create', 'description' => 'crear destinos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.destinos.edit', 'description' => 'editar destinos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.destinos.destroy', 'description' => 'eliminar destinos'])->syncRoles([$role1]);


        Permission::create(['name' => 'admin.trucks.index', 'description' => 'ver listado de camiones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.trucks.create', 'description' => 'crear camiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.trucks.edit', 'description' => 'editar camiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.trucks.destroy', 'description' => 'eliminar camiones'])->syncRoles([$role1]);


        Permission::create(['name' => 'admin.paquetes.index', 'description' => 'ver listado de paquetes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.paquetes.create', 'description' => 'crear paquetes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.paquetes.edit', 'description' => 'editar paquetes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.paquetes.destroy', 'description' => 'eliminar paquetes'])->syncRoles([$role1]);


        Permission::create(['name' => 'admin.envios.index', 'description' => 'ver listado de envios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.envios.create', 'description' => 'crear envios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.envios.edit', 'description' => 'editar envios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.envios.destroy', 'description' => 'eliminar envios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.salidas.index', 'description' => 'ver listado de salidas de envios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.salidas.create', 'description' => 'crear salidas de envios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.salidas.edit', 'description' => 'editar salidas de envios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.salidas.destroy', 'description' => 'eliminar salidas de envios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.encargadotrucks.index', 'description' => 'ver listado de encargado de los camiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.encargadotrucks.create', 'description' => 'crear encargado de los camiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.encargadotrucks.edit', 'description' => 'editar encargado de los camiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.encargadotrucks.destroy', 'description' => 'eliminar encargado de los camiones'])->syncRoles([$role1]);
    }
}
