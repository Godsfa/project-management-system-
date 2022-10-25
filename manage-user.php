<?php

include('config/db_conn.php');

?>
<html>
    <head>
        <title>ADMINISTRATION</title>
        <link rel="stylesheet" href="css/users_style.css">
        <style>
        .list2{
        background-color: #695210 ;
        width: 50%;
        height: 47px;
        position: relative;
        left: 75px;
        bottom: 10px;
        text-align: center;
        list-style: none;
      }
      .list1{
        position: relative;
        left: 100px;
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
        left: 224.5px;
      }
        </style>
    </head>
    <body>
        <?php 
            include('sidebar.php');
          ?>
        <div class="wrapper">
        <li style="list-style:none ;"><a style="color:bisque; background-color: transparent; text-decoration:none; position:relative; left: 5%; bottom:70px; padding:12px;border: 3px groove #695210;" onMouseOver="this.style.background='#695210', transition='0.7s'" onMouseOut="this.style.background='transparent'"  href="add_employee.php">Add New Employee</a></li>
            <nav class="contain1">
              <li class="list1"><a class="nav-content" href="administation.php">Manage Admin</a></li>
              <hr> 
              <li class="list2"><a class="nav-content" href="manage-user.php">Manage Employee</a></li> 
          </nav>
          <div class="gaps"></div>
          <div class="responsives">
            <table class="table">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>username</th>
                  <th>Gender</th>
                  <th>ID</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                $sql = "SELECT * FROM tbl_admin WHERE employee_id > 1";

                $res = mysqli_query($conn,$sql);

                if($res==true){
                  $count_rows = mysqli_num_rows($res);
                  $sn = 1;
                if($count_rows>0){
                  while($row = mysqli_fetch_assoc($res)){
                    $employee_id = $row['employee_id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $fullname = $row['fullname'];
                    $gender = $row['gender'];
                    $photo = $row['photo'];
                    
                    ?>
                     <tr class="content">
                      <td><?php echo $sn++;?></td>
                      <td><?php echo $fullname;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $username;?></td>
                      <td><?php echo $gender;?></td>
                      <td><?php echo $employee_id;?></td>
                    <td>
                      <a href="update_user.php?employee_id=<?php echo $employee_id; ?>" class="update_delete"><i class="bi bi-pencil-square"></i></a>
                     
                      <a href="delete-user.php?employee_id=<?php echo $employee_id; ?>" class="update_delete"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                      <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                      </svg></a> 
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

