<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderStatusChanged extends Notification
{
    use Queueable;
    private $order;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $order
     * @return void
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
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
            ->greeting('Здравствуйте ' . $this->user->name . '!')
            ->subject('Статус вашего заказа изменен')
            ->line('Ваш заказ № ' . $this->order->id . '.')
            ->line('Товаров: ' . count($this->order->items))
            ->line('Статус вашего заказа изменен.')
            ->action('Открыть заказ', route('user.order.index'))
            ->line('Спасибо, что вы с нами!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'order' => $this->order->id
        ];
    }
}
