<?php

include('config/db_conn.php');


if(isset($_GET['task_id'])){
    //get the list id value
    $task_id = $_GET['task_id'];

    $sql2 = "SELECT * FROM tbl_tasks WHERE task_id=$task_id";

    $res2 = mysqli_query($conn, $sql2);

    if($res2==true){
        $row2 = mysqli_fetch_assoc($res2);

        $task_name = $row2['task_name'];
        $task_description = $row2['task_description'];
        $priority = $row2['priority'];
        $start_time = $row2['start_time'];
        $end_time = $row2['end_time'];
        $status = $row2['status'];

    }else{
        header('location:manage-list.php');
    }
}

?>

<?php 

// connect to batabase


//write query for all datails
$sql = "SELECT * FROM tbl_tasks";

$result = mysqli_query($conn, $sql);

$details = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<html>
    <head>
        <title>Details</title>
        <link rel="stylesheet" href="css/style103.css">
    </head>

    <body>
    <?php 
      // connection to database
      include('sidebar.php');
    ?>
                                <div class="wrapper">
                                    <div class="container">
                                        <div class="whole">
                               
                                  <div class="edit-text">
                                     <h3 class="edit">Task Details </h3>
                                  </div>

				                  <table class="table">
				                      <tr>
				                        <td>Task Title</td><td><?php echo $task_name; ?></td>
				                      </tr>
				                      <tr>
				                        <td>Description</td><td><?php echo $task_description; ?></td>
				                      </tr>
                                      <tr>
				                        <td>Priority</td><td><?php echo $priority; ?></td>
				                      </tr>
				                      <tr>
				                        <td>Start Time</td><td><?php echo $start_time; ?></td>
				                      </tr>
				                      <tr>
				                        <td>End Time</td><td><?php echo $end_time; ?></td>
				                      </tr>
				                     
                                        <tr>
                                            <td>Status</td>
                                            <td><?php  if($row2['status'] == 1){
                                                echo "In Progress";
                                            }elseif($row2['status'] == 2){
                                                echo "Completed";
                                            }else{
                                                echo "Incomplete";
                                            } ?>
                                            </td>
                                        </tr>
				                  </table>
				               
                    <div>
                        <a href="index.php"><span class="submit-btn">Go Back</span></a>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>