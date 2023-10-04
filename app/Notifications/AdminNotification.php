<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
// implements ShouldQueue
{
    use Queueable;
    protected $room_id;
    protected $res_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($room_id, $res_id)
    {
        $this->res_id=$res_id;
        $this->room_id=$room_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database' ,'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    // public function toDatabase(object $notifiable)
    // {
    //     return [
    //         'msg' => 'New room booked ',
    //         'Room' => $this->room_id,
    //         'Reservation' => $this->res_id
    //     ];

    // }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'msg' => 'New room booked ',
            'Room' => $this->room_id,
            'Reservation' => $this->res_id
        ];
    }
}
