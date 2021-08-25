<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**Super Admin */
        $user = User::create([
            'name' => 'Root', 
            'email' => 'root@root.com',
            'password' => bcrypt('123123'),
            'email_verified_at' => date("Y-m-d H:i:s")
        ]);    
        $role = Role::create(['name' => 'Super Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        /**Operador */
        $role = Role::create(['name' => 'Operador']);     
        $permissions = Permission::where('name', 'like', 'cliente-%')->pluck('id','id');   
        $role->syncPermissions($permissions);
    }
}
