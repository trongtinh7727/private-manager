<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CreateRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create roles';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $roles = ['SupperAdmin', 'Admin', 'User'];
        foreach ($roles as $role) {
            $r = Role::create(['name' => $role]);
        }
        // give permission to SupperAdmin
        $role = Role::findByName('SupperAdmin');
        $permissions = DB::table('permissions')->where('name', 'LIKE', "all")->pluck('id', 'id')->all();
        $role->givePermissionTo($permissions);

        // give permission to Admin
        $role = Role::findByName('Admin');
        $permissions = DB::table('permissions')->where('name', 'LIKE', "all")->pluck('id', 'id')->all();
        $role->givePermissionTo($permissions);

        // give permission to User
        $role = Role::findByName('User');
        $permissions = DB::table('permissions')->where('name', 'LIKE', "all")->pluck('id', 'id')->all();
        $role->givePermissionTo($permissions);
        return 0;
    }
}
