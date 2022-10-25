<?php 

include('config/db_conn.php');

if(isset($_GET['task_id'])){
    $task_id = $_GET['task_id'];

    $sql = "SELECT * FROM tbl_tasks WHERE task_id = $task_id";

    $res = mysqli_query($conn, $sql);

    if($res==true){
        $row = mysqli_fetch_assoc($res);
            $task_id = $row['task_id'];
            $task_name = $row['task_name'];
            $task_description = $row['task_description'];
            $employee_id = $row['employee_id'];
            $priority = $row['priority'];
            $start_time = $row['start_time'];
            $end_time = $row['end_time'];
           
         
    }

}else{
    // header('location:index.php');
}

?>


<html>
    <head>
        <title>Tasks Manager</title>
        <link rel="stylesheet" href="css/general_style.css">
    </head>

    <body>
     
    <?php 
      // connection to database
      include('sidebar.php');
    ?>
    
        <div class="wrapper7">
            <div class="container">

           <div class="edit-text">
             <h3 class="edit">EDIT TASK</h3>
           </div>
                
    <form action="" method="POST">
    <div class="whole">
    <table class="tbl-half">
    <tr>
    <td>Task Name: </td>
    <td><input type="text" name="task_name" value="<?php echo $task_name; ?>" required></td>
    </tr>
           
    <tr>
    <td>Task Descripton: </td>
    <td>
    <textarea name="task_description" id="" cols="38" rows="">
    <?php echo $task_description; ?>
    </textarea>
    </td>
    </tr>

    <tr>
      <td>Priority: </td>
        <td>
       <select name="priority">

         <option <?php if($priority=="High"){
         echo "selected ='selected'";
          } ?> value="High">High</option>

        <option <?php if($priority=="Medium") {
         echo "selected='selected'";
        } ?> value="Medium">Medium</option>

        <option <?php if($priority=="Low") {
         echo "selected='selected'";
        } ?>  value="Low">Low</option>
    </select>
    </td>                
    </tr>

    <tr>
        <td>Start Time: </td>


        <td><input type="datetime-local" name="start_time" class="start_time" value="<?php echo $start_time; ?>"></td>
    </tr>

    <tr>
        <td>End Time: </td>
        <td><input type="datetime-local" name="end_time" class="end_time" value="<?php echo $end_time; ?>"></td>
    </tr>

    <tr>
		<td>Status: </td>
        <td>
        <select class="form" name="status">
		    <option value="0" <?php if($row['status'] == 0){ ?>selected <?php } ?>>Started</option>
			<option value="1" <?php if($row['status'] == 1){ ?>selected <?php } ?>>Ongoing</option>
            <option value="2" <?php if($row['status'] == 2){ ?>selected <?php } ?>>Finished</option>
            <option value="3" <?php if($row['status'] == 3){ ?>selected <?php } ?>>Cancelled</option>               
        </select>
        </td>
    </tr>

        <tr>
            <td>Assign To</td>
            <td>

            <?php
             $sql2 = "SELECT employee_id, username FROM tbl_admin WHERE employee_id > 1";

            $res2 = mysqli_query($conn, $sql2);
            ?>

            <select class="form-control" name="assign_task" <?php if($employee_id != 1)?>>
            <option value="">Select</option>
            
                <?php while($rows = mysqli_fetch_assoc($res2)){ ?>
                    <option value="<?php echo $rows['employee_id']; ?>" <?php
                        if($rows['employee_id'] == $row['employee_id']){
                     ?> selected <?php } ?>><?php echo $rows['username']; ?></option>
                    <?php } ?>
                    
            </select>
            </td>
        </tr>

    <tr>
       <td><input type="submit" value="Update" class="submit-btn update" name="submit"></td>
    </tr>

    </table>
    </div>
    </form>
    
</div>
</div>
</body>
</html>

<?php 

  // connection to database

    if(isset($_POST['submit'])){

        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description']; 
        $priority = $_POST['priority'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $status = $_POST['status'];
        $employee_id = $_POST['assign_task'];
       
        $sql3 = "UPDATE tbl_tasks SET
        task_name = '$task_name',
        task_description ='$task_description',     
        priority = '$priority',
        employee_id = '$employee_id',
        start_time = '$start_time',
        end_time = '$end_time',
        status = '$status'
        WHERE
        task_id = $task_id";

        $res3 = mysqli_query($conn, $sql3);

     if($res3==true){
        echo '<script>
        alert("Successfully Updated")
        window.location.href="index.php"
        </script>';
        }else{
            echo '<script>
            alert("Failed To Update Task")
            window.location.href="index.php"
            </script>';
    }
}
?>