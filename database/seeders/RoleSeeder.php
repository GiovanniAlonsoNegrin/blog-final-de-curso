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

        $permission = Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        $permission = Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.categories.destory'])->syncRoles([$role1, $role2]);;

        $permission = Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.tags.destory'])->syncRoles([$role1, $role2]);;

        $permission = Permission::create(['name' => 'admin.allposts'])->syncRoles([$role1, $role2]);;

        $permission = Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);;
        $permission = Permission::create(['name' => 'admin.posts.destory'])->syncRoles([$role1, $role2]);;
    }
}
