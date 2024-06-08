<?php
    require("header.php");
    require("db.php");
    $stmt = $conn->prepare("select records.*, doctors.fullname as doctor, services.title as service from records join doctors 
    on records.doctor_id=doctors.id join services on records.service_id = services.id where user_id=? order by date");
    $stmt->execute([$_SESSION['user_id']]);
      
    $records = $stmt->fetchAll();

    // SQL запрос для выбора информации о врачах
    $stmt1 = $conn->query("SELECT * FROM doctors");
    $doctors = $stmt1->fetchAll();

    $stmt2 = $conn->query("SELECT * FROM services");
    $services = $stmt2->fetchAll();
?>
    <div class="container-fluid w-75 mb-3 mx-avto">
        <h2 class="text-center p-3">Личный кабинет</h2>
        <div class="container border">
        <?php if(isset($_GET['message'])){ if ($_GET['message'] == 'null')  { ?>
          <div class="alert alert-danger" role="alert">
          <i class="bi bi-check-square" style="color: red;"></i>
          Все поля обязательны для заполнения! 
          </div>        
          <? } else if ($_GET['message'] == 'success') {?>      
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check-square" style="color: green;"></i>
        Ваша заявка успешно сформирована!
          </div>

          <?php } } ?>
            
        <div class="modal-body">
          
          <h4 class="py-3">Запись на прием</h4>
            <form action="add_bid.php" class="w-50" method="post" id="nyForm">
            <div class="form-group"> 
                <label for='service'>Выберите услугу:</label>
                <select name='service' id='service' class="form-select">
                  <?php foreach($services as $row) { ?>
                  <option value="<?=$row["id"]?>"><?=$row["title"]. " ( стоимость от " . 
                  $row["price"] ."руб. )"?></option>
                <?php } ?>
                 
                </select>
              </div> 
            <div class="form-group">                
              <label for='doctor'>Выберите врача:</label>
              <select name='doctor' id='doctor' class="form-select">
              <?php foreach($doctors as $row) { ?>
                <option value="<?=$row["id"]?>"><?=$row["fullname"]. " (" ." опыт: " . 
                $row["experience"] . " лет, график: " . $row["schedule"] . ")"?></option>
              <?php } ?>
              </select>
            </div>              
              <div class="form-group">  
                <label for='date'>Выберите дату:</label>
                <input type='date' id='date' name='date' class="form-control" required>
              </div>
              <div class="form-group">
                <label for='time'>Выберите время:</label>
                <select id='time' name='time' class="form-select" required>
                  <option value='08:00'>08:00</option>
                  <?php $start_time = strtotime("08:00");
                    for ($i = 0; $i < 16; $i++) {
                    $start_time = strtotime("+30 minutes", $start_time);
                    $formatted_time = date("H:i", $start_time);
                    echo "<option value='" . $formatted_time . "'>" . $formatted_time . "</option>";
                   } ?>
                </select>
                <div class="form-group my-3">
                  <input type='submit' class="btn btn-primary" value='Записаться' onclick="clearForm()">
                </div>
            </form>
        </div>
          
            <div>
            <h3>Ваши записи:</h3>

            <table class="table table-hover">
            <thead>
                <tr class="table">
                <th scope="col">№</th>
                <th scope="col">Дата</th>
                <th scope="col">Время</th>
                <th scope="col">Услуга</th>
                <th scope="col">ФИО врача</th>  
                <th scope="col">Статус</th>              
                </tr>
            </thead>
            <tbody>
            <?php $id = 1;
                foreach($records as $bid) { ?>                   
                <tr>                
                <td><?=$id?></td>
                <td class="col-auto"><?=$bid['date']?></td>
                <td class="col-auto"><?=$bid['time']?></td>
                <td class="col-auto"><?=$bid['service']?></td>
                <td class="col-auto"><?=$bid['doctor']?></td>
                <td class="col-auto"><?=$bid['status']?></td>
               </tr>            
            <?php $id++;  }  ?>
            </tbody>
            </table>          
        </div>         
    </div> 
    <script>
        function clearForm() {
            document.getElementById("myForm").reset(); // Очищаем форму
        }
    </script>
   
    
<?php require "footer.php"; ?>

