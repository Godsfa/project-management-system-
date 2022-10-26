<?php
if($conn = mysqli_connect('localhost', 'task_manager' ,'task_manager', 'task_manager')){
            // echo "db connected";
      }else{
          mysqli_error($conn);
      }
?>