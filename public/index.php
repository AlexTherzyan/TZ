<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <meta content="charset=utf-8"">  </meta>



    <title>ТЗ</title>
</head>
<body>


<?php

require dirname(__DIR__) . '/config/init.php';


new test1\Db();

$temp_names = \R::findAll( 'template' );


//---------------------------------------------------------------------------------
//класс для работы с почтой
$mail = new test1\ImapMail();
//---------------------------------------------------------------------------------

?>



<div class="row my">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">

            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-send" role="tab" aria-controls="settings">Написать</a>

            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-incoming" role="tab" aria-controls="profile">Входящие
                <span class="badge badge-primary badge-pill sss"><?=$mail->getNumMessages($mail->getImap(INBOX));?></span>

            </a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-sent" role="tab" aria-controls="messages">Отправленные

                <span class="badge badge-primary badge-pill sss"><?=$mail->getNumMessages($mail->getImap(SENT));?></span>


            </a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-template" role="tab" aria-controls="settings">Шаблоны</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Настройки</a>
        </div>
    </div>

    <!--  Content  -->
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">

<!-------------------------------------    Написать       ------------------------------------------------ -->




            <div class="tab-pane fade show active" id="list-send" role="tabpanel" aria-labelledby="list-home-list">

                <form method="post" id="send">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Выбрать шаблон</label>
                        <div class="form-row align-items-center">
                            <div class="col-sm-9">

                                <select name="temp_names[]" class="form-control" id="exampleFormControlSelect1">
                                    <!-- заполняем option сохраненными шаблонами   -->
                                    <?php foreach ($temp_names as $temp_name):?>
                                        <option value="<?= $temp_name->id;?>" ><?= $temp_name->template_name;?></option>

                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button  type="submit" id="btn"  name="btn_select" class="btn btn-primary" value="first">Выбрать</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Кому</label>
                        <input type="email" name="email" class="form-control email" id="exampleFormControlInput1" value="">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Тема</label>
                        <input type="text" name="theme" class="form-control theme" id="exampleFormControlInput1 value="">
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Текст сообщения</label>
                        <textarea class="form-control msg-txt" name="msg" id="exampleFormControlTextarea1" rows="3" >
                        </textarea>
                    </div>

                    <button type="submit"  id="btn1" name="btn_select1" class="btn btn-primary" >Отправить</button>

                </form>



            </div>




<!--=============================================___Входящие___==================================================== -->
            <div class="tab-pane fade" id="list-incoming" role="tabpanel" aria-labelledby="list-profile-list">
                <?php
                    $mail->getMessages(INBOX,0, 5); //получаем сообщения из папки входящие
                ?>
            </div>

<!--=============================================___Отправленные___==================================================== -->
            <div class="tab-pane fade" id="list-sent" role="tabpanel" aria-labelledby="list-messages-list">
                <?php
                  $mail->getMessages(SENT,0,5); //получаем сообщения из папки отправленные
                ?>


            </div>

<!--=============================================___Шаблоны___==================================================== -->
            <div class="tab-pane fade" id="list-template" role="tabpanel" aria-labelledby="list-settings-list">

                <form method="post" id="ajaxform1" >

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Название</label>
                        <input name="temp_name" type="text" class="form-control" id="exampleFormControlInput1"  >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Тема</label>
                        <input name="temp_theme" type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Текст сообщения</label>
                        <textarea name="temp_text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <button  type="submit" name="button" class="btn btn-primary">Сохранить</button>
                </form>
            </div>

            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">

            </div>

        </div>
    </div>
</div>



</body>


<script src="script/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="script/ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>



