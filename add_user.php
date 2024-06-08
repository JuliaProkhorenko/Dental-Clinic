<?php
//подключаем файл со строкой соединения с БД
require_once('db.php');
//если все поля заполнены 
if(!empty(($_POST['name'])) && !empty(($_POST['phone'])) && !empty(($_POST['email'])) 
&& !empty(($_POST['login'])) && !empty(($_POST['password']))) {
    $stmt = $conn->prepare("select * from users where login=?");
    //выполненние запроса
        $stmt->execute([        
        $_POST['login']
    ]);
$user = $stmt->fetch();
if ($user) {
     //перенаправление в личный кабинет и вывод ошибки
     header("Location: reg.php?message=unique"); 
    
} else {
    //подготовка запроса
    $stmt = $conn->prepare("insert into users(name,phone,email,login,password) values(?,?,?,?,?)");
    //выполненние запроса
        $stmt->execute([
        $_POST['name'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['login'],
        password_hash($_POST['password'],PASSWORD_DEFAULT)
    ]);
   //перенаправление на главную страницу
   header("Location: index.php?message=create");
    } 
    //если хотя бы одно поле не заполнено сообщаем об ошибке
} else header("Location: reg.php?message=null");

