<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StageRejection extends Notification
{
    use Queueable;
    public $remarque;
    public $stageId;
    


    /**
     * Create a new notification instance.
     */
    public function __construct($remarque, $stageId)
    {
        $this->remarque = $remarque;
        $this->stageId = $stageId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        return (new MailMessage)
            ->subject('Demande rejetée')
            ->markdown('mail.stage_rejection', [
                'remarque' => $this->remarque,
                "url" => url('/')
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
