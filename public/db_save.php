<?php

/*
 *  скрипт сохраняет в БД шаблон по нажатию
 */

require dirname(__DIR__) . '/config/init.php';
//require_once 'D:\openServer\OSPanel\domains\test1\config\init.php';
new test1\Db();

if(isset($_POST['temp_name']) && isset($_POST['temp_theme']) && isset($_POST['temp_text'])) {

    $temp_name = $_POST['temp_name'];
    $temp_theme = $_POST['temp_theme'];
    $temp_text = $_POST['temp_text'];

    $asd = \R::dispense('template');
    $asd->template_name = $temp_name;
    $asd->msg_title = $temp_theme;
    $asd->msg_text = $temp_text;
    \R::store($asd);

}

    /*
     *  очищаем глобальный массив что бы при перезагрузки страницы
     *  данные не добавлялись в бд без нажатия кнопки
     */
    //unset($_POST);


?>