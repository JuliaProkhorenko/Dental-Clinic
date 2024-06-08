<?php
    session_start();
    //подключаем файл со строкой соединения с БД
    require('db.php');
    //если все поля заполнены
    if(!empty(($_POST['service'])) && !empty(($_POST['doctor'])) && !empty(($_POST['date'])) && !empty(($_POST['time']))) {
        //подготовка запроса
        $stmt = $conn->prepare("insert into records values(null,?,?,?,?,?,'Новая')");
        //выполненние запроса
            $stmt->execute([
            $_SESSION['user_id'],   
            $_POST['doctor'],
            $_POST['service'],
            $_POST['date'],
            $_POST['time'],       
        ]);
    
    //перенаправление в ЛК
    header("Location: account.php?message=success");
    } else  header("Location: account.php?message=null");


