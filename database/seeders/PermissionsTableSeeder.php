<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'servicio_create',
            ],
            [
                'id'    => 18,
                'title' => 'servicio_edit',
            ],
            [
                'id'    => 19,
                'title' => 'servicio_show',
            ],
            [
                'id'    => 20,
                'title' => 'servicio_delete',
            ],
            [
                'id'    => 21,
                'title' => 'servicio_access',
            ],
            [
                'id'    => 22,
                'title' => 'barbershop_create',
            ],
            [
                'id'    => 23,
                'title' => 'barbershop_edit',
            ],
            [
                'id'    => 24,
                'title' => 'barbershop_show',
            ],
            [
                'id'    => 25,
                'title' => 'barbershop_delete',
            ],
            [
                'id'    => 26,
                'title' => 'barbershop_access',
            ],
            [
                'id'    => 27,
                'title' => 'cliente_create',
            ],
            [
                'id'    => 28,
                'title' => 'cliente_edit',
            ],
            [
                'id'    => 29,
                'title' => 'cliente_show',
            ],
            [
                'id'    => 30,
                'title' => 'cliente_delete',
            ],
            [
                'id'    => 31,
                'title' => 'cliente_access',
            ],
            [
                'id'    => 32,
                'title' => 'gestionar_barbershop_access',
            ],
            [
                'id'    => 33,
                'title' => 'gestionar_servicio_access',
            ],
            [
                'id'    => 34,
                'title' => 'gestionar_empleado_access',
            ],
            [
                'id'    => 35,
                'title' => 'gestionar_cliente_access',
            ],
            [
                'id'    => 36,
                'title' => 'gestionar_inventario_access',
            ],
            [
                'id'    => 37,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 39,
                'title' => 'barbero_create',
            ],
            [
                'id'    => 40,
                'title' => 'barbero_edit',
            ],
            [
                'id'    => 41,
                'title' => 'barbero_show',
            ],
            [
                'id'    => 42,
                'title' => 'barbero_delete',
            ],
            [
                'id'    => 43,
                'title' => 'barbero_access',
            ],
            [
                'id'    => 44,
                'title' => 'gestionar_turno_access',
            ],
            [
                'id'    => 45,
                'title' => 'turno_create',
            ],
            [
                'id'    => 46,
                'title' => 'turno_edit',
            ],
            [
                'id'    => 47,
                'title' => 'turno_show',
            ],
            [
                'id'    => 48,
                'title' => 'turno_delete',
            ],
            [
                'id'    => 49,
                'title' => 'turno_access',
            ],
            [
                'id'    => 50,
                'title' => 'herramientum_create',
            ],
            [
                'id'    => 51,
                'title' => 'herramientum_edit',
            ],
            [
                'id'    => 52,
                'title' => 'herramientum_show',
            ],
            [
                'id'    => 53,
                'title' => 'herramientum_delete',
            ],
            [
                'id'    => 54,
                'title' => 'herramientum_access',
            ],
            [
                'id'    => 55,
                'title' => 'insumo_create',
            ],
            [
                'id'    => 56,
                'title' => 'insumo_edit',
            ],
            [
                'id'    => 57,
                'title' => 'insumo_show',
            ],
            [
                'id'    => 58,
                'title' => 'insumo_delete',
            ],
            [
                'id'    => 59,
                'title' => 'insumo_access',
            ],
            [
                'id'    => 60,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
