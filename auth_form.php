<?php
require("header.php");
?>
    <div class="container">
      <h2 class="text-center">Авторизация</h2>
        <form action="auth.php" class="w-70 mx-auto" method="post">               
              <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" id="login" name="login">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" value="Отправить">
              </div>            
        </form>
        <?php if(isset($_GET['message'])) { if ($_GET['message'] == 'error') {?>
          <div class="alert alert-danger" role="alert">
            <i class="bi bi-check-square" style="color: red;"></i>
              Неверный логин или пароль!
          </div>
        <? } }?>
    </div>    
    <?php
require("footer.php");
?>