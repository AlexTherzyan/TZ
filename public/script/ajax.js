
$(document).ready( function () {



    //обработка кнопки 'выбрать' в разделе написать

    $("#btn").click(function (event) {

        event.preventDefault();

        $.ajax({
            url: "/template_select.php",
            type: "post",
            data: $("#send").serialize(),
            dataType: "json",
            success: function (result) {

            //    $(".email").val(result.email);
                $(".theme").val(result.theme);
                $(".msg-txt").val(result.text);


            }

        });

    });

    //обработка кнопки 'отправить' в разделе написать

    $("#btn1").click(function (event) {

        event.preventDefault();

        $.ajax({
            url: "/send.php",
            type: "post",
            data: $("#send").serialize(),
            success: function (result) {
                alert(result);


            }

        });

    });

    //обработка кнопки в разделе шаблоны
    $("#ajaxform1").submit(function (event) {

        event.preventDefault();

        $.ajax({
            url: "/db_save.php",
            type: "post",
            data: $("#ajaxform1").serialize(),//собираем все данные из формы

            success: function () {

                alert("Шаблон сохранен");

            }

        });

    });



 });





