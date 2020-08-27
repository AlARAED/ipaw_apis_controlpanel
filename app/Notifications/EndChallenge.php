<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;

use App\Models\Challenging;




class EndChallenge extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $finishTimeTab;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Challenging $finishTimeTab)
    {
        //
        $this->finishTimeTab = $finishTimeTab;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [

              'data'=>$this->finishTimeTab->name_en.' Finished with one woner : '.User::find($this->finishTimeTab->user_id)->name,
              'message' => $this->finishTimeTab->name_en.' Finished with one woner : '.User::find($this->finishTimeTab->user_id)->name
       

        ];
    }
}
