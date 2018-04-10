<?php

namespace config;



define('INBOX', '{imap.yandex.ru:993/imap/ssl}INBOX'); //ВХОДЯЩИЕ СООБЩЕНИЯ
define('SENT','{imap.yandex.ru:993/imap/ssl}&BB4EQgQ,BEAEMAQyBDsENQQ9BD0ESwQ1-'); // ОТПРАВЛЕННЫЕ СООБЩЕНИЯ
//    &BBgEQQRFBD4ENARPBEkEOAQ1-      --СПАМ
//    &BBIEMAQ2BD0EPgQ1-              --ВАЖНОЕ
//    &BB8EQAQ+BEcENQQ1-              -- ПРОЧЕЕ



define("ROOT", dirname(__DIR__));
define("CONFIG", ROOT . '/config'); // указывает на конфигурационные файлы


// подключаем автозагрузочник
require ROOT . '/vendor/autoload.php';
