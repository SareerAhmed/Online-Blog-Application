
<?php   

    $query_user_feedback = "SELECT * FROM `user_feedback`";
        
        $res_user_feedback = mysqli_query($connection, $query_user_feedback);        
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Table Data</title>
	
</head>
<body>

    <table id="all-feedback" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Feedback</th>
                <th>Feedback Full Details</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
             <?php
              if($res_user_feedback->num_rows>0){
            $count=0;
            while ($user_feedback_data = mysqli_fetch_assoc($res_user_feedback)) {
                extract($user_feedback_data);
             ?>
               <tr>
                <td><?php echo ++$count; ?></td>
                <td><?php echo $user_name;?></td>
                <td><?php echo $user_email;  ?></td>
                <td><?php echo $feedback;  ?></td>
                <td><a  href="view-only-feedback.php?&action=feedback_details&feedback_id=<?php echo $feedback_id; ?>" class="btn m-2  bg-info" >All Details</a> </td>

                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$created_at")); ?></td>
            </tr>
            <?php } } ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>