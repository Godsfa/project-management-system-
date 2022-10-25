<?php 
      // connection to database
      include('config/db_conn.php');
?>

<html>
    <head>
        <title>Tasks Manager System</title>
       <link rel="stylesheet" href="css/general_style.css">
       <!-- CSS only -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
       
    </head>

    <body>
    <?php 
  
      include('sidebar.php');
    ?>

    <div class="wrapper1">
        <!-- menu starts here -->
        <div class="menu">

        </div>
        <!-- menu ends here -->
        <!-- tasks starts here -->
        <div class="all-tasks">
            <a href="add-task.php" class="new_task">Assign New Task</a>
            
            <table>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Tasks Name</th>
                    <th>Assigned To</th>
                    <th>priority</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

                    <?php 

                        $sql = "SELECT tbl_tasks.*, tbl_admin.*
                        FROM tbl_tasks
                        INNER JOIN tbl_admin ON tbl_tasks.employee_id=tbl_admin.employee_id

                        ";

                        $res = mysqli_query($conn, $sql);

                        if($res==true){
                            $count_rows = mysqli_num_rows($res);

                            $sn = 1;

                            if($count_rows>0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $detail = $row['task_id'];
                                    $task_id = $row['task_id'];
                                    $task_name = $row['task_name'];
                                    $assign = $row['username'];
                                    $priority = $row['priority'];
                                    $start_time = $row['start_time'];
                                    $end_time = $row['end_time'];
                                    
                                ?>
                                <tr class="content">
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $task_name;?></td>
                                    <td><?php echo $assign;?></td>
                                    <td><?php echo $priority;?></td>
                                    <td><?php echo $start_time;?></td>
                                    <td><?php echo $end_time;?></td>
                                    <td>
                                        <?php if($row['status'] == 1){
                                            echo "In Progress <i class='bi bi-arrow-repeat' style='color:#d4ab3a;' width:30px;></i>";
                                        }elseif($row['status'] == 2){
                                        echo "Completed <i class='bi bi-check-lg' style='color:#00af16;'></i>";
                                        }else{
                                        echo "Incomplete <i class='bi bi-x-lg' style='color:#d00909;'></i>" ;
                                        } ?>
                                    </td>
                                <div>
                                    <td>   
                                    <a href="update-task.php?task_id=<?php echo $task_id; ?>" class="update_delete"><i class="bi bi-pencil-square"></i></a>
                                  
                                     <a href="task-details.php?task_id=<?php echo $detail; ?>" class="update_delete"><i class="bi bi-folder-fill"></i></a>
                                  
                                  
                                     <a href="delete-task.php?task_id=<?php echo $task_id; ?>" class="update_delete"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg></a> 
                                   
                                </td>
                                </div>
                                </tr>
                                <?php                                    
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan="5">No Data Found</td>
                                    </tr>
                                <?php
                            }
                        }else{

                        }
                    ?>

                
            </table>
           
        </div>
        <!-- tasks ends here -->
    </div>
    </body>
</html>