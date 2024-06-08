<?php
    require("header.php");
    require("db.php");
    //проверка на роль админа
    if($_SESSION['role'] == 1) {
        $stmt = $conn->query("select records.id as r_id, records.*, doctors.fullname as doctor, services.title as service, users.* from records join doctors 
        on records.doctor_id=doctors.id join services on records.service_id = services.id join users on records.user_id=users.id");    
        $bids = $stmt->fetchAll();
    } else {
        header("Location: auth_form.php");
    }    
?>
    <div class="container-fluid mb-3 mx-avto">
        <h2 class="text-center p-3">Админпанель</h2>
        <div class="container border rounded">
        <?php if(isset($_GET['message'])) { if ($_GET['message'] == 'success') {?>
          <div id="liveAlertPlaceholder" class="alert alert-info 
          alert-dismissible fade show" role="alert">
          <i class="bi bi-check-square" style="color: primary;"></i>
          Статус заявки успешно изменен.          
          </div> 
            <h3 class="my-3">Заявки пользователей:</h3> 
                
      <?php } } ?>     
            <table class="table table-hover">
            <thead>
                <tr class="table">
                <th scope="col">№</th>
                <th scope="col">ФИО пациента</th>
                <th scope="col">Телефон</th>
                <th scope="col">Email</th>
                <th scope="col">Услуга</th>
                <th scope="col">Врач</th>
                <th scope="col">Дата</th>
                <th scope="col">Время</th>   
                <th scope="col">Статус</th>               
                </tr>
            </thead>
            <tbody>
            <?php $id = 1;
                foreach($bids as $bid) { ?>                   
                <tr>                
                <td><?=$id?></td>
                <td><?=$bid['name']?></td>
                <td><?=$bid['phone']?></td>
                <td><?=$bid['email']?></td>
                <td class=""><?=$bid['service']?></td>
                <td ><?=$bid['doctor'] ?></td>
                <td><?=$bid['date']?></td>
                <td><?=$bid['time'] ?></td>
                <td><?=$bid['status'] ?></td>
               <?php if($bid['status'] == 'Новая') {?>
                <td><a href="update_bid.php?id=<?=$bid['r_id']?>&status=Подтверждена" 
                    class="btn btn-outline-success">Подтвердить</a>
                </td>
                <td><a href="update_bid.php?id=<?=$bid['r_id']?>&status=Отменена"
                     class="btn btn-outline-danger">Отменить</a>
                </td>
               </tr>            
            <?php } $id++; }  ?>
            </tbody>
            </table>
        </div>               
    </div>    
<?php require "footer.php";?>