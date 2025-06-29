<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public $vacantId,
        public $vacantTitle,
        public $userId
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/notifications');

        return (new MailMessage)
            ->line('A new candidate has applied for the vacant position.')
            ->line('Vacant Title: ' . $this->vacantTitle)
            ->action('See Notifications', $url)
            ->line('Thank you for using DevJobs!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'vacant_id' => $this->vacantId,
            'vacant_title' => $this->vacantTitle,
            'user_id' => $this->userId
        ];
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
