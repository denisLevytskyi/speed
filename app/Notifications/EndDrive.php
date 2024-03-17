<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EndDrive extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public $drive
    )
    {
        //
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
        $id = $this->drive->id;
        $time = $this->drive->created_at;
        $point_a = $this->drive->point_a;
        $point_b = $this->drive->point_b;
        $url = route('app.drive.show', $this->drive->id);

        return (new MailMessage)
                    ->subject("Ваша поездка №$id закончена!")
                    ->line("Поездка №: $id")
                    ->line("Д/В: $time")
                    ->line("От: $point_a")
                    ->line("До: $point_b")
                    ->action('Просмотреть отчет', $url)
                    ->line('Спасибо за использование нашего сервиса!');
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
            //
        ];
    }
}
