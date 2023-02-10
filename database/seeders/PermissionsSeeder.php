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
    array_push($permission_array,Permission::create(['name' => 'create_inscripcion']));
    array_push($permission_array,Permission::create(['name' => 'edit_inscripcion']));
    array_push($permission_array,Permission::create(['name' => 'delete_inscripcion']));
    array_push($permission_array,Permission::create(['name' => 'admin_inscripcion']));
    $UsuarioPermission= Permission::create(['name' => 'usuario_inscripcion']);

    array_push($permission_array,  $UsuarioPermission);

	$SuperAdminRole = Role::create(['name' => 'super_admin']);
	$SuperAdminRole->syncPermissions($permission_array);
    
    $AdminRole = Role::create(['name' => 'admin']);
    $AdminRole->syncPermissions($permission_array);


	$UsuarioRole = Role::create(['name' => 'usuario_inscripcion']);
	$UsuarioRole->syncPermissions($UsuarioPermission);

	 $userSuperAdmin=User::create([
            'name' => 'admin',
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
	 $UserView->assignRole('usuario_inscripcion');

     $Admin=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 3,
        ]);
     $Admin->assignRole('admin');
	



    }
}
