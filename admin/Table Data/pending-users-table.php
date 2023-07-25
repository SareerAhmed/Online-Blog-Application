<?php   


    

        $query_login_user = "SELECT * FROM USER WHERE is_approved ='pending'";
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

    <table id="pending-users" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile</th>
                <th>Full Name</th>
                <th>Permission</th>
                <th>Status</th>
                <th>Account Created</th>
                <th>Approve</th>
                <th>Reject</th>
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
                <?php
                if ($is_active=="InActive") { ?>
                <td class="text-danger"><?php echo $is_active;  ?></td>
                <?php } else{ ?>
                    <td class="text-success"><?php echo $is_active;  ?></td>
                <?php } ?>                
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$created_at")); ?></td> 
                <td><a  href="users-process.php?page=pending-users.php&action=approve&user_id=<?php echo $user_id; ?>" class="btn m-2  bg-success" >Approve</a> </td>
                <td><a  href="users-process.php?page=pending-users.php&action=reject&user_id=<?php echo $user_id; ?>" class="btn m-2 bg-danger" >Reject</a> </td>                
            </tr>
           <?php }
            ?>
            
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>