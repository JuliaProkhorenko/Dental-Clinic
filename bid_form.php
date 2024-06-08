<?php
require("header.php");
?>
    <div class="container">
      <h2 class="text-center">Оформление заявки</h2>
        <form action="add_bid.php" class="w-70 mx-auto" method="post">  
          <div class="form-group">
            <label for="service">Выберите услугу:</label>
            <select class="form-control" id="service" name="service">
              <option>Чистка зубов</option>
              <option>Лечение кариеса</option>
              <option>Установка коронок</option>
              <!-- Добавьте другие услуги по вашему выбору -->
            </select>
          </div>
           <div class="form-group">
            <label for="date">Выберите удобное время приема:</label>
            <input type="datetime-local" class="form-control" id="date" name="date">
          </div>
          <div class="form-group">
            <label for="problem">Опишите вашу проблему:</label>
            <textarea class="form-control" id="problem" name="problem" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Записаться</button>
        </form>  
        


            <div class="mb-3">
                <label for="title" class="form-label">Выберите услугу</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="mb-3">
                <label for="title" class="form-label">Выберите специалиста</label>
                <select name="doctor" id=""></select>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="mb-3">
                <label for="title" class="form-label">Выберите время приема</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Укажите вашу проблему</label>
                <textarea class="form-control" id="description" name="description"></textarea>
              </div>                     
              <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" value="Отправить">
              </div>            
        </form>
    </div>
    
    <?php
require("footer.php");
?>