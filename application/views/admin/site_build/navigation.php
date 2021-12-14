<!--begin page content here-->
<div class="container-fluid admin-navigation">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                        <li class="breadcrumb-item active">Navigation</li>
                    </ol>
                </div>
                <h4 class="page-title">Navigation</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-10">
            <div class="card">
            <div class="card-body">
                <h4 class="header-title">
                Customize Your Site Navigation
                </h4>
                <p>
                To determine the main Navigation order for your site, drag your pages into the order you wish them to appear. To Cancel your changes, click Cancel. If you'd like to save your work, but not publish the changes, click Save. To save and Publish your work, click the Publish button.
                </p>
                <p>
                To rename your navigation links click on the name of the link. A modal window will pop-up with fields that will allow you to rename the link. To add or manage Navigation Categories, go to the Admin Section /<a href="admin-nav-categories.html" title="Manage Navigation Categories">Manage Navigation Categories </a>page.
                </p>
                <p class="text-muted">This feature works best on laptop or desktop computers. Dragging between columns and dragging position of navigation links will not be possible on mobile devices.</p>
            </div>
            </div><!--end card-->
        <div class="button-list">
            <div class="text-right">
                <button type="submit" id="nav-add-0" class="btn btn-lg btn-success" data-toggle="modal" data-target="#addcol-nav-modal">Add New Column</button>
                <button type="submit" class="btn btn-lg btn-secondary">Cancel</button>
            </div>
            </div><!--end button div-->
        </div><!--end col-->
        <!--BEGIN 20 MODALS for Nav Edits-->
        <!-- home modal content -->
        <div id="addcol-nav-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success">
                        <h4 class="modal-title" id="success-header-modalLabel">Add New Navigation Column</h4>
                        <button id="addModalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>Add New</h4>
                        <form class="pl-3 pr-3" action="POST" id='nav-add-col-form'><!--You will need to add some PHP to make this form work-->
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="nav-col-name">Navigation Column Label&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This column name in your website's Navigation"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                    <input class="form-control" type="text" id="nav-col-name" name="navigation_menu_default_label" placeholder="Type the Nav Column Name Here, EX: About Us">
                                    <input type='hidden' name="navigation_menu_parent_id" id="navigation_menu_parent_id">
                                    <input type='hidden' name="navigation_menu_is_active" value="0">
                                    <input type='hidden' name="navigation_menu_open_to_new_tab" value="0">
                                </div>
                            </div>
                            <!--end column-->
                            <div class="modal-footer">
                            <div class="form-group text-center">
                                <button id="cancel" class="btn btn-lg btn-secondary mb-3" type="reset" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                                <button id="saveNewNavCol" class="btn btn-lg btn-info mb-3" type="reset">Save</button>&nbsp;&nbsp;

                            </div>
                        </div><!--end modal footer-->
                        </form><!--end the form-->
                    </div><!-- / .modal body-->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
            <!-- Column2 Link1 modal content -->
        <div id="update-nav-modal-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">



                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- add modal -->
        <div id="additem-nav-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-warning">
                        <h4 class="modal-title" id="warning-header-modalLabel">Add Navigation Item</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>New Navigation Item</h4>
                        <form class="pl-3 pr-3" action="POST" id='nav-add-col-form'><!--You will need to add some PHP to make this form work-->
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="nav-link-name">Navigation Label&nbsp;</label>
                                    <input class="form-control" type="text" name="navigation_menu_default_label" placeholder="Type the Nav Link Name Here, EX: Home">
                                    <input type='hidden' name="navigation_menu_parent_id" id="navigation_menu_parent_id">
                                </div>
                            </div>
                            <!--end column-->
                            <div class="modal-footer">
                            <div class="form-group text-center">
                                <button class="btn btn-lg btn-secondary mb-3" type="reset" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                                <button id="saveNewNavCol" class="btn btn-lg btn-warning mb-3" type="reset">Add Item</button>&nbsp;&nbsp;

                            </div>
                        </div><!--end modal footer-->
                        </form><!--end the form-->
                    </div><!-- / .modal body-->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- add modal end -->
        <div id="deleteitem-nav-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="light-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-s modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-dark">
                        <h4 class="modal-title" id="light-header-modalLabel">Confirmation to remove</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h5>Remove selected item?</h5>
                        <input type="hidden" id="delete-nav-id">
                    </div><!-- / .modal body-->
                    <div class="modal-footer">
                            <div class="form-group text-center">
                                <button id="close-confirmation-modal-btn" class="btn btn-lg btn-secondary mb-3" type="reset" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                                <button id="delete-nav-btn" class="btn btn-lg btn-danger mb-3" type="reset">Delete</button>&nbsp;&nbsp;

                            </div>
                        </div><!--end modal footer-->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--END THE MODALS BEGIN PAGE CONTENT-->
        </div><!--end row-->
        <?php if( count($data) > 0 ): ?>

        <?php
        	$parent_navs = [];
    		for($i = 0; sizeof($data) > $i; $i++) 
                if($data[$i]->navigation_menu_parent_id == 0)
                    $parent_navs[] = 'nav-list-'.$data[$i]->navigation_menu_id;
        	$parent_navs = json_encode($parent_navs);
         ?>
         <?php
            $nav_colors = ['primary','warning','success','info','secondary','dark'];
            $column_counter = $color_counter = 0;
         ?>

        <div id="dragulaParent" class="row" data-containers='<?php echo($parent_navs) ?>'><!--this is where you set up the dragula ids. If there are more than six columns one will need to added to this list-->
            <div class="col-12">
                <!--This begins the Navigation Cards Section-->
                <!--Using the Dragula JS to make these draggable grab the scripts from the bottom of this page-->
                <!--begin card deck wrapper-->
                <div class="card-deck-wrapper mt-2">
                    <div class="card-deck" id="card-deck">
                    <?php foreach ($data as $key => $row): ?>
                        <?php if($row->navigation_menu_parent_id == 0): ?>
                            <div class="nav-list card-d-block bg-<?php echo($nav_colors[$color_counter]);?> m-2 py-2 px-2" id="nav-list-<?php echo($row->navigation_menu_id) ?>">
                                <h4 class="mt-0 text-white">Nav Column <?php echo(++$column_counter); ?>
                                    <a id="nav-add-<?php echo($row->navigation_menu_id) ?>" data-toggle="modal" data-target="#addcol-nav-modal"><i class="add-nav-item-btn mdi mdi-plus mdi-24px"></i></a>
                                </h4>
                                <h4 class="mt-0 text-white"><?php echo !empty($row->navigation_menu_modified_label) ? $row->navigation_menu_modified_label : $row->navigation_menu_default_label ?></h4>
                                <div class="card border m-3">
                                    <button id="nav-delete-<?php echo($row->navigation_menu_id) ?>" class="delete-nav-item-btn" data-toggle="modal" data-target="#deleteitem-nav-modal"><i class="mdi mdi-close mdi-18px"></i></button>
                                    <div class="card-body">
                                        <button type="button" id="update-nav-item-<?php echo($row->navigation_menu_id) ?>" class="btn btn-outline-<?php echo($nav_colors[$color_counter]); ?> btn-navigation" title="Click to edit" data-id="<?php echo $row->navigation_menu_id  ?>"><?php echo isset($row->navigation_menu_modified_label) ? $row->navigation_menu_modified_label : $row->navigation_menu_default_label ?></button>
                                        <span class="custom-control custom-checkbox mt-2 pl-0">
                                            <!-- <input type="checkbox" class="custom-control-input" id="col2Check<?php //echo($row->navigation_menu_id) ?>" name="navigation_menu_is_active" value="<?php //echo $row->navigation_menu_id ?>"  <?php //echo isset($row->navigation_menu_is_active) && $row->navigation_menu_is_active == 1 ? 'checked=""' : "" ?>>
                                            <label class="custom-control-label" for="col2Check<?php //echo($row->navigation_menu_id) ?>">Show in Nav</label> -->
                                            <label class="switch">
                                                <input type="checkbox" name="navigation_menu_is_active"  value="<?php echo $row->navigation_menu_id ?>" <?php echo isset($row->navigation_menu_is_active) && $row->navigation_menu_is_active == 1 ? 'checked=""' : "" ?>>
                                                <span class="slider round"></span>
                                            </label>
                                             <label>Show in Nav</label>
                                        </span>
                                    </div><!--end card body div-->
                                </div><!--end card div-->
                                <?php for($i = 0; sizeof($data) > $i; $i++): ?>
                                    <?php if($data[$i]->navigation_menu_parent_id == $row->navigation_menu_id): ?>
                                    <div class="card border m-3 siblings" id="nav-item-<?php echo($data[$i]->navigation_menu_id);?>">
                                        <button id="nav-delete-<?php echo($data[$i]->navigation_menu_id) ?>" class="delete-nav-item-btn" data-toggle="modal" data-target="#deleteitem-nav-modal"><i class="mdi mdi-close mdi-18px"></i></button>
                                        <div class="card-body">
                                            <button type="button" id="update-nav-item-<?php echo($data[$i]->navigation_menu_id) ?>"  class="btn btn-outline-<?php echo($nav_colors[$color_counter]);?> btn-navigation" title="Click to edit" data-id="<?php echo $data[$i]->navigation_menu_id  ?>"><?php echo isset($data[$i]->navigation_menu_modified_label) ? $data[$i]->navigation_menu_modified_label : $data[$i]->navigation_menu_default_label ?></button>
                                            <span class="custom-control custom-checkbox mt-2 pl-0">
                                                <!-- <input type="checkbox" class="custom-control-input" id="col2Check<?php //echo($data[$i]->navigation_menu_id) ?>" name="navigation_menu_is_active" value="<?php //echo $data[$i]->navigation_menu_id ?>" <?php //echo isset($data[$i]->navigation_menu_is_active) && $data[$i]->navigation_menu_is_active == 1 ? 'checked=""' : "" ?>> -->
                                                <label class="switch">
                                                    <input type="checkbox" name="navigation_menu_is_active"  value="<?php echo $data[$i]->navigation_menu_id ?>" <?php echo isset($data[$i]->navigation_menu_is_active) && $data[$i]->navigation_menu_is_active == 1 ? 'checked=""' : "" ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                                 <label>Show in Nav</label>
                                                <!-- <label class="custom-control-label" for="col2Check<?php //echo($data[$i]->navigation_menu_id) ?>">Show in Nav</label> -->
                                            </span>
                                        </div><!--end card body div-->
                                    </div><!--end card div-->
                                    <?php endif ?>
                                <?php endfor ?>
                            </div><!--end card block-->
                            <?php ($color_counter == 5 ? $color_counter = 0 : $color_counter++); ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endif ?>
    </div>
