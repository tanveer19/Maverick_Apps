<?php

    if(isset($_GET['status'])) {
        $pages_id=$_GET['id'];
        if($_GET['status'] == 'unpublished') {
            $meassage=$obj_sup_admin->unpublished_pages_by_id($pages_id); 
        }
        else if($_GET['status'] == 'published') {
            $meassage=$obj_sup_admin->published_pages_by_id($pages_id); 
        }
        else if($_GET['status'] == 'delete') {
            $meassage=$obj_sup_admin->delete_pages_by_id($pages_id); 
        }
    }



    $query_result=$obj_sup_admin->select_all_pages_info();
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2>
            <?php
                if(isset($meassage)) {
                    echo $meassage;
                }
                unset($meassage);
            ?>
        </h2>
        <h2>
            <?php
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                
            ?>
        </h2>
        
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($pages_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $pages_info['pages_id']; ?></td>
                        <td class="center"><?php echo $pages_info['pages_name']; ?></td>
                        <td class="center"><?php echo $pages_info['pages_description']; ?></td>
                        <td class="center">
                            <?php 
                                if( $pages_info['publication_status'] == 1 ) {
                                    echo 'Published';
                                } else { echo 'Unpublished'; } ?>
                        </td>
                        <td class="center">
                            <?php if($pages_info['publication_status'] == 1) { ?>
                            <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $pages_info['pages_id']; ?>" title="Unpublished">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            <?php } else { ?>
                            <a class="btn btn-danger" href="?status=published&&id=<?php echo $pages_info['pages_id']; ?>" title="Published">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                            <?php } ?>
                            <a class="btn btn-info" href="edit_pages.php?id=<?php echo $pages_info['pages_id']; ?>" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $pages_info['pages_id']; ?>" title="Delete" onclick="return check_delete_info(); ">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>