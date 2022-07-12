<?php

namespace App\Observers;

use App\Models\Stock;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class StockActionObserver
{
    public function created(Stock $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Stock'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Stock $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Stock'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Stock $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Stock'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
