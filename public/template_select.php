<?php


/*
 *  скрипт Получает значения из БД исходя из выбранного шаблона по нажатию
 */


//require_once 'D:\openServer\OSPanel\domains\test1\config\init.php';
require dirname(__DIR__) . '/config/init.php';

new test1\Db();




    $count;
    $tmp_names = $_POST['temp_names'];
    $email = $_POST['email'];
    $theme = $_POST['theme'];
    $text = $_POST['msg'];



foreach ($tmp_names as $tmp_name) {
    $count = $tmp_name;
}


    $rows_value = \R::findOne('template', 'id=' . $count . '');


    $email = $rows_value->template_name;
    $theme = $rows_value->msg_title;
    $text = $rows_value->msg_text;
    $array = array(
      //  'email' => $email,
        'theme' => $theme,
        'text' => $text,

    );

    echo json_encode($array);























//}








?>
