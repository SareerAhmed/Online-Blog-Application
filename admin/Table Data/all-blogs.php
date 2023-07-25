<?php   

        $query_all_blogs = "SELECT * FROM blog";
        $res_of_all_blgs = mysqli_query($connection, $query_all_blogs);
                                if($res_of_all_blgs->num_rows>0){
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

    <table id="all-blogs" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Bloger Name</th>
                <th>Blog Title</th>
                <th>Posts Per Blog</th>
                <th>Blog Background Image</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Update at</th>
                <th>Action</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count=0;
            while ($blog_data = mysqli_fetch_assoc($res_of_all_blgs)) {
                extract($blog_data);
                 $query_all_user = "SELECT `user`.`first_name`, `user`.`last_name`, user.`user_image` FROM USER WHERE user_id='{$blog_data['user_id']}'";
                        $res_of_cheack_user = mysqli_query($connection, $query_all_user);
                                if($res_of_cheack_user->num_rows>0){
                                $user_data = mysqli_fetch_assoc($res_of_cheack_user);;
                                extract($user_data);
                    }

             ?>
               <tr>
                <td><?php echo ++$count; ?></td>
                <td><?php echo $first_name." ".$last_name;  ?></td>
                <td><?php echo $blog_title;  ?></td>
                <td><?php echo $post_per_page;  ?></td>
                <td><img src="<?php echo "../".$blog_background_image;  ?>" style="width: 50px; border-radius: 10%;" alt=""></td>
                <?php
                if ($blog_status=="InActive") { ?>
                <td class="text-danger"><?php echo $blog_status;  ?></td>
                <?php } else{ ?>
                    <td class="text-success"><?php echo $blog_status;  ?></td>
                <?php } ?>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$created_at")); ?></td>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$updated_at")); ?></td>
                
                <?php
                if ($user_id==$login_user_data['user_id']) {
                    if ($blog_status=="InActive") { ?>
                    <td><a  href="users-process.php?page=view-all-blogs.php&action=blog_active&blog_id=<?php echo $blog_id; ?>" class="btn m-2  bg-success" >Active</a> </td>
                    <?php 
                    }else{ ?>
                    <td><a  href="users-process.php?page=view-all-blogs.php&action=blog_inactive&blog_id=<?php echo $blog_id; ?>" class="btn m-2 bg-danger" >InActive</a> </td>
                    <?php }
                }else{ ?>
                    <td><a  href="../blog.php?action=show_blog&blog_id&blog_id=<?php echo $blog_id; ?>" class="btn m-2 btn m-2 bg-info" >View Only</a> </td>
                    <?php } 
                    if ($user_id==$login_user_data['user_id']){ ?>
                        <td><a  href="edit-blog.php?action=blog_edit&blog_id=<?php echo $blog_id; ?>" class="btn m-2 btn m-2 bg-primary" >Edit</a> </td>
                   <?php }else{ ?>
                    <td><a  href="../blog.php?action=show_blog&blog_id&blog_id=<?php echo $blog_id; ?>" class="btn m-2 btn m-2 bg-info" >View Only</a> </td>

                   <?php } ?>
                    
            </tr>
           <?php }
            ?>
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>