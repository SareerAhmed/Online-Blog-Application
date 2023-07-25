<?php   
          
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

    <table id="all-post" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile</th>
                <th>Bloger Name</th>
                <th>Blog Name</th>
                <th>Title</th>
                <th>Post Status</th>
                <th>Attachments</th>
                <th>Read Full Post</th>
                <th>Action</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /*WHERE user.`user_id`=".$login_user_data['user_id'] .*/
                $query_all_post_current_user = "SELECT * FROM blog INNER JOIN post ON blog.blog_id = post.blog_id INNER JOIN `user` ON `blog`.`user_id` = `user`.`user_id` ORDER BY post_id DESC;";
                    $result_all_post_current_user = mysqli_query($connection, $query_all_post_current_user);  

                    if($result_all_post_current_user->num_rows>0){
                    $count=0;
                    while ($blog_data = mysqli_fetch_assoc($result_all_post_current_user)) {
                          extract($blog_data);
                          // var_dump($blog_data);
                     ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td> <img style="width: 66px; border-radius: 50%" src="../<?php echo $blog_data['user_image']?>" > </td>
                    <td><?php echo $blog_data['first_name']." $last_name" ?></td>
                    <td><?php echo $blog_data['blog_title'] ?></td>
                    <td><?php echo $post_title;  ?></td>
                  <?php  if ($post_status=="InActive") { ?>
                    <td><p class="text-center" style="color: red;">InActive</p> </td>
                    <?php 
                    }else{ ?>
                        <td><p class="text-center" style="color: green;">Active</p> </td>
                    <?php } 
                    $cheack_attchment= "SELECT * FROM `post_atachment` WHERE post_id=$post_id";
                    $result_cheack_attchment= mysqli_query($connection, $cheack_attchment);
                    if ($result_cheack_attchment->num_rows>0){
                        $post_attachments_data =mysqli_fetch_assoc($result_cheack_attchment);
                       /* echo "<pre>";
                        print_r($post_attachments_data);
                        echo "</pre>";*/ ?>
                        <td><a  href="view-all-posts-attachments.php?action=view_post&post_id=<?php echo $post_id; ?>" class="btn m-2 btn m-2 bg-info" >View Attachments</a> </td><?php
                    }else{ ?>
                         <td>No Attachement</td>
                         <?php
                    }   ?>                     
                    <?php  ?>
                     <td><a  href="post.php?action=view_post&post_id=<?php echo $post_id; ?>" class="btn m-2 btn m-2 bg-info" >View POST</a> </td>

                     <?php
                     if ($user_id==$login_user_data['user_id']) {
                    if ($post_status=="InActive") { ?>
                    <td><a  href="post-process.php?location=view-all-posts.php&action=active_post&post_id=<?php echo $post_id; ?>" class="btn m-2  bg-success" >Active</a> </td>
                    <?php 
                    }else{ ?>
                    <td><a  href="post-process.php?location=view-all-posts.php&action=in_active_post&post_id=<?php echo $post_id; ?>" class="btn m-2 bg-danger" >InActive</a> </td>
                    <?php }
                }else{ ?>
                    <td><a  href="post.php?action=view_post&post_id=<?php echo $post_id; ?>" class="btn m-2 btn m-2 bg-info" >View Only</a> </td>
                    <?php } 

                    if ($user_id==$login_user_data['user_id']){ ?>
                        <td><a  href="edit-post.php?action=edit&post_id=<?php echo $post_id; ?>" class="btn m-2  bg-success" >Edit</a> </td>
                    <?php }else{ ?>
                        <td><a  href="post.php?action=view_post&post_id=<?php echo $post_id; ?>"class="btn m-2  bg-info" >View Only</a> </td>

                       <?php } ?>
                       
                </tr>
                <?php }// while loop end 
                    }//if res_of_all_post end
            ?>

        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>