<?php 
      // connection to database
      include('config/db_conn.php');
?>


<html>
    <head>
        <title>User And Registration</title>
        <link rel="stylesheet" type="text/css">
                <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    .login-box{
    max-width: 900px;
    float: none;
    margin: 200px auto;
}
.login-left{
    background: rgba(211, 211, 211, 0.5);
    padding: 30px;
}
.login-right{
    background:rgb(0, 0, 0);
    padding: 30px;
}
.btn{
    position: relative;
    top: 10px;
}
.form-control{
    background-color: transparent !important;
}
</style>
    </head>
    <body>
            <div class="container">
            <div class="login-box"> 
            <div class="row">
                <div class="col-md-6 login-right">
                    <h2>Register Here</h2>
                <form action="add_employee.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="">Fullname</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter Your Fullname" required>
                    </div>
                    <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                    <label for="">Gender</label>
                    <input type="text" name="gender" placeholder="Gender" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                    <label for="">Login ID</label>
                    <input type="text" name="login_id" class="form-control" value="2" placeholder="Enter 2" required>
                    </div>
                    <!-- <div class="form-group">
                    <label for="">Picture</label>
                    <input type="file" name="photo" class="form-control" placeholder="UPload Picture" required>
                    </div> -->
                   
                   
                    <button type="submit" name="submit" class="btn btn-primary">Add Employee</button>
                </form>
           </div>
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
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $login_id = $_POST['login_id'];
        // $photo = $_POST['photo'];

        

      $sql = "INSERT INTO tbl_admin (fullname,username, email, password, gender,login_id) 
      VALUES ('$fullname','$username','$email','$password','$gender','$login_id')";

        $res = mysqli_query($conn, $sql);

         if($res==true){
            echo '<script>
        alert("Successfully Assigned")
        window.location.href="manage-user.php"
        </script>';
        }else{
            echo '<script>
        alert("Fail To Assign Tasks")
        window.location.href="add_employee.php"
        </script>';
        }
     }

?>