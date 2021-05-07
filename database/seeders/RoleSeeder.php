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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Moderador']);

        $permission = Permission::create(['name' => 'admin.home', 'description' => 'Ver panel administrativo'])->syncRoles([$role1, $role2]);

        $permission = Permission::create(['name' => 'admin.users.index', 'description' => 'Ver usuarios'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.users.edit', 'description' => 'Asignar roles'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.users.destroy', 'description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver roles'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.roles.edit', 'description' => 'Asignar permisos'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver categorías'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear categorías'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar categorías'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.categories.destroy', 'description' => 'Eliminar categorías'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'admin.tags.index', 'description' => 'Ver etiquetas'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.tags.create', 'description' => 'Crear etiquetas'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.tags.edit', 'description' => 'Editar etiquetas'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.tags.destroy', 'description' => 'Eliminar etiquetas'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'admin.allposts', 'description' => 'Ver todos los posts'])->syncRoles([$role1, $role2]);

        $permission = Permission::create(['name' => 'admin.posts.index', 'description' => 'Ver tus propios posts'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.posts.create', 'description' => 'Crear posts'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.posts.edit', 'description' => 'Editar posts'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.posts.destroy', 'description' => 'Eliminar post'])->syncRoles([$role1, $role2]);
    }
}
