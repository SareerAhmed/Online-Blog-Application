<?php   
        if (isset($_REQUEST['action']) && $_REQUEST['action']=="view_post") {
           $select_all_attachments="SELECT user.user_id, post.`post_id`, post.`post_title`, `post_atachment`.`post_atachment_id`,  `post_atachment`.`post_attachment_title`,`post_atachment`.`post_attachment_path`,`post_atachment`.`is_active`,`post_atachment`.`updated_at`, `post_atachment`.`created_at`  FROM `user` INNER JOIN `blog` ON `user`.`user_id`=`blog`.`user_id` INNER JOIN `post` ON `post`.`blog_id`= `blog`.`blog_id`  INNER JOIN `post_atachment` ON `post_atachment`.`post_id`=`post`.`post_id` WHERE `post`.`post_id`=".$_REQUEST['post_id']; 
           $result_all_attachments = mysqli_query($connection, $select_all_attachments); 
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

    <table id="all-post" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Post Title</th>
                <th>Attachment Title</th>
                <th>Attachment File</th>
                <th>Status</th>
                <th>Updated</th>
                <th>Action</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
              
                    if($result_all_attachments->num_rows>0){
                    $count=0;
                    while ($attachment_data = mysqli_fetch_assoc($result_all_attachments)) {
                          extract($attachment_data);
                       


                     ?>
                    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $attachment_data['post_title']; ?></td>
                    <td><?php echo $attachment_data['post_attachment_title'] ?></td>
                    <td> <a href="../<?php echo $attachment_data['post_attachment_path'] ?>" download><?php echo $attachment_data['post_attachment_title'] ?></a></td>
                    <td><?php echo $attachment_data['is_active'] ?></td>
                    <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$updated_at")); ?></td>
                    <?php
                     if ($user_id==$login_user_data['user_id']) {
                    if ($is_active=="InActive") { ?>
                    <td><a  href="post-process.php?location=view-all-posts-attachments.php&action=active_attachment&post_atachment_id=<?php echo $post_atachment_id."&post_id=".$post_id ?>" class="btn m-2  bg-success" >Active</a> </td>
                    <?php 
                    }else{ ?>
                    <td><a  href="post-process.php?location=view-all-posts-attachments.php&action=inactive_attachment&post_atachment_id=<?php echo $post_atachment_id."&post_id=".$post_id ?>" class="btn m-2 bg-danger" >InActive</a> </td>
                    <?php }
                }else{ ?>
                    <td><a  class="btn m-2 btn m-2 bg-info" >View Only</a> </td>
                    <?php } 
                    if ($user_id==$login_user_data['user_id']) { ?>
                        <td><a  href="post_attachment-edit.php?&action=modify__attachment&post_atachment_id=<?php echo $post_atachment_id."&post_id=".$post_id ?>" class="btn m-2 bg-danger" >Modify</a> </td>
                    <?php 
                    }else{ ?>
                        <td><a  class="btn m-2 btn m-2 bg-info" >View Only</a> </td>
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