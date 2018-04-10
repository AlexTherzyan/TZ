<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 05.04.2018
 * Time: 15:22
 */


require dirname(__DIR__) . '/config/init.php';

//require_once 'D:\openServer\OSPanel\domains\test1\config\init.php';

new test1\Db();

$mail = new test1\ImapMail();


    $email = $_POST['email'];
    $theme = $_POST['theme'];
    $text = $_POST['msg'];


    $mail->sendMessage(
        $email,
        $theme,
        $text
    );

echo "Cообщение отправлено";














