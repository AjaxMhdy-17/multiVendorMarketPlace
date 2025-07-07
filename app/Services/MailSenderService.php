<?php

namespace App\Services;

use App\Mail\DefaultMail;
use Illuminate\Support\Facades\Mail;

class MailSenderService
{
    public static function sendMail($name, $mailSubject, $content, $toMail)
    {
        Mail::send(new DefaultMail(
            name: $name,
            mailSubject: $mailSubject,
            content: $content,
            toMail: $toMail
        ));
    }
}
