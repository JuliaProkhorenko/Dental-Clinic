<?php
require("header.php");
?>
    <main class="container my-3">                
        <?php if(isset($_GET['message'])) { if ($_GET['message'] == 'null')  {?>
          <div class="alert alert-danger" role="alert">
          <i class="bi bi-check-square" style="color: red;"></i>
          Все поля обязательны для заполнения! 
          </div>        
      <?php } else if ($_GET['message'] == 'error') {?>      
          <div class="alert alert-danger" role="alert">
            <i class="bi bi-check-square" style="color: red;"></i>
              Неверный логин или пароль!
          </div>
        <? } else if ($_GET['message'] == 'success') {?>      
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check-square" style="color: green;"></i>
             Вы успешно авторизованы!
          </div>
          <? } else if ($_GET['message'] == 'create') {?>      
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check-square" style="color: green;"></i>
             Вы успешно зарегистрировались!
          </div>
          <? } else if ($_GET['message'] == 'unique') {?>      
            <div class="alert alert-danger" role="alert">
            <i class="bi bi-check-square" style="color: red;"></i>
            Пользователь с таким логином уже существует!
          </div>
        <?  }} ?>
    
       
       
        <div class="container text-center d-flex">
          <div class=" text-center">
          <p class="lead m-3 py-5">Приветствуем вас в стоматологической клинике "Здоровая улыбка"!
          Наша клиника предлагает высококачественные стоматологические услуги с 
          использованием современного оборудования и инновационных методик лечения. 
          Мы гордимся тем, что помогаем нашим пациентам достичь здоровья и красоты улыбки,
          обеспечивая профессиональное лечение и заботливое отношение.
            </p>
          <a href="auth.php" class="btn btn-outline-primary p-3">Выбрать услугу</a>
            </div>
          <img src="assets/img/stomat.jpg" class="rounded img-fluid float-end w-50">
          </div>


        <h2 class="text-center my-4">Всего 4 шага для ослепительной улыбки! </h2>               
        <div class="row row-cols-1 row-cols-md-4 text-center">          
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">  
                          <div class="circle rounded-circle bg-dark text-white mx-auto d-flex justify-content-center align-items-center">1</div>                        
                            <p class="card-title">Зарегистироваться на сайте</p>
                            <i class="fs-2 bi bi-person-square"></i>
                        </div>
                    </div>
                </div> 
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">  
                        <div class="circle rounded-circle bg-dark text-white mx-auto d-flex justify-content-center align-items-center">2</div>                        
                                           
                            <p class="card-title">Авторизоваться</p>
                            <i class="fs-2 bi bi-house-door"></i>
                        </div>
                    </div>
                </div> 
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">        
                        <div class="circle rounded-circle bg-dark text-white mx-auto d-flex justify-content-center align-items-center">3</div>                        
                                                 
                            <p class="card-title">Выбрать услугу</p>
                            <i class="fs-2 bi bi-terminal-plus"></i>
                        </div>
                    </div>
                </div> 
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">   
                        <div class="circle rounded-circle bg-dark text-white mx-auto d-flex justify-content-center align-items-center">4</div>                        
                                                     
                            <p class="card-title">Подойти в клинику к специалисту!</p>
                            <i class="fs-2 bi bi-hourglass-split"></i>
                        </div>
                    </div>
                </div> 
            </div>
          </main >
<!-- Модальное окно регистрации пользователя -->
<div class="modal fade" id="reg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content bg-primary-subtle">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Регистрация</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <div class="modal-body">
      <form action="add_user.php" class="mx-auto" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">ФИО</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Телефон</label>
                <input type="text" class="form-control" id="name" name="phone">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Логин</label>
                <input type="text" class="form-control" id="name" name="login">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="name" name="password">
              </div>
              <div class="mb-3">
                <input class="form-check-input me-1" type="checkbox" value="" id="agree" name="opd">
                <label class="form-check-label" for="agree"><a href="agree.php">Согласие на обработку персональных данных</a></label>
              
               
              </div>
              <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" value="Отправить">
              </div>
      </div>
      </form>
    </div>
  </div> 
</div> 

<!-- Модальное окно авторизации пользователя -->
<div class="modal fade" id="auth" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-primary-subtle">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Авторизация</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <div class="modal-body">
      <form action="auth.php" class="mx-auto" method="post">            
              <div class="mb-3">
                <label for="name" class="form-label">Логин</label>
                <input type="text" class="form-control" id="name" name="login">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="name" name="password">
              </div>
              <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" value="Отправить">
              </div>
      </div>
      </form>
      
    </div>
  </div> 
</div> 
<?php require('footer.php');?>