<?php
    session_start();
    //подключаем файл со строкой соединения с БД
    require('db.php');
    if(isset($_GET['id']) && isset($_GET['status'])) {
    //подготовка запроса
    $stmt = $conn->prepare("update records set status=? where id=?");
        //выполнение запроса
            $stmt->execute([
                $_GET['status'],
                $_GET['id'] 
            ]);  
    //перенаправление в ЛК
    header("Location: admin.php?message=success");
  }




