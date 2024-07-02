<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramNotification extends Notification
{
    use Queueable;

    protected $message;
    protected $ortu;

    public function __construct($message, $ortu)
    {
        $this->message = $message;
        $this->ortu = $ortu;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        try {
            return TelegramMessage::create()
                ->to($this->ortu->id_telegram)
                ->content($this->message);
        } catch (\Exception $ex) {
            Log::error($ex);
        }
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}