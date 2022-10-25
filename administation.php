<?php

include('config/db_conn.php');

?>
<html>
    <head>
        <title>ADMINISTRATION</title>
        <link rel="stylesheet" href="css/users_style.css">
    </head>
    <style>
      .list1{
        background-color: #695210 ;
        width: 50%;
        height: 47px;
        position: relative;
        right: 80px;
        bottom: 10px;
        text-align: center;
        list-style: none;
      }
      .list2{
        position: relative;
        right: 90px;
        bottom: 10px;
        list-style: none;
      }
      .nav-content{
        position: relative;
        top: 8px;
      }
      hr{
        bottom: 11px;
        position: relative;
        right: 220px;
      }
    </style>
    <body>
        <?php 
            include('sidebar.php');
          ?>
        <div class="wrapper">
            <div class="contain1">
              <div class="list1">
                <li><a class="nav-content" href="administation.php">Manage Admin</a></li>
              </div>
              <hr> 
              <div class="list2">
                <li><a class="nav-content" href="manage-user.php">Manage Employee</a></li> 
              </div>      
      </div>
          <div class="gap2"></div>
          <div class="responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                $sql = "SELECT * FROM tbl_admin WHERE login_id = 1";

                $res = mysqli_query($conn,$sql);

                if($res==true){
                  $count_rows = mysqli_num_rows($res);
                  $sn = 1;
                if($count_rows>0){
                  while($row = mysqli_fetch_assoc($res)){
                    $employee_id = $row['employee_id'];
                    $fullname = $row['fullname'];
                    $email = $row['email'];
                    $username = $row['username'];
                    ?>
                     <tr class="content">
                      <td><?php echo $sn++;?></td>
                      <td><?php echo $fullname;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $username;?></td>
                      <td>
                      <a href="update-admin.php?id=<?php echo $employee_id; ?>" class="update_delete"><i class="bi bi-pencil-square"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                      }
                    }
                    ?>
          
              </tbody>
            </table>
          </div>
        </div>
    </body>
</html>

