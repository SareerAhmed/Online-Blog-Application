<?php   

require_once 'session.php'; 
$query_all_comment = "SELECT user.`first_name`, user.`last_name`, user.`user_image`, post.`post_title`, post_comment.`post_comment_id`, post_comment.`comment`, post_comment.`is_active`,post_comment.`created_at` FROM USER INNER JOIN `post_comment` 
ON user.`user_id` = `post_comment`.`user_id`INNER JOIN post ON post.`post_id` = post_comment.`post_id` ORDER BY post_comment_id DESC";
$res_of_all_comment = mysqli_query($connection, $query_all_comment);
                               
                                    //print_r($res_of_all_comment);
                                
             
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

    <table id="all-comments" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile</th>
                <th>Full Name</th>
                <th>Post Titile</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Created</th>
                <th>All Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count=0;
            if($res_of_all_comment->num_rows>0){
            while ($comment_data = mysqli_fetch_assoc($res_of_all_comment)) {
                extract($comment_data);
             ?>
               <tr>
                <td><?php echo ++$count; ?></td>
                <td><img src="<?php echo "../".$user_image;  ?>" style="width: 50px; border-radius: 10%;" alt=""></td>
                <td><?php echo $first_name." ".$last_name;  ?></td>
                <td><?php echo $post_title;  ?></td>
                <td><?php echo substr($comment,0,25).".....";  ?></td>
                <?php
                if ($comment_data['is_active']=="InActive") { ?>
                <td class="text-danger"><?php echo $comment_data['is_active'];  ?></td>
                <?php } else{ ?>
                    <td class="text-success"><?php echo $comment_data['is_active'];  ?></td>
                <?php } ?>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$created_at")); ?></td>

                    <td><a  href="view-only-comment.php?page=view-all-comments.php&action=all_details&post_comment_id=<?php echo $post_comment_id; ?>" class="btn m-2  bg-info" >All Details</a> </td>

                <?php
                if ($comment_data['is_active']=="InActive") { ?>
                    <td><a  href="comment-process.php?page=view-all-comments.php&action=active&post_comment_id=<?php echo $post_comment_id; ?>" class="btn m-2  bg-success" >Active</a> </td>
                <?php } else{ ?>
                    <td><a  href="comment-process.php?page=view-all-comments.php&action=inactive&post_comment_id=<?php echo $post_comment_id; ?>" class="btn m-2  bg-danger" >InActive</a> </td>
                <?php } ?>
               
            </tr>
            <!-- Modal Contact Us Start-->
            <form action="contact-us.php" method="POST">
            <div class="modal fade" id="model_<?php echo $comment_data['post_comment_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Comment Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Name</label>
                      <?php echo $first_name." ".$last_name;  ?>
                      <input type="text" class="form-control" id="user_name" value="<?php echo $first_name." ".$last_name;  ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Email</label>
                      <input type="email" class="form-control" id="user_email" name="user_email">
                    </div>
                       
                    
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                      <textarea class="form-control" name="feedback" id="feedback" rows="3"></textarea>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="feedback_send" value="feedback_send" class="btn btn-primary">Send Message</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!-- Modal Contact US End -->
           <?php } }
            ?>
            
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>