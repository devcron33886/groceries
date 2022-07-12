<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    private $status;
    private $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status, Order $order)
    {
        $this->status = $status;
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
            ->subject('Order Updates')
            ->greeting('Hello' .$this->order->user->name)
            ->line('Your order status was changed to ' . $this->status)

            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }
}
