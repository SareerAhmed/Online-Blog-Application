<?php   

require_once 'session.php'; 

        $query_all_user = "SELECT * FROM USER WHERE is_approved='Approved'";
                        $res_of_cheack_user = mysqli_query($connection, $query_all_user);
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
         a[href*="action"]{
            color: white;
        }
    </style>
	
</head>
<body>

    <table id="all_users_table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile</th>
                <th>Full Name</th>
                <th>Permission</th>
                <th>Status</th>
                <th>Account Created</th>
                <th>Active</th>
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
                <td><img src="<?php echo "../".$user_image;  ?>" style="width: 50px; border-radius: 10%;" alt=""></td>
                <td><?php echo $first_name." ".$last_name;  ?></td>
                <td><?php echo $is_approved;  ?></td>
                <?php
                if ($is_active=="InActive") { ?>
                <td class="text-danger"><?php echo $is_active;  ?></td>
                <?php } else{ ?>
                    <td class="text-success"><?php echo $is_active;  ?></td>
                <?php } ?>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$created_at")); ?></td>
                <?php
                if ($role_id==2 || $user_id==$login_user_data['user_id']) {
                if ($is_active=="InActive") { ?>
                    
                <td><a   href="users-process.php?page=view-all-users.php&action=active&user_id=<?php echo $user_id; ?>" class="btn m-2  bg-success" >Active</a> </td>
                <?php }else{ ?>

                <td><a  href="users-process.php?page=view-all-users.php&action=inactive&user_id=<?php echo $user_id; ?>" class="btn m-2 bg-danger" >InActive</a> </td>
                <?php }}else{?>
                    <td> <a style="color: white;" class="btn m-2 bg-info">View Only </a></td>
                <?php }
                ?>
                <td><a  href="view-only-user.php?page=view-only-user.php&action=all_details&user_id=<?php echo $user_id; ?>" class="btn m-2 bg-info">All Details</a> </td>
                <?php if ($role_id==1 && $user_id!=$login_user_data['user_id']) { ?>
                    <td> <a class="btn m-2 bg-primary">View Only </a></td> 
                <?php } else { ?>
                     <td><a  href="modify-user.php?page=view-all-users.php&action=update_account&user_id=<?php echo $user_id; ?>" class="btn m-2 bg-primary">Update Account</a> </td>
                <?php }} ?>
            </tr>
           <?php 
            ?>
            
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>