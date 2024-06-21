<?php

namespace App\Observers;

use App\Models\Turno;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class TurnoActionObserver
{
    public function created(Turno $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Turno'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Turno $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Turno'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Turno $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Turno'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
