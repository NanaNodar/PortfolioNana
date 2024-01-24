<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $create_post = Permission::create([
            'name'=>'create_post'
        ]);
        $edit_post = Permission::create([
            'name'=>'edit_post'
        ]);
        $private = Permission::create([
            'name'=>'private'
        ]);
        $comment_post = Permission::create([
            'name'=>'comment_post'
        ]);
        $like_post = Permission::create([
            'name'=>'like_post'
        ]);

        $admin = Role::create([
            'name'=>'admin'
        ]);
        $post_creator = Role::create([
            'name'=>'post_creator'
        ]);
        $guest = Role::create([
            'name'=>'guest'
        ]);

        $admin->permissions()->attach($private->id);
        $post_creator->permissions()->attach([$create_post->id, $edit_post->id]);
        $guest->permissions()->attach([$comment_post->id, $like_post->id]);

        $user = User::find(1);

        $user->roles()->attach([$admin->id, $post_creator->id,$guest->id]);
    }
    public function down()
    {
        // Revertir las operaciones realizadas en el método run()

        // Eliminar permisos
        Permission::whereIn('name', ['create_post', 'edit_post', 'private', 'comment_post', 'like_post'])->delete();

        // Eliminar roles
        Role::whereIn('name', ['admin', 'post_creator', 'guest'])->delete();
    }
}
