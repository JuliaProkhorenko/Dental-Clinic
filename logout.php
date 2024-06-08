<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['role']);
   // destroy($_SESSION);
    header("Location: index.php");



    