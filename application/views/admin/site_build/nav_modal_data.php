<div class="modal-header modal-colored-header bg-warning">
    <h4 class="modal-title" id="warning-header-modalLabel">Edit Navigation Items</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    
    <h4>Edit Navigation</h4>
    <form class="pl-3 pr-3" id="frm-navigation" action="<?php base_url('admin/navigation_update') ?>"><!--You will need to add some PHP to make this form work-->
        <div class="col-sm">
            <div class="form-group">
                <label for="nav-link-name">Navigation Label&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the word/s that will show for this link in your website's Navigation"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <input class="form-control" type="text" id="nav-link-name" name="navigation_menu_default_label" placeholder="Type the Nav Link Name Here, EX: Home" value="<?php echo isset($data->navigation_menu_default_label) ? $data->navigation_menu_default_label :''; ?>" required>
                <input type="hidden" name="navigation_menu_id" id="nav_id" value="<?php echo $data->navigation_menu_id ?>" readonly="">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="nav-url-alias">Link URL Alias&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This should be the URL you want this to show in the browser when a user clicks this link. There should be no spaces in what you type here and it should be all lowercase."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <input class="form-control" type="text" id="nav-url-alias" name="navigation_alias" placeholder="example-page-alias" value="<?php echo isset($data->url_alias_value) ? $data->url_alias_value :''; ?>">
            </div>
        </div>
                <div class="col-lg">
                    <div class="form-group mb-2">
                        <label for="example-select">Page to Link to&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the page where your navigation link will go to. Must be an existing page in your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="nav-page-select" name="page_id">
                            <option value="">&nbsp;&nbsp;Select the Page to Link to&nbsp;&nbsp;</option>
                            <?php foreach( $pages as $key => $row ): ?>
                                <option value="<?php echo $row->page_id ?>" <?php echo isset($data->page_id) && $row->page_id == $data->page_id ? "selected=''" :'' ?> ><?php echo $row->page_title ?></option><!--replace me with dynamic website info-->
                            <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                <div class="col-sm">
            <div class="form-group">
                <label for="nav-custom-url">Custom URL for Link&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use the Menu Above OR enter a custom URL for this Link."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <input class="form-control" type="text" id="nav-custom-url" name="custom_url_link" placeholder="https://yoursite.com/customurl" value="<?php echo isset($data->custom_url) ? $data->custom_url :''; ?>">
            </div>
        </div>
            <div class="col-sm mt-3">
                <div class="col-sm mt-3">
                    <div class="custom-checkbox">
                        <input type="checkbox" name="navigation_menu_open_to_new_tab"  value="1" <?php echo isset($data->navigation_menu_open_to_new_tab) && $data->navigation_menu_open_to_new_tab == 1 ? "checked=''" :''; ?>>
                        <label>Open Link in New Tab</label>
                    </div>
                    <div class="custom-checkbox mt-2">
                        <input type="checkbox" name="navigation_menu_show_in_footer"   value="1" <?php echo isset($data->navigation_menu_show_in_footer) && $data->navigation_menu_show_in_footer == 1 ? "checked=''" :''; ?>>
                        <label>Show in Footer Section</label>
                    </div>
                    <div class="custom-checkbox mt-2 mb-2">
                        <input type="checkbox" name="navigation_menu_is_nav_category" value="1" <?php echo isset($data->navigation_menu_is_nav_category) && $data->navigation_menu_is_nav_category == 1 ? "checked=''" :''; ?>>
                        <label>Make a Navigation Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you check this, your navigation item will be a separate category in your navigation list."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                </div>

            </div>
        <!--end column-->
        <div class="modal-footer">
        <div class="form-group text-center">
            <button data-dismiss="modal" class="btn btn-lg btn-secondary mb-3" type="reset">Cancel</button>&nbsp;&nbsp;
            <button class="btn btn-lg btn-info mb-3" type="submit">Save</button>&nbsp;&nbsp;
            
        </div>
    </div><!--end modal footer-->
    </form><!--end the form-->

</div><!-- / .modal body-->