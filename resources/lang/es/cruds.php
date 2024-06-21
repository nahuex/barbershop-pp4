<?php

return [
    'userManagement' => [
        'title'          => 'Gestionar usuarios',
        'title_singular' => 'Gestionar usuarios',
    ],
    'permission' => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
        ],
    ],
    'servicio' => [
        'title'          => 'Servicios',
        'title_singular' => 'Servicio',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'nombre_servicio'          => 'Servicio',
            'nombre_servicio_helper'   => 'Ingrese Nombre del Servicio',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'duracion_servicio'        => 'Duracion',
            'duracion_servicio_helper' => 'Ingrese Duracion del Servicio',
            'precio_servicio'          => 'Precio',
            'precio_servicio_helper'   => 'Ingrese Precio del Servicio',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
        ],
    ],
    'barbershop' => [
        'title'          => 'Barber Shops',
        'title_singular' => 'Barber Shop',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'direccion_barbershop'        => 'Direccion',
            'direccion_barbershop_helper' => 'Ingrese Direccion de la Barber Shop',
            'telefono_barbershop'         => 'Telefono',
            'telefono_barbershop_helper'  => 'Ingrese Telefono de la Barber Shop',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'nombre_barbershop'           => 'Barber Shop',
            'nombre_barbershop_helper'    => 'Ingrese Nombre de la Barber Shop',
            'created_by'                  => 'Created By',
            'created_by_helper'           => ' ',
        ],
    ],
    'cliente' => [
        'title'          => 'Clientes',
        'title_singular' => 'Cliente',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'created_by'              => 'Created By',
            'created_by_helper'       => ' ',
            'nombre_cliente'          => 'Nombre y Apellido',
            'nombre_cliente_helper'   => 'Ingrese Nombre Completo del Cliente',
            'correo_cliente'          => 'Correo Electronico',
            'correo_cliente_helper'   => 'Ingrese Direccion de Correo Electronico',
            'telefono_cliente'        => 'Telefono',
            'telefono_cliente_helper' => 'Ingrese Telefono del Cliente',
        ],
    ],
    'gestionarBarbershop' => [
        'title'          => 'Gestionar Barber Shops',
        'title_singular' => 'Gestionar Barber Shop',
    ],
    'gestionarServicio' => [
        'title'          => 'Gestionar Servicios',
        'title_singular' => 'Gestionar Servicio',
    ],
    'gestionarEmpleado' => [
        'title'          => 'Gestionar Barberos',
        'title_singular' => 'Gestionar Barbero',
    ],
    'gestionarCliente' => [
        'title'          => 'Gestionar Clientes',
        'title_singular' => 'Gestionar Cliente',
    ],
    'gestionarInventario' => [
        'title'          => 'Gestionar Inventario',
        'title_singular' => 'Gestionar Inventario',
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'barbero' => [
        'title'          => 'Barberos',
        'title_singular' => 'Barbero',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'nombre_barbero'           => 'Nombre y Apellido',
            'nombre_barbero_helper'    => 'Ingrese Nombre Completo del Barbero',
            'correo_barbero'           => 'Correo Electronico',
            'correo_barbero_helper'    => 'Ingrese Direccion de Correo Electronico',
            'telefono_barbero'         => 'Telefono',
            'telefono_barbero_helper'  => 'Ingrese Telefono del Barbero',
            'foto_barbero'             => 'Foto',
            'foto_barbero_helper'      => 'Adjunte Foto del Barbero',
            'servicios_barbero'        => 'Servicios',
            'servicios_barbero_helper' => 'Ingrese Servicios del Barbero',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
        ],
    ],
    'gestionarTurno' => [
        'title'          => 'Gestionar Turnos',
        'title_singular' => 'Gestionar Turno',
    ],
    'turno' => [
        'title'          => 'Turnos',
        'title_singular' => 'Turno',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'cliente_turno'           => 'Cliente',
            'cliente_turno_helper'    => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'created_by'              => 'Created By',
            'created_by_helper'       => ' ',
            'barbershop_turno'        => 'Barber Shop',
            'barbershop_turno_helper' => ' ',
            'barbero_turno'           => 'Barbero',
            'barbero_turno_helper'    => ' ',
            'fecha_turno'             => 'Dia y Horario',
            'fecha_turno_helper'      => 'Dias y Horarios de Atencion: Martes a Sabados (10:00AM - 20:00PM)',
            'servicio_turno'          => 'Servicios',
            'servicio_turno_helper'   => ' ',
        ],
    ],
    'herramientum' => [
        'title'          => 'Herramientas',
        'title_singular' => 'Herramienta',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'nombre_herramienta'        => 'Herramienta',
            'nombre_herramienta_helper' => 'Ingrese Nombre de Herramienta',
            'unidad_herramienta'        => 'Unidades',
            'unidad_herramienta_helper' => 'Ingrese Unidades de Herramienta',
            'foto_herramienta'          => 'Foto',
            'foto_herramienta_helper'   => 'Adjunte Foto de Herramienta',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'created_by'                => 'Created By',
            'created_by_helper'         => ' ',
            'lugar_herramienta'         => 'Lugar',
            'lugar_herramienta_helper'  => ' ',
        ],
    ],
    'insumo' => [
        'title'          => 'Insumos',
        'title_singular' => 'Insumo',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'nombre_insumo'        => 'Insumo',
            'nombre_insumo_helper' => 'Ingrese Nombre de Insumo',
            'unidad_insumo'        => 'Unidad',
            'unidad_insumo_helper' => 'Ingrese Unidades de Insumo',
            'lugar_insumo'         => 'Lugar',
            'lugar_insumo_helper'  => ' ',
            'foto_insumo'          => 'Foto',
            'foto_insumo_helper'   => 'Adjunte Foto de Insumo',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
        ],
    ],

];
