<?php   

    $query_following_blog = "SELECT `blog`.`blog_title` , user.`first_name`, user.`last_name`,user.`email`, user.`user_image`, `following_blog`.`status`,`following_blog`.`created_at`, `following_blog`.`updated_at` FROM blog INNER JOIN `following_blog` ON `blog`.`blog_id`=`following_blog`.`blog_following_id` INNER JOIN `user` ON user.`user_id`=`following_blog`.`follower_id` WHERE `following_blog`.`status`='Followed'";
        
        $res_following_blog = mysqli_query($connection, $query_following_blog);

        $query_total_blogs="SELECT * FROM `blog` ORDER BY blog_title";
        $result_total_blogs= mysqli_query($connection, $query_total_blogs);
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
                <th>Blog Title</th>
                <th>Blogs Total Followers</th>
                <th>Follower Detail</th>

            </tr>
        </thead>
        <tbody>
             <?php
              if($res_following_blog->num_rows>0){
            $count=0;
            while ($blog_data = mysqli_fetch_assoc($result_total_blogs)) {
                //extract($following_blog_data);
                $total_followers_is=0; 
              $query_total_followers="SELECT * FROM `following_blog` WHERE STATUS='Followed' AND blog_following_id='{$blog_data['blog_id']}'";
                $result_total_followers= mysqli_query($connection, $query_total_followers);
                if ($result_total_followers->num_rows>0) {
                    while ($total_numb=mysqli_fetch_assoc($result_total_followers)) {
                    ++$total_followers_is;
                    }
                }
                
             ?>
               <tr>
                <td><?php echo ++$count; ?></td>
                <td><b><?php echo $blog_data['blog_title'];  ?></b></td>
                <td><?php echo $total_followers_is;;  ?></td>
                <td><a  href="follower.php?blog_id=<?php echo $blog_data['blog_id']; ?>" class="btn m-2  bg-info" >All Details</a> </td>
                
            </tr>
            <?php } } ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>