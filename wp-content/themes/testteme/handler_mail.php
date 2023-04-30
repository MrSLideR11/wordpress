<?php
    header('Content-type: application/json');
    require_once (__DIR__ . '/CustomMail.php');

    define('SITE_NAME', 'Test Job');
    define('SITE_DOMEN', 'test-job.ru');
    define('MAIL_CHARSET', 'utf8');
    define('ADMIN_EMAIL', '1slider1@mail.ru');

    $mail = new CustomMail();
    $mail->setSubject('Заявка с сайта' . SITE_DOMEN);
    $mail->setFrom('1slider1@mail.ru', 'Андрей');
    $mail->setTo(['1slider1@mail.ru']);
    $mail->setBody($_POST);
    $mail->sendMail();
?>