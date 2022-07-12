<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlacedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Order Has been placed',)
        ->greeting('Hello '.$this->order->user->name)
        ->line('Your order has been received')
        ->line('Your order number is '.$this->order->series->name.'-'.str_pad($this->order->order_number,5,'0',STR_PAD_LEFT))
        ->action('View your order status', url('/orders'))
        ->line('Thank you for shopping with us')
        ->line(config('app.name') . ' Team');

    }
}
