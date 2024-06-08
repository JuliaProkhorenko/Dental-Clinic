<?php
require("header.php");
?>
    <div class="container">
      <h2 class="text-center">Регистрация</h2>
        <form action="add_user.php" class="w-70 mx-auto" method="post">               
            <div class="mb-3">
                <label for="name" class="form-label">ФИО</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" id="login" name="login">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="mb-3">
                <input class="form-check-input me-1" type="checkbox" value="" id="agree" name="opd">
                <label class="form-check-label" for="agree">  <a href="agree.php">Согласие на обработку персональных данных</a></label>
    
              </div>
              <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" value="Отправить">
              </div>            
        </form>
        <?php if(isset($_GET['message'])) { if ($_GET['message'] == 'unique') {?>
          <div class="alert alert-danger" role="alert">
          <i class="bi bi-check-square" style="color: red;"></i>
          Такой пользователь уже существует! 
          </div>        
        <?php  } else if ($_GET['message'] == 'null')  {?>
          <div class="alert alert-danger" role="alert">
          <i class="bi bi-check-square" style="color: red;"></i>
          Все поля обязательны для заполнения! 
          </div>        
      <?php } } ?> 
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            if (!document.getElementById('agree').checked) {
                event.preventDefault();
                alert('Вы должны согласиться с обработкой персональных данных');
            }
        });
    </script>    
</body>
</html>