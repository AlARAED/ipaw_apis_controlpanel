<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterUser extends Notification
{
    use Queueable;
    protected $newuser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newuser)
    {
        //
        $this->newuser = $newuser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database']; //can you used mail or slack or any chanel
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
  
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'data'=>'new user '.$this->newuser->name,
            
        ];
    }
}
