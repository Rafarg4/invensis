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
    $ViewInscripcionPermission= Permission::create(['name' => 'view_inscripcion']);

    array_push($permission_array,  $ViewInscripcionPermission);

	$SuperAdminRole = Role::create(['name' => 'super_admin']);
	$SuperAdminRole->syncPermissions($permission_array);

	$UsuarioRole = Role::create(['name' => 'view_inscripcion']);
	$UsuarioRole->syncPermissions($ViewInscripcionPermission);

	 $userSuperAdmin=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin21141998'),
            'role' => 1,
        ]);
	 $userSuperAdmin->assignRole('super_admin');

	 $UserView=User::create([
            'name' => 'usuario',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('Admin21141998'),
            'role' => 2,
        ]);
	 $UserView->assignRole('view_inscripcion');
	



    }
}
