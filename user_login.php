<?php 
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
a{
    text-decoration: none;
    color: white;
}
</style>
    </head>
    <body>
        <div class="container">
        <div class="login-box"> 
        <div class="row">
        <div class="col-md-6 login-left">
        
        <form action="user_login.php" method="POST">
        <div class="form-group">
        <label for="">ID</label>
        <input type="text" name="employee_id" class="form-control" required>                  
        </div>

        <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" required>                  
        </div>

        <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" required>                 
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
        </div>
        </div>
    </div>
</body>
</html>

<?php

//login
    session_start();

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['employee_id'];

        $sql = "SELECT * FROM tbl_admin 
            WHERE
            username = '$username' && password = '$password' && employee_id = '$id'
        ";

        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){ 
            $employee_id = $row['employee_id'] ;                         


        $num = mysqli_num_rows($result);

        if($num == 1){
            $_SESSION['login'] = "$id";
            header("location:index.php");
           
        }else{
        echo '<script>
        alert("Either Password Or Username Is inccorect")
        window.location.href="login.php"
        </script>';
        }
    }}
?>