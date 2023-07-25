    <?php   

        $query_following_blog = "SELECT `blog`.`blog_title` , user.`first_name`, user.`last_name`,user.`email`, user.`user_image`, `following_blog`.`status`,`following_blog`.`created_at`, `following_blog`.`updated_at` FROM blog INNER JOIN `following_blog` ON `blog`.`blog_id`=`following_blog`.`blog_following_id` INNER JOIN `user` ON user.`user_id`=`following_blog`.`follower_id` WHERE `following_blog`.`status`='Followed' AND `blog`.`blog_id`='{$_REQUEST['blog_id']}' ORDER BY `following_blog`.`updated_at` DESC";
        $res_following_blog = mysqli_query($connection, $query_following_blog);        
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Table Data</title>
	
</head>
<body>

    <table id="followers_table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Follower Profile</th>
                <th>Follower Name</th>
                <th>Follower Email</th>
                <th>Blog Name</th>
                <th>Following Date</th>
            </tr>
        </thead>
        <tbody>
             <?php
              if($res_following_blog->num_rows>0){
            $count=0;
            while ($following_blog_data = mysqli_fetch_assoc($res_following_blog)) {
                extract($following_blog_data);
             ?>
               <tr>
                <td><?php echo ++$count; ?></td>
                <td><img src="<?php echo "../".$user_image;  ?>" style="width: 90px; border-radius: 10%;" alt=""></td>
                <td><?php echo $first_name." ".$last_name;  ?></td>
                <td><?php echo $email;  ?></td>
                <td><?php echo $blog_title;  ?></td>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$updated_at")); ?></td>
            </tr>
            <?php } } ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>