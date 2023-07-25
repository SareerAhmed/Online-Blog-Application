<?php   

        $query_all_categories = "SELECT * FROM category ORDER BY category_id DESC ";
        $res_of_all_categories = mysqli_query($connection, $query_all_categories);
        // var_dump($res_of_all_categories);
                               
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

    <table id="all-categories" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Categories Title</th>
                <th>Categories Description</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated at</th>
                <th>Action</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count=0;
             if($res_of_all_categories->num_rows>0){
                while ($category_data = mysqli_fetch_assoc($res_of_all_categories)){
                    extract($category_data);
                    // print_r($category_data);
                    ?>
               <tr>
                <td><?php echo ++$count; ?></td>
                <td><?php echo $category_title  ?></td>
                <td><?php echo $category_description  ?></td>
                <?php
                if ($category_status=="InActive") { ?>
                <td class="text-danger"><?php echo $category_status;  ?></td>
                <?php } else{ ?>
                    <td class="text-success"><?php echo $category_status;  ?></td>
                <?php }?>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$created_at")); ?></td>
                <td><?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$updated_at")); ?></td>

                <?php 
                if ($category_status=="InActive") { ?>    
                <td><a  href="category-process.php?page=view-all-categories.php&action=active&category_id=<?php echo $category_id; ?>" class="btn m-2  bg-success" >Active</a> </td>
                <?php }else{ ?>

                <td><a  href="category-process.php?page=view-all-categories.php&action=inactive&category_id=<?php echo $category_id; ?>" class="btn m-2 bg-danger" >InActive</a> </td>
                <?php }
                ?>

                
                <td><a  href="edit-category.php?action=edit&category_id=<?php echo $category_id; ?>" class="btn m-2  bg-success" >Edit</a> </td>

                <?php 
                }
            }
                                    
            ?>
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>