<?php 

include('config/db_conn.php');

if(isset($_GET['employee_id'])){
    $employee_id = $_GET['employee_id'];

    $sql = "SELECT * FROM tbl_admin WHERE employee_id = $employee_id";

    $res = mysqli_query($conn, $sql);

    if($res==true){
        $row = mysqli_fetch_assoc($res);
            $password = $row['password'];
            $fullname = $row['fullname'];
            $username = $row['username'];
            $email = $row['email'];
            $gender = $row['gender'];
    }

}else{
    // header('location:administation.php');
}

?>
<html>
    <head>
        <title>administation page</title>
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
        <nav class="contain1">
              <li class="list1"><a class="nav-content" href="administation.php">Manage Admin</a></li>
              <hr> 
              <li class="list2"><a class="nav-content" href="manage-user.php">Manage Employee</a></li> 
          </nav>
          <div class="gap" style="height:55% ;">
          <div class="responsive">
            <div class="h3">Edit Admin</div>
            <form class="input" method="POST">
                    <label for="">Fullname</label>
                     <a href="user_change_password.php?id=<?php echo $password; ?>" class="change">Change Password</a>  
                <div>
                    <input type="text" name="fullname" value="<?php echo $fullname; ?>">
                </div>
                    <label for="">Username</label>
                <div>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </div>
                    <label for="">Email</label>
                <div>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                </div>
                    <label for="">Gender</label>
                <div>
                    <input type="text" name="gender" value="<?php echo $gender; ?>">
                </div>
        
                <input type="submit" value="Update Now" class="update" name="submit" style="position:relative;left:30rem;bottom:60px;">
            </form>

            </div>
          </div>
        </div>
    </body>
</html>

<?php 
 
    if(isset($_POST['submit'])){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql3 = "UPDATE tbl_admin SET
        fullname = '$fullname',
        username = '$username',
        email ='$email',
        gender = '$gender'
        WHERE
        employee_id = $employee_id";

        $res3 = mysqli_query($conn, $sql3);

        if($res3==true){
            echo '<script>
            alert("Update Successfully")
            window.location.href="manage-user.php"
            </script>';
        }else{
            echo '<script>
            alert("Update Failed")
            window.location.href="update-user.php"
            </script>';
        }
    }

?>