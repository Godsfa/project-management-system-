<?php
include('config/db_conn.php');

$sql = "SELECT * FROM tbl_tasks";
$res = mysqli_query($conn, $sql);
if($res==true){
    while($row2 = mysqli_fetch_assoc($res)){
        $task_id = $row2['task_id'];
}
}

$sql2 = "SELECT * FROM tbl_admin WHERE employee_id=1";
$res2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($res2);
$count_rows = mysqli_num_rows($res2);

if($count_rows>0){
    session_start();
    $_SESSION['employee_id'] = $row['employee_id'];
    $_SESSION['login_id'] = $row['login_id'];
   
}   

?>