<?php 

    include('config/db_conn.php');

    //check if the list_id is assigned or not
    if(isset($_GET['task_id'])){
        $task_id = $_GET['task_id'];
        $sql = "DELETE FROM tbl_tasks WHERE task_id=$task_id";

        $res = mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['delete'] = '';
             header('location:index.php');
        }else{
           $_SESSION['delete_fail'] = '';
           header('location:index.php');
        }
    }else{
        header('location:index.php');
    }

   

?>