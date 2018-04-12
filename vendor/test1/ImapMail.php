<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 03.04.2018
 * Time: 10:05
 */

namespace test1;


/*
 *  Класс для удобного вывода почты
 */



use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class ImapMail
{

    private $email = "buyka@tut.by";    //-- здесь вводите почту с которой будете работать
    private $password = "shadow226388"; //-- пароль


    public function __construct()
    {
    }

    public function getImap($hostname)
    {

        $imap = imap_open($hostname, $this->email, $this->password) or die('Cannot connect to Yandex: ' . imap_last_error());

        return $imap;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function getNumMessages($imap)
    {
        return imap_num_msg($imap);
    }

    public function sendMessage($targetEmail,$header,$text){

        $yandexSmtpHost = 'smtp.yandex.ru';
        $email = $this->email;
        $password = $this->password;
        $yandexSmtpPort = 465;
        $encryption = 'SSL';

        //$targetEmail = 'alextherzyan@gmail.com';

        $transport = (new Swift_SmtpTransport($yandexSmtpHost, $yandexSmtpPort))
            ->setUsername($email)
            ->setPassword($password)
            ->setEncryption($encryption);

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message($header))
            ->setFrom($email)
            ->setTo($targetEmail)
            ->setBody($text);


       return $result = $mailer->send($message);

    }



    public function getMessages($msg_type, $start ,$count){

        $imap_inbox = $this->getImap($msg_type);
        $numMessages = imap_num_msg($imap_inbox);

        for ($i = $numMessages - $start; $i > ($numMessages - $count - $start); $i--) {
            $header = imap_header($imap_inbox, $i);

            $fromInfo = $header->from[0];
            $replyInfo = $header->reply_to[0];

            $details = array(
                "fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host))
                    ? $fromInfo->mailbox . "@" . $fromInfo->host : "",

                "fromName" => (isset($fromInfo->personal))
                    ? $fromInfo->personal : "",

                "replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host))
                    ? $replyInfo->mailbox . "@" . $replyInfo->host : "",

                "subject" => (isset($header->subject))
                    ? $header->subject : "",
                "date" => (isset($header->udate))
                    ? $header->udate : ""
            );

            $from_addr = imap_utf8 ($details["fromAddr"]);
            $from_name = imap_utf8($details["fromName"]) ;
            $subject = imap_utf8($details["subject"] );
            $date = imap_utf8(date("g:i, j F", ($details["date"])));


            $html = "
                     <div class=\"list-group\">
                    <a href=\"#\" class=\"list-group-item list-group-item-action flex-column align-items-start \">
                        <div class=\"d-flex w-100 justify-content-between\">
                            <h5 class=\"mb-1\">{$from_name}</h5>
                            <small>{$date}</small>
                        </div>
                        <p class=\"mb-1\">{$subject}</p>
                        <small>$from_addr</small>
                    </a>
                    </div>
                    " ;
            echo $html;

        }

    }

}


























