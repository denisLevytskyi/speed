<?php

namespace App\Notifications;

use App\Models\Prop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StartDrive extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public Prop $prop;

    public function __construct()
    {
        $this->prop = new Prop();
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
        $random = explode($this->prop->getProp('sms_line_separator'), $this->prop->getProp('sms_line_random'));
        return (new MailMessage)
            ->subject($this->prop->getProp('sms_subject'))
            ->line($this->prop->getProp('sms_line_1'))
            ->line($this->prop->getProp('sms_line_2'))
            ->line($random[array_rand($random)])
            ->line($this->prop->getProp('sms_line_3'));
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
