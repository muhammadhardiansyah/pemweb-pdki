<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApproveBrandNotification extends Notification
{
    use Queueable;
    public $brand;
    /**
     * Create a new notification instance.
     */
    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    // /**
    //  * Get the mail representation of the notification.
    //  */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name'     => $this->brand->name,
            'decision' => 1,
            'address'  => $this->brand->address,
            'owner'    => $this->brand->owner,
            'logos'    => $this->brand-> logos,
            'certificate'  => $this->brand-> certificate,
            'signature'    => $this->brand-> signature,
        ];
    }
}
