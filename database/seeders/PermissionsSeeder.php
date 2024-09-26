<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
    $permission_array =[];
    array_push($permission_array,Permission::create(['name' => 'crear']));
    array_push($permission_array,Permission::create(['name' => 'editar']));
    array_push($permission_array,Permission::create(['name' => 'eliminar']));
    $UsuarioPermission= Permission::create(['name' => 'usuario']);
    $Adminpermission=Permission::create(['name' => 'admin']);
    array_push($permission_array,  $UsuarioPermission,$Adminpermission);

	$SuperAdminRole = Role::create(['name' => 'super_admin']);
	$SuperAdminRole->syncPermissions($permission_array);
    
    $AdminRole = Role::create(['name' => 'admin']);
    $AdminRole->syncPermissions($Adminpermission);


	$UsuarioRole = Role::create(['name' => 'usuario']);
	$UsuarioRole->syncPermissions($UsuarioPermission);

	 $userSuperAdmin=User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('Admin21141998'),
            'role' => 1,
        ]);
	 $userSuperAdmin->assignRole('super_admin');

	 $UserView=User::create([
            'name' => 'usuario',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 2,
        ]);
	 $UserView->assignRole('usuario');

     $Admin=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 3,
        ]);
     $Admin->assignRole('admin');
	



    }
}
