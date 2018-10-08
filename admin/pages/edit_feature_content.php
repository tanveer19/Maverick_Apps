<?php
$feature_id=$_GET['id'];
$query_result=$obj_sup_admin->select_feature_info_by_id($feature_id);
$feature_info=mysqli_fetch_assoc($query_result);

if(isset($_POST['btn'])) {
    $obj_sup_admin->update_feature_info($_POST);
}
    
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form name="edit_feature_form" class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $feature_info['feature_name']; ?>" name="feature_name" class="span6 typeahead" id="typeahead" >
                            <input type="hidden" value="<?php echo $feature_info['feature_id']; ?>" name="feature_id" class="span6 typeahead" id="typeahead" >
                        </div>
                    </div>          
                    <div class="control-group hidden-phone">
                        <label class="control-label"  for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="feature_description" id="textarea2" rows="3"><?php echo $feature_info['feature_description']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option>---Select Publication Status---</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Feature</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
<script>
    document.forms['edit_feature_form'].elements['publication_status'].value='<?php echo $feature_info['publication_status']; ?>';
</script>








