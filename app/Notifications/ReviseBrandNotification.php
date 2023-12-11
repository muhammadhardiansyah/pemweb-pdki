<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReviseBrandNotification extends Notification
{
    use Queueable;
    public $brand;
    public $notes;
    /**
     * Create a new notification instance.
     */
    public function __construct($brand, $notes)
    {
        $this->brand = $brand;
        $this->notes    = $notes;
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

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id_brand'  => $this->brand->id,
            'name'      => $this->brand->name,
            'decision'  => 3,
            'address'   => $this->brand->address,
            'owner'     => $this->brand->owner,
            'logos'     => $this->brand-> logos,
            'certificate'  => $this->brand-> certificate,
            'signature' => $this->brand-> signature,
            'notes'     => $this->notes,
        ];
    }
}
