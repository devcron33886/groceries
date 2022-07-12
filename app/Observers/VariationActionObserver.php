<?php

namespace App\Observers;

use App\Models\Variation;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class VariationActionObserver
{
    public function created(Variation $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Variation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Variation $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Variation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Variation $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Variation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
