<?php 
  // connection to database
  include('config/db_conn.php');

?>

<html>
    <head>
        <title>Tasks manager</title>
       <link rel="stylesheet" href="css/general_style.css">
    </head>

    <body>
       
    <?php 
      // connection to database
      include('sidebar.php');
    ?>
    

        <div class="wrapper11">
            <div class="container">
        <div id="container-add">
            <div id="add">
                 <h3 class="h3">Assign New Tasks</h3>
            </div>
        </div>

        <form action="add-task.php" method="POST">
            <div class="whole">
            <table class="tbl-half">
                
                <tr>
                    <td>Tasks Name</td>
                    <td><input type="text" name="task_name" placeholder="Type Your Task Name" class="input" required></td>
                </tr>
                <tr>
                    <td>Task Description</td>
                    <td>
                        <textarea name="task_description" id="" cols="30" rows="" class="input" placeholder="Type Your  Task Description" required>

                    </textarea>
                </td>
                </tr>

                <tr>
                    <td>Priority: </td>
                    <td>
                        <select name="priority"  class="input">
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </td>
                </tr>

                <tr>
                        <td>Start Time: </td>
			            <td>
			            <input type="datetime-local" name="start_time" class="start_time" required>
                        </td>
                    </tr>
                    <tr>
                        <td>End Time: </td>
			            <td>
                        <input type="datetime-local" name="end_time" class="end_time" required>
			            </td>
			        </tr>
                <tr>
                    <td>Assign To: </td>
                    <td>
                      <select name="employee_id" class="assign" required>
                        <?php
                           $sql2 = "SELECT * FROM tbl_admin WHERE employee_id > 1";

                            $res2 = mysqli_query($conn, $sql2);

                            if($res2==true){
                            while($row2 = mysqli_fetch_assoc($res2)){
                            $user_id = $row2['employee_id'];
                            $user_name = $row2['username'];
                            ?> 
                             <option value="<?php echo $user_id; ?>"><?php echo $user_name; ?></option>
                                <?php
                                    }
                            }else{

                            }
                            ?>
                      </select>
                            </td>

                    </div>
                   </tr>
                <tr>
                    <td>
                        <input type="submit" value="Assign Task" name="submit" id="btn">
                    </td>
                </tr>
               
            </table>
         </div>
        </form>
        </div>
    </div>
    </body>
</html>

<?php 

    if(isset($_POST['submit'])){

        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $priority = $_POST['priority'];
        $assign = $_POST['employee_id'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

       $sql2 = "INSERT INTO tbl_tasks SET
            task_name ='$task_name',
            task_description = '$task_description',
            priority = '$priority',
            employee_id = '$assign',
            start_time = '$start_time',
            end_time = '$end_time'
            ";

        $res2 = mysqli_query($conn, $sql2);

         if($res2==true){
            echo '<script>
        alert("Successfully Created")
        window.location.href="index.php"
        </script>';
        }else{
            echo '<script>
        alert("Tasks Creation Failed")
        window.location.href="add-task.php"
        </script>';
        }
    }

?>