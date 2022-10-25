<?php 

$conn = mysqli_connect('localhost', 'task_manager' ,'task_manager', 'task_manager');

// check the connection
if(!$conn){
    echo 'connection error' . mysqli_connect_error();
}

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
        <div class="col-md-6 login-left">

        <form action="login.php" method="POST">
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

    $sql = "SELECT * FROM tbl_admin 
                WHERE
                username = '$username' && password = '$password'
            ";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo '<script>
        alert("Login Successful")
        window.location.href="index.php"
        </script>';
    }else{
        echo '<script>
        alert("Either Password Or Username Is inccorect")
        window.location.href="login.php"
        </script>';
    }
 }
?>