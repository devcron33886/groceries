<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New order',)
            ->greeting('Hello there is a new order need a review')
            ->line('New order by '.$this->order->user->name.' which has order number '.$this->order->series->name.'-'.str_pad($this->order->order_number,5,'0',STR_PAD_LEFT))
            ->action('Review the order here', url('/admin/orders/{{ $this->order->id}}'))
            ->line('Thank you')
            ->line(config('app.name') . ' Team');
    }

}
