<?php
require_once __DIR__ . '/assets/mandrill/src/Mandrill.php';
global $mandrillGlobal;
function mandrill() {
    global $mandrillGlobal;
    if (!$mandrillGlobal) {
        $mandrillGlobal = new Mandrill('KfuOhKgKxMd7_qaQZtU9zw');
    }
    return $mandrillGlobal;
}
class Email {
    
    static function send($html,$subject,$fromEmail,$fromName,$toArray) {
        try {
            $email = array(
              'html' => $html,
              'subject' => $subject,
              'from_email' => $fromEmail,
              'from_name' => $fromName,
              'to' => $toArray,
              'track_opens' => true,
            );
            return mandrill()->messages->send($email);
        }catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
            throw $e;
        }
    }
}

