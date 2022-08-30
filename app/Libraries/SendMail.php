<?php

namespace App\Libraries;

class SendMail
{
    function send_mail($from, $name, $to, $subject, $message, $attachment = null)
    {
        $email      = \config\Services::email();

        $email->setTo($to);
        $email->setFrom($from, $name);
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($attachment != false) {
            $email->attach($attachment);
        }

        if ($email->send()) {
            return true;
        } else {
            return $email->printDebugger(['headers']);
        }
    }
}
