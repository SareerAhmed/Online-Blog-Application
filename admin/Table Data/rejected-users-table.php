<?php   
    
        $query_login_user = "SELECT * FROM USER WHERE is_approved ='rejected'";
        $res_of_cheack_user = mysqli_query($connection, $query_login_user);
        if($res_of_cheack_user->num_rows>0){
        // $user_data = mysqli_fetch_assoc($res_of_cheack_user);
            echo "<pre>";
            // print_r($user_data);
            echo "</pre>";
                    }
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Table Data</title>
    <style>
         a[href*="php"]{
            color: white;
        }
    </style>
	
</head>
<body>

    <table id="rejected-users" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile</th>
                <th>Full Name</th>
                <th>Permission</th>
                <th>Account Created</th>
                <th>Account Rejected</th>
                <th>Approve in 24 Hours</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count=0;
            while ($user_data = mysqli_fetch_assoc($res_of_cheack_user)) {
                // print_r($user_data);
                extract($user_data);?>
            <tr>
                <td><?php echo ++$count; ?></td>
                <td><img src="<?php echo "../".$user_image;  ?>" style="width: 50px; border-radius: 10%;" alt=""></td>
                <td><?php echo $first_name." ".$last_name;  ?></td>
                <td><?php echo $is_approved;  ?></td>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$created_at")); ?></td>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$updated_at")); ?></td>
                <?php
                $now_time =$timestamp = time();
                $reject_time = strtotime("$updated_at");
                $after_calculation= $now_time-$reject_time;
                if ($after_calculation<'86400') { ?>  
                <td><a  href="users-process.php?page=rejected-users.php&action=approve&user_id=<?php echo $user_id; ?>" class="btn m-2  bg-success" >Approve</a> </td>
                <?php }else{ ?>
                <td> <p class="btn m-2 bg-danger" style="color: white"> No Action</p> </td>
                <?php } ?>
            </tr>
           <?php } ?>
            
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>