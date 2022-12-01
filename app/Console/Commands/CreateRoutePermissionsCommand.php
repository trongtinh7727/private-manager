<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class CreateRoutePermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-permission-routes';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tạo permission từ routes';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Permission::create(['name' => 'SuperAdmin']);
        Permission::create(['name' => 'Admin']);
        Permission::create(['name' => 'User']);
    }
}
