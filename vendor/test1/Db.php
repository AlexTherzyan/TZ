<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01.04.2018
 * Time: 15:19
 */

namespace test1;

class Db{



    public function __construct(){

        $db = require_once 'db_config.php';
        class_alias('\RedBeanPHP\R','\R');




        //подключаемся к бд
        \R::setup($db['dsn'],$db['user'],$db['password']);

        //проверяем существует ли таблица
        if (!(\R::find('template'))){
            $asd = \R::dispense('template');
            $asd->template_name = 'Hello!';
            $asd->msg_title = 'Hello world';
            $asd->msg_text = 'Hello world!';
            \R::store($asd);
        }
        //проверяем на соединение с бд
//        if (!\R::testConnection()){
//            throw new \Couchbase\Exception("Нет соединения с бд",500);
//        }



    }

}

