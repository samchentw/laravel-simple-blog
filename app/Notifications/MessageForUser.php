<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageForUser extends Notification
{
    use Queueable;

    /**
     * @param string $type 通知類型有'post'、'system'
     */
    public $title, $message, $type, $targetId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $title, string $message, string $type, $targetId)
    {
        $this->title = $title;
        $this->message = $message;
        $this->type = $type;
        $this->targetId = $targetId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            "title" =>  $this->title,
            "type" =>  $this->type,
            "target_id" =>  $this->targetId,
            "message" => $this->message
        ];
    }
}
