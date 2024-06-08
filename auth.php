<?php
//подключаем файл со строкой соединения с БД
require_once('db.php');
//если все поля заполнены
if(!empty(($_POST['login'])) && !empty(($_POST['password']))) {
    //подготовка запроса
    $stmt = $conn->prepare("select * from users where login=?");
    //выполненние запроса
        $stmt->execute([        
        $_POST['login']
        ]);
$user = $stmt->fetch();
if ($user) {
    //проверка пароля
    if (password_verify($_POST['password'],$user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
             //перенаправление в личный кабинет и вывод информации об успешной авторизации
            header("Location: account.php");  
        } else {
            //перенаправление на страницу авторизации и вывод ошибки "Логин или пароль не существует";
            header("Location: auth_form.php?message=error"); 
        }         
    }      
}  //перенаправление на страницу вывод ошибки, что все поляя д.б. заполнены
    else  header("Location: auth_form.php?message=null");


   



