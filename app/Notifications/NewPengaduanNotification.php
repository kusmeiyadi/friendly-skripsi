<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPengaduanNotification extends Notification
{
    use Queueable;

    protected $pengaduan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'pengaduan' => $this->pengaduan,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'pengaduan' => $this->pengaduan,
        ];
    }
}
