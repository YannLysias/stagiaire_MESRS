<?php

namespace App\Notifications;

use App\Models\Service;
use App\Models\Stage;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StageValidation extends Notification
{
    use Queueable;

    public $user;
    public $stage;
    public $generated_password;
    public $service;
    public $structure;



    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, Stage $stage, $generated_password, $service, $structure)
    {
        $this->user = $user;
        $this->stage = $stage;
        $this->generated_password = $generated_password;
        $this->service = $service;
        $this->structure = $structure;   
       
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
            ->subject('Demande validée')
            ->markdown('mail.stage_validation', [
                "user" => $this->user,
                "generated_password" => $this->generated_password,
                "stage" => $this->stage,
                "structure" => $this->structure,
                "service" => $this->service,
                "url" => route('login')
            ]);
        return (new MailMessage)->markdown('mail.stage_validation');
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
