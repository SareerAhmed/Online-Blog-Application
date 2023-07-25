<?php   


    

        $query_login_user = "SELECT * FROM USER WHERE is_approved ='Approved'";
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
	
</head>
<body>

    <table id="approved-users" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile</th>
                <th>Full Name</th>
                <th>Permission</th>
                <th>Status</th>
                <th>Account Created</th>
                <th>Active</th>
                <th>InActive</th>
                <th>All Details</th>
                <th>Update Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count=0;
            while ($user_data = mysqli_fetch_assoc($res_of_cheack_user)) {
                // print_r($user_data);
                extract($user_data);
             ?>
               <tr>
                <td><?php echo ++$count; ?></td>
                <td><img src="<?php echo "../".$user_image;  ?>" style="width: 90px; border-radius: 10%;" alt=""></td>
                <td><?php echo $first_name." ".$last_name;  ?></td>
                <td><?php echo $is_approved;  ?></td>
                <td><?php echo $is_active;  ?></td>
                <td><?php echo $created_at;  ?></td>
                <td><a  href="users-process.php?action=active&user_id=<?php echo $user_id; ?>" class="btn m-2" style="background-color: green ">Active</a> </td>
                <td><a  href="users-process.php?action=inactive&user_id=<?php echo $user_id; ?>" class="btn m-2" style="background-color: red ">InActive</a> </td>
                <td><a  href="users-process.php?action=all_details&user_id=<?php echo $user_id; ?>" class="btn m-2" style="background-color: #B96533  ">All Details</a> </td>
                <td><a  href="modify-user.php?action=update_account&user_id=<?php echo $user_id; ?>" class="btn m-2" style="background-color: #B92533 ">Update Account</a> </td>
            </tr>
           <?php }
            ?>
            
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>