<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable, HasFactory;

    public $table = 'turnos';

    protected $dates = [
        'created_at',
        'fecha_turno',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cliente_turno_id',
        'created_at',
        'barbershop_turno_id',
        'barbero_turno_id',
        'servicio_turno_id',
        'fecha_turno',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        self::observe(new \App\Observers\TurnoActionObserver);
    }

    public function cliente_turno()
    {
        return $this->belongsTo(Cliente::class, 'cliente_turno_id');
    }

    public function barbershop_turno()
    {
        return $this->belongsTo(Barbershop::class, 'barbershop_turno_id');
    }

    public function barbero_turno()
    {
        return $this->belongsTo(Barbero::class, 'barbero_turno_id');
    }

    public function servicio_turno()
    {
        return $this->belongsTo(Servicio::class, 'servicio_turno_id');
    }

    public function getFechaTurnoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setFechaTurnoAttribute($value)
    {
        $this->attributes['fecha_turno'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
