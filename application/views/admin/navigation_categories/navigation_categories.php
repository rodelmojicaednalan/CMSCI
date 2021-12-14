<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active">Navigation Categories</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Navigation Categories</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
    </div> <!-- container -->
</div> <!-- content -->
<!--begin page content here-->
<div class="container">
  <div class="row">
    <div class="col-10">
      <p>
        Choose the Category and order in which your site's main navigation items appear.  You can view which column and the order number in which a specific link appears within the category in the table below. Select the Navigation item in the table below by checking the checkbox next its name, then click the Edit button to Edit your Navigation item's place in the website's main navigation list. To Delete a Navigation item click the checkbox next to the item's name, then click the Delete button. 
        </p>
      <p>
      To sort the view of the table below, click on the arrow next to the category column name. 
      </p>
      <p>
        Click the Add New to add a New Navigation category to your site's main navigation.
      </p>
      <!-- add new nav categories modal content -->
      <div id="add-nav-cat-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
               
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Edit Navigation Categories Modal -->
      <div id="edit-nav-cat-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">



              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->


          <div id="deleteitem-nav-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="light-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-s modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-dark">
                        <h4 class="modal-title" id="light-header-modalLabel">Confirmation to remove</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h5>Remove selected item/s?</h5>
                        <input type="hidden" id="delete-nav-id">
                    </div><!-- / .modal body-->
                    <div class="modal-footer">
                            <div class="form-group text-center">
                                <button id="close-confirmation-modal-btn" class="btn btn-lg btn-secondary mb-3" type="reset" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                                <button id="btn_nav_categories_delete" class="btn btn-lg btn-danger mb-3" type="reset">Delete</button>&nbsp;&nbsp;

                            </div>
                        </div><!--end modal footer-->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--End Modals begin Page Content-->
      <div class="row justify-content-end">
          <div class="button-list mb-2">
        <form action="">
            <div class="col-sm">
        <!-- Edit modal -->
        <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#edit-nav-cat-modal" id="edit-nav-cat-modal-btn">&nbsp;Edit&nbsp;</button><!--This edits a navigation category checked below-->
        <button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#deleteitem-nav-modal">Delete</button><!--this deletes a navigation category checked below-->
        <!-- Add New modal -->
        <!--this adds a New Navigation category-->
        <button type="button" class="btn btn-lg btn-primary" id="add_new_nav_categories">Add New</button>
      </div>
    </form></div>
  </div>
    <!--end button list-->

 

    <!--begin Nav Item table-->
    <!--work your PHP magic on this form-->
    <div class="table-responsive-sm">
        <table class="table table-centered mb-0 table-striped table-bordered" id="tbl_nav_Categories">
            <thead class="thead-light">
              <!--replace the data in this table with real member data-->
                <tr>
                  <!--MELVIN - THESE COLUMN HEADINGS SHOULD SORT THE DATA DEPENDING ON IF THE USER CLICKS THE DOWN OR THE UP ARROW. WHEN THEY CLICK THE DOWN ARROW THE DATA SORTS IN DESCENDING ORDER. THE ARROW SHOULD BE REPLACED WITH THE UP ARROW-->
                    <th scope="col">Name&nbsp;<a href="#"><i class="mdi mdi-arrow-down-drop-circle"></i><!--<i class="mdi mdi-arrow-up-drop-circle"></i>--> </a></th>
                    <th scope="col">Parent Navigation&nbsp;<a href="#"><i class="mdi mdi-arrow-down-drop-circle"></i><!--<i class="mdi mdi-arrow-up-drop-circle"></i>--> </a></th>
                    <th scope="col">Column&nbsp;<a href="#"><i class="mdi mdi-arrow-down-drop-circle"></i><!--<i class="mdi mdi-arrow-up-drop-circle"></i>--> </a></th>
                    <th scope="col">Order&nbsp;<a href="#"><i class="mdi mdi-arrow-down-drop-circle"></i><!--<i class="mdi mdi-arrow-up-drop-circle"></i>--> </a></th>
                    <th scope="col">Status&nbsp;<a href="#"><i class="mdi mdi-arrow-down-drop-circle"></i><!--<i class="mdi mdi-arrow-up-drop-circle"></i>--> </a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $row): ?>
                <?php 
                  $parent_nav = 'None';
                  if($row->nav_category_parent_navigation_id != 0) {
                    for($i = 0; $i < sizeof($data); $i++) {
                      if($row->nav_category_parent_navigation_id == $data[$i]->nav_category_id) {
                        $parent_nav = $data[$i]->nav_category_description;
                        break;
                      }
                    }
                  }?>
                <tr scope="row">
                    <td>
                      <span class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input nav-cat-checkbox nav_categories" name="nav_categories[]" id="custom-checkbox-<?php echo($row->nav_category_id);?>" data-id="<?php echo($row->nav_category_id);?>">
                          <label class="custom-control-label" for="custom-checkbox-<?php echo($row->nav_category_id); ?>"><?php echo($row->nav_category_description); ?></label>
                      </span>
                    </td>
                    <td><?php echo($parent_nav); ?></td>
                    <td><?php echo($row->nav_category_column); ?></td>
                    <td><?php echo($row->nav_category_order); ?></td>
                    <td><?php echo($row->nav_category_status == 0 ? 'Inactive' : 'Active'); ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table> 
      
    </div> <!-- end table-responsive-->
  
</div><!--end col-->
  </div><!--end row-->
</div><!--end container-->
<!--end page content-->