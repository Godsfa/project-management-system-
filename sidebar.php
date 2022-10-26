<?php 
     
      include('verify.php');
?>
   <?php 
    $employee_id = $_SESSION['employee_id'];
    $login_id = $_SESSION['login_id'];
    ?>
<div class="page">
        <div>
            <h3><a href="index.php">GODS'FAVOUR <i class="bi bi-house-door-fill" style='color:#d4ab3a;'></i></a></h3>
        <div class="hr"></div>
        </div>
       <div><button class="children"><a href="index.php" id="admin">Task Management<i class="bi bi-list-task icon"></i></a></button></div> 
       
       <?php if($login_id == 1){ ?>
        <div><button class="children"><a href="administation.php">Administration<i class="bi bi-person-fill icon"></i></a></button></div>
        <?php } ?>
            
       <div><button class="children"><a href="logout.php">Log out<i class="bi bi-box-arrow-right icon"></i></a></button></div>
     
    </div>

    <style>
        .page{
    background-color: #1A1C1D;
    width: 14%;
    height: 100%;   
}
.icon{
    color: #957C39;
}
h3{
    display: flex;
    position: relative;
    left: 15px;
    top: 15px;
}
.hr{
    position: relative;
    top: 30px;
    background-color: #957C39;;
    width: 100%;
    height: 3px;
}
.page div a{
    text-decoration: none;
    color: white;
}
#admin{
  margin: 0px;
}
.children{
    padding: 15px;
    margin: 7px;
    background-color: transparent;
    border: none;
    color: white;
    position: relative;
    top: 30px;
} 
.children:hover{
    transform: scale(1.1);
    border: none;
    background-color: #1A1C1D;
} 

.wrapper1{
    width:80%;
    margin: 0px auto;
    padding: 2% ;
    position: relative;
    bottom: 90%;
    left: 110px;
    background-color: #1A1C1D;
}
    </style>