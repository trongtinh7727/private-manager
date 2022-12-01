<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateSupperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'AdminAdmin',
            'email' => 'root@app.com',
            'password' => bcrypt('12345678'),
        ]);
        //$role = Role::create(['name' => 'Admin']);
        $role = Role::findByName('SupperAdmin');
        //$permissions = Permission::pluck('id','id')->all();
        //$role->syncPermissions($permissions);
        $permissions = DB::table('permissions')->where('name', 'LIKE', "all")->pluck('id', 'id')->all();
        $role->givePermissionTo($permissions);
        $user->assignRole([$role->id]);
    }
}
