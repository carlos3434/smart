<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EntrustSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->modulosSeeder();
        $this->submodulosSeeder();
        $this->permissionsUserSeeder();
        $this->permissionsRoleSeeder();
        $this->permissionsSeeder();
        $this->permissionsAllSeeder();
        $this->rolesSeeder();
        $this->addPermissionRoleSeeder();
        $this->roleUserSeeder();
    }

    private function modulosSeeder(){

        DB::table('modulos')->insert(array(
            'nombre' => 'Mantenimiento',
            'url'  => 'mantenimiento',
            'icon' => 'fa-map-marker',
        ));
        DB::table('modulos')->insert(array(
            'nombre' => 'Procesos',
            'url'  => 'procesos',
            'icon' => 'fa-map-marker',
        ));
        DB::table('modulos')->insert(array(
            'nombre' => 'Configuracion',
            'url'  => 'Configuracion',
            'icon' => 'fa-map-marker',
        ));
    }

    private function submodulosSeeder(){
        DB::table('modulos')->insert([ //id: 4
            'nombre' => 'users',
            'url'  => 'users',
            'icon' => 'fa-map-marker',
            'modulo_id' => 1
        ]);

        DB::table('modulos')->insert([ //id: 5
            'nombre' => 'roles',
            'url'  => 'roles',
            'icon' => 'fa-map-marker',
            'modulo_id' => 1
        ]);

        DB::table('modulos')->insert([ //id: 6
            'nombre' => 'permissions',
            'url'  => 'permissions',
            'icon' => 'fa-map-marker',
            'modulo_id' => 1
        ]);

    }

    private function permissionsUserSeeder(){
        $sql = "SELECT id FROM modulos WHERE nombre='users'";
        $data = DB::select($sql);
        $submoduloId = 1;
        if (count($data)>0) {
            $submoduloId = $data[0]->id;
        }

        DB::table('permissions')->insert(array(
            'nombre' => 'create-users',
            'nombre_mostrar' => 'Create Users',
            'descripcion' => 'Create users',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'read-users',
            'nombre_mostrar' => 'Read Users',
            'descripcion' => 'List Users',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'update-users',
            'nombre_mostrar' => 'Update Users',
            'descripcion' => 'Update Users',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'delete-users',
            'nombre_mostrar' => 'Delete Users',
            'descripcion' => 'Delete Users',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function permissionsRoleSeeder(){
        $sql = "SELECT id FROM modulos WHERE nombre='roles'";
        $data = DB::select($sql);
        $submoduloId = 1;
        if (count($data)>0) {
            $submoduloId = $data[0]->id;
        }
        DB::table('permissions')->insert(array(
            'nombre' => 'create-roles',
            'nombre_mostrar' => 'Create Roles',
            'descripcion' => 'Create Roles',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'read-roles',
            'nombre_mostrar' => 'Read Roles',
            'descripcion' => 'List Roles',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'update-roles',
            'nombre_mostrar' => 'Update Roles',
            'descripcion' => 'Update Roles',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'delete-roles',
            'nombre_mostrar' => 'Delete Roles',
            'descripcion' => 'Delete Roles',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function permissionsSeeder(){
        $sql = "SELECT id FROM modulos WHERE nombre='permissions'";
        $data = DB::select($sql);
        $submoduloId = 1;
        if (count($data)>0) {
            $submoduloId = $data[0]->id;
        }
        DB::table('permissions')->insert(array(
            'nombre' => 'create-permissions',
            'nombre_mostrar' => 'Create Permissions',
            'descripcion' => 'Create Permissions',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'read-permissions',
            'nombre_mostrar' => 'Read Permissions',
            'descripcion' => 'List Permissions',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'update-permissions',
            'nombre_mostrar' => 'Update Permissions',
            'descripcion' => 'Update Permissions',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'nombre' => 'delete-permissions',
            'nombre_mostrar' => 'Delete Permissions',
            'descripcion' => 'Delete Permissions',
            'submodulo_id' => $submoduloId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function permissionsAllSeeder(){

        $name = 'Tables_in_smart';
        //$name = Config::get('connections.mysql.database');
        $data = DB::select('SHOW TABLES WHERE '.$name.' NOT REGEXP "[[.low-line.]]"');

        foreach($data as $value) {

            if(($value->$name != 'users') && ($value->$name != 'migrations') &&
                ($value->$name != 'roles') && ($value->$name != 'permissions')) {
                //buscar modul
                $sql = "SELECT id FROM modulos WHERE nombre=?";
                $data = DB::select($sql,[$value->$name]);
                $submoduloId = 1;
                if (count($data)>0) {
                    $submoduloId = $data[0]->id;
                }
                DB::table('permissions')->insert(array(
                    'nombre' => 'create-'.$value->$name,
                    'nombre_mostrar' => 'Create '.ucwords($value->$name),
                    'descripcion' => 'Create '.ucwords($value->$name),
                    'submodulo_id' => $submoduloId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'nombre' => 'read-'.$value->$name,
                    'nombre_mostrar' => 'Read '.ucwords($value->$name),
                    'descripcion' => 'List '.ucwords($value->$name),
                    'submodulo_id' => $submoduloId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'nombre' => 'update-'.$value->$name,
                    'nombre_mostrar' => 'Update '.ucwords($value->$name),
                    'descripcion' => 'Update '.ucwords($value->$name),
                    'submodulo_id' => $submoduloId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'nombre' => 'delete-'.$value->$name,
                    'nombre_mostrar' => 'Delete '.ucwords($value->$name),
                    'descripcion' => 'Delete '.ucwords($value->$name),
                    'submodulo_id' => $submoduloId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));
            }
        }
    }

    private function rolesSeeder(){

        DB::table('roles')->insert(array(
            'nombre' => 'admin',
            'nombre_mostrar' => 'Administrador',
            'descripcion' => 'Administra los módulos de usuarios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('roles')->insert(array(
            'nombre' => 'cocina',
            'nombre_mostrar' => 'Cocinero',
            'descripcion' => 'Cocinero',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('roles')->insert(array(
            'nombre' => 'mozo',
            'nombre_mostrar' => 'Mozo',
            'descripcion' => 'Mozo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function addPermissionRoleSeeder(){

        for($i=1; $i < 13; $i++){
            DB::table('permission_role')->insert(array(
                'permission_id' => $i,
                'role_id' => 1
            ));
        }
    }

    private function roleUserSeeder(){

        DB::table('role_user')->insert(array(
            'user_id' => 1,
            'role_id' => 1
        ));
    }

}