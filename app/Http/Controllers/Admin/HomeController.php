<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Cantidad Total de Barber Shops',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbershop',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'barbershop',
        ];

        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                if (isset($settings1['filter_days'])) {
                    return $query->where($settings1['filter_field'], '>=',
                        now()->subDays($settings1['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings1['filter_period'])) {
                    switch ($settings1['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings1['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $settings2 = [
            'chart_title'           => 'Cantidad de Barber Shops esta Semana',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbershop',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'week',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'barbershop',
        ];

        $settings2['total_number'] = 0;
        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
                if (isset($settings2['filter_days'])) {
                    return $query->where($settings2['filter_field'], '>=',
                        now()->subDays($settings2['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings2['filter_period'])) {
                    switch ($settings2['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings2['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'Cantidad de Barber Shops este Mes',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbershop',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'barbershop',
        ];

        $settings3['total_number'] = 0;
        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3) {
                if (isset($settings3['filter_days'])) {
                    return $query->where($settings3['filter_field'], '>=',
                        now()->subDays($settings3['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings3['filter_period'])) {
                    switch ($settings3['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings3['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Cantidad de Barber Shops este Año',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbershop',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'barbershop',
        ];

        $settings4['total_number'] = 0;
        if (class_exists($settings4['model'])) {
            $settings4['total_number'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4) {
                if (isset($settings4['filter_days'])) {
                    return $query->where($settings4['filter_field'], '>=',
                        now()->subDays($settings4['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings4['filter_period'])) {
                    switch ($settings4['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings4['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings4['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }

        $settings5 = [
            'chart_title'           => 'Ultimas Barber Shops Registradas',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbershop',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'direccion_barbershop' => '',
                'telefono_barbershop'  => '',
                'nombre_barbershop'    => '',
            ],
            'translation_key' => 'barbershop',
        ];

        $settings5['data'] = [];
        if (class_exists($settings5['model'])) {
            $settings5['data'] = $settings5['model']::latest()
                ->take($settings5['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings5)) {
            $settings5['fields'] = [];
        }

        $settings6 = [
            'chart_title'           => 'Cantidad Total de Servicios',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Servicio',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'servicio',
        ];

        $settings6['total_number'] = 0;
        if (class_exists($settings6['model'])) {
            $settings6['total_number'] = $settings6['model']::when(isset($settings6['filter_field']), function ($query) use ($settings6) {
                if (isset($settings6['filter_days'])) {
                    return $query->where($settings6['filter_field'], '>=',
                        now()->subDays($settings6['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings6['filter_period'])) {
                    switch ($settings6['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings6['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings6['aggregate_function'] ?? 'count'}($settings6['aggregate_field'] ?? '*');
        }

        $settings7 = [
            'chart_title'           => 'Cantidad de Servicios esta Semana',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Servicio',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'week',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'servicio',
        ];

        $settings7['total_number'] = 0;
        if (class_exists($settings7['model'])) {
            $settings7['total_number'] = $settings7['model']::when(isset($settings7['filter_field']), function ($query) use ($settings7) {
                if (isset($settings7['filter_days'])) {
                    return $query->where($settings7['filter_field'], '>=',
                        now()->subDays($settings7['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings7['filter_period'])) {
                    switch ($settings7['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings7['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings7['aggregate_function'] ?? 'count'}($settings7['aggregate_field'] ?? '*');
        }

        $settings8 = [
            'chart_title'           => 'Cantidad de Servicios este Mes',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Servicio',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'servicio',
        ];

        $settings8['total_number'] = 0;
        if (class_exists($settings8['model'])) {
            $settings8['total_number'] = $settings8['model']::when(isset($settings8['filter_field']), function ($query) use ($settings8) {
                if (isset($settings8['filter_days'])) {
                    return $query->where($settings8['filter_field'], '>=',
                        now()->subDays($settings8['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings8['filter_period'])) {
                    switch ($settings8['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings8['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings8['aggregate_function'] ?? 'count'}($settings8['aggregate_field'] ?? '*');
        }

        $settings9 = [
            'chart_title'           => 'Cantidad de Servicios este Año',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Servicio',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'servicio',
        ];

        $settings9['total_number'] = 0;
        if (class_exists($settings9['model'])) {
            $settings9['total_number'] = $settings9['model']::when(isset($settings9['filter_field']), function ($query) use ($settings9) {
                if (isset($settings9['filter_days'])) {
                    return $query->where($settings9['filter_field'], '>=',
                        now()->subDays($settings9['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings9['filter_period'])) {
                    switch ($settings9['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings9['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings9['aggregate_function'] ?? 'count'}($settings9['aggregate_field'] ?? '*');
        }

        $settings10 = [
            'chart_title'           => 'Ultimos Servicios Registrados',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Servicio',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'nombre_servicio'   => '',
                'duracion_servicio' => '',
                'precio_servicio'   => '',
            ],
            'translation_key' => 'servicio',
        ];

        $settings10['data'] = [];
        if (class_exists($settings10['model'])) {
            $settings10['data'] = $settings10['model']::latest()
                ->take($settings10['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings10)) {
            $settings10['fields'] = [];
        }

        $settings11 = [
            'chart_title'           => 'Cantidad Total de Barberos',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbero',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'barbero',
        ];

        $settings11['total_number'] = 0;
        if (class_exists($settings11['model'])) {
            $settings11['total_number'] = $settings11['model']::when(isset($settings11['filter_field']), function ($query) use ($settings11) {
                if (isset($settings11['filter_days'])) {
                    return $query->where($settings11['filter_field'], '>=',
                        now()->subDays($settings11['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings11['filter_period'])) {
                    switch ($settings11['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings11['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings11['aggregate_function'] ?? 'count'}($settings11['aggregate_field'] ?? '*');
        }

        $settings12 = [
            'chart_title'           => 'Cantidad de Barberos esta Semana',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbero',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'week',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'barbero',
        ];

        $settings12['total_number'] = 0;
        if (class_exists($settings12['model'])) {
            $settings12['total_number'] = $settings12['model']::when(isset($settings12['filter_field']), function ($query) use ($settings12) {
                if (isset($settings12['filter_days'])) {
                    return $query->where($settings12['filter_field'], '>=',
                        now()->subDays($settings12['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings12['filter_period'])) {
                    switch ($settings12['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings12['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings12['aggregate_function'] ?? 'count'}($settings12['aggregate_field'] ?? '*');
        }

        $settings13 = [
            'chart_title'           => 'Cantidad de Barberos este Mes',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbero',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'barbero',
        ];

        $settings13['total_number'] = 0;
        if (class_exists($settings13['model'])) {
            $settings13['total_number'] = $settings13['model']::when(isset($settings13['filter_field']), function ($query) use ($settings13) {
                if (isset($settings13['filter_days'])) {
                    return $query->where($settings13['filter_field'], '>=',
                        now()->subDays($settings13['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings13['filter_period'])) {
                    switch ($settings13['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings13['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings13['aggregate_function'] ?? 'count'}($settings13['aggregate_field'] ?? '*');
        }

        $settings14 = [
            'chart_title'           => 'Cantidad de Barberos este Año',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbero',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'barbero',
        ];

        $settings14['total_number'] = 0;
        if (class_exists($settings14['model'])) {
            $settings14['total_number'] = $settings14['model']::when(isset($settings14['filter_field']), function ($query) use ($settings14) {
                if (isset($settings14['filter_days'])) {
                    return $query->where($settings14['filter_field'], '>=',
                        now()->subDays($settings14['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings14['filter_period'])) {
                    switch ($settings14['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings14['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings14['aggregate_function'] ?? 'count'}($settings14['aggregate_field'] ?? '*');
        }

        $settings15 = [
            'chart_title'           => 'Ultimos Barberos Registrados',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Barbero',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'nombre_barbero'   => '',
                'correo_barbero'   => '',
                'telefono_barbero' => '',
            ],
            'translation_key' => 'barbero',
        ];

        $settings15['data'] = [];
        if (class_exists($settings15['model'])) {
            $settings15['data'] = $settings15['model']::latest()
                ->take($settings15['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings15)) {
            $settings15['fields'] = [];
        }

        $settings16 = [
            'chart_title'           => 'Cantidad Total de Clientes',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Cliente',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'cliente',
        ];

        $settings16['total_number'] = 0;
        if (class_exists($settings16['model'])) {
            $settings16['total_number'] = $settings16['model']::when(isset($settings16['filter_field']), function ($query) use ($settings16) {
                if (isset($settings16['filter_days'])) {
                    return $query->where($settings16['filter_field'], '>=',
                        now()->subDays($settings16['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings16['filter_period'])) {
                    switch ($settings16['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings16['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings16['aggregate_function'] ?? 'count'}($settings16['aggregate_field'] ?? '*');
        }

        $settings17 = [
            'chart_title'           => 'Cantidad de Clientes esta Semana',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Cliente',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'week',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'cliente',
        ];

        $settings17['total_number'] = 0;
        if (class_exists($settings17['model'])) {
            $settings17['total_number'] = $settings17['model']::when(isset($settings17['filter_field']), function ($query) use ($settings17) {
                if (isset($settings17['filter_days'])) {
                    return $query->where($settings17['filter_field'], '>=',
                        now()->subDays($settings17['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings17['filter_period'])) {
                    switch ($settings17['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings17['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings17['aggregate_function'] ?? 'count'}($settings17['aggregate_field'] ?? '*');
        }

        $settings18 = [
            'chart_title'           => 'Cantidad de Clientes este Mes',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Cliente',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'cliente',
        ];

        $settings18['total_number'] = 0;
        if (class_exists($settings18['model'])) {
            $settings18['total_number'] = $settings18['model']::when(isset($settings18['filter_field']), function ($query) use ($settings18) {
                if (isset($settings18['filter_days'])) {
                    return $query->where($settings18['filter_field'], '>=',
                        now()->subDays($settings18['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings18['filter_period'])) {
                    switch ($settings18['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings18['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings18['aggregate_function'] ?? 'count'}($settings18['aggregate_field'] ?? '*');
        }

        $settings19 = [
            'chart_title'           => 'Cantidad de Clientes este Año',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Cliente',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'cliente',
        ];

        $settings19['total_number'] = 0;
        if (class_exists($settings19['model'])) {
            $settings19['total_number'] = $settings19['model']::when(isset($settings19['filter_field']), function ($query) use ($settings19) {
                if (isset($settings19['filter_days'])) {
                    return $query->where($settings19['filter_field'], '>=',
                        now()->subDays($settings19['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings19['filter_period'])) {
                    switch ($settings19['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings19['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings19['aggregate_function'] ?? 'count'}($settings19['aggregate_field'] ?? '*');
        }

        $settings20 = [
            'chart_title'           => 'Ultimos Clientes Registrados',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Cliente',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'nombre_cliente'   => '',
                'correo_cliente'   => '',
                'telefono_cliente' => '',
            ],
            'translation_key' => 'cliente',
        ];

        $settings20['data'] = [];
        if (class_exists($settings20['model'])) {
            $settings20['data'] = $settings20['model']::latest()
                ->take($settings20['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings20)) {
            $settings20['fields'] = [];
        }

        $settings21 = [
            'chart_title'           => 'Cantidad Total de Turnos',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Turno',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'turno',
        ];

        $settings21['total_number'] = 0;
        if (class_exists($settings21['model'])) {
            $settings21['total_number'] = $settings21['model']::when(isset($settings21['filter_field']), function ($query) use ($settings21) {
                if (isset($settings21['filter_days'])) {
                    return $query->where($settings21['filter_field'], '>=',
                        now()->subDays($settings21['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings21['filter_period'])) {
                    switch ($settings21['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings21['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings21['aggregate_function'] ?? 'count'}($settings21['aggregate_field'] ?? '*');
        }

        $settings22 = [
            'chart_title'           => 'Cantidad de Turnos esta Semana',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Turno',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'week',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'turno',
        ];

        $settings22['total_number'] = 0;
        if (class_exists($settings22['model'])) {
            $settings22['total_number'] = $settings22['model']::when(isset($settings22['filter_field']), function ($query) use ($settings22) {
                if (isset($settings22['filter_days'])) {
                    return $query->where($settings22['filter_field'], '>=',
                        now()->subDays($settings22['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings22['filter_period'])) {
                    switch ($settings22['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings22['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings22['aggregate_function'] ?? 'count'}($settings22['aggregate_field'] ?? '*');
        }

        $settings23 = [
            'chart_title'           => 'Cantidad de Turnos este Mes',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Turno',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'turno',
        ];

        $settings23['total_number'] = 0;
        if (class_exists($settings23['model'])) {
            $settings23['total_number'] = $settings23['model']::when(isset($settings23['filter_field']), function ($query) use ($settings23) {
                if (isset($settings23['filter_days'])) {
                    return $query->where($settings23['filter_field'], '>=',
                        now()->subDays($settings23['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings23['filter_period'])) {
                    switch ($settings23['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings23['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings23['aggregate_function'] ?? 'count'}($settings23['aggregate_field'] ?? '*');
        }

        $settings24 = [
            'chart_title'           => 'Cantidad de Turnos este Año',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Turno',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'turno',
        ];

        $settings24['total_number'] = 0;
        if (class_exists($settings24['model'])) {
            $settings24['total_number'] = $settings24['model']::when(isset($settings24['filter_field']), function ($query) use ($settings24) {
                if (isset($settings24['filter_days'])) {
                    return $query->where($settings24['filter_field'], '>=',
                        now()->subDays($settings24['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings24['filter_period'])) {
                    switch ($settings24['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings24['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings24['aggregate_function'] ?? 'count'}($settings24['aggregate_field'] ?? '*');
        }

        $settings25 = [
            'chart_title'           => 'Ultimos Turnos Registrados',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Turno',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'cliente_turno'    => 'nombre_cliente',
                'barbershop_turno' => 'nombre_barbershop',
                'barbero_turno'    => 'nombre_barbero',
                'fecha_turno'      => '',
                'servicio_turno'   => 'nombre_servicio',
            ],
            'translation_key' => 'turno',
        ];

        $settings25['data'] = [];
        if (class_exists($settings25['model'])) {
            $settings25['data'] = $settings25['model']::latest()
                ->take($settings25['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings25)) {
            $settings25['fields'] = [];
        }

        $settings26 = [
            'chart_title'        => 'Cantidad de Herramientas por Unidad',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\Herramientum',
            'group_by_field'     => 'nombre_herramienta',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'unidad_herramienta',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-6',
            'entries_number'     => '5',
            'translation_key'    => 'herramientum',
        ];

        $chart26 = new LaravelChart($settings26);

        $settings27 = [
            'chart_title'        => 'Cantidad de Herramientas por Lugar',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\Herramientum',
            'group_by_field'     => 'nombre_barbershop',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'unidad_herramienta',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-6',
            'entries_number'     => '5',
            'relationship_name'  => 'lugar_herramienta',
            'translation_key'    => 'herramientum',
        ];

        $chart27 = new LaravelChart($settings27);

        $settings28 = [
            'chart_title'        => 'Cantidad de Insumos por Unidad',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\Insumo',
            'group_by_field'     => 'nombre_insumo',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'unidad_insumo',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-6',
            'entries_number'     => '5',
            'translation_key'    => 'insumo',
        ];

        $chart28 = new LaravelChart($settings28);

        $settings29 = [
            'chart_title'        => 'Cantidad de Insumos por Lugar',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\Insumo',
            'group_by_field'     => 'nombre_barbershop',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'unidad_insumo',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-6',
            'entries_number'     => '5',
            'relationship_name'  => 'lugar_insumo',
            'translation_key'    => 'insumo',
        ];

        $chart29 = new LaravelChart($settings29);

        return view('home', compact('chart26', 'chart27', 'chart28', 'chart29', 'settings1', 'settings10', 'settings11', 'settings12', 'settings13', 'settings14', 'settings15', 'settings16', 'settings17', 'settings18', 'settings19', 'settings2', 'settings20', 'settings21', 'settings22', 'settings23', 'settings24', 'settings25', 'settings3', 'settings4', 'settings5', 'settings6', 'settings7', 'settings8', 'settings9'));
    }
}
