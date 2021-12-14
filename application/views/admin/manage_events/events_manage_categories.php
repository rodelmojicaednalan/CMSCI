                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/events_manage">Manage Events</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/events">Events</a></li>
                                            <li class="breadcrumb-item active">Manage Event Categories</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Event Categories</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                    </div> <!-- container -->
                </div> <!-- content -->
                <!--begin page content here-->
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h3 class="header-title">
                            Manage Event Categories
                          </h3>
                            <p>Use this page to manage your Event Categories. If you'd like to Add a New Event Category, or edit an existing Event Category, you can use the table below.</p>
                            <p>To edit an existing Event Category from the table below, click the Pencil icon next to the Event Category Name <i class="mdi mdi-pencil mdi-24px"></i>. To Delete the Event, click the trashcan icon next to the event name <i class="mdi mdi-delete mdi-24px"></i>. To add a New Event Category, click the Add New Category button.</p>
                          <p class="text-muted">This page works best on a desktop or laptop computer.</p>
                        </div><!--end card body-->
                      </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
                  <div id="delete-event-alert" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-alert-modalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content modal-filled bg-danger">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="fill-danger-modalLabel">Are you Certain?</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                  <p>This will delete this Event Category from your site. Are you sure you want to do this?</p>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                  <button type="button" id="cfrm-delecategory" class="btn btn-outline-light">Delete Event(s)</button>
                              </div>
                          </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  <!-- Delete Alert Modal -->
                  <!-- Modal Add Category -->
                  <div class="modal fade" id="add-category" tabindex="-1">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header border-bottom-0 d-block">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Add Event Category</h4>
                              </div>
                              <div class="modal-body p-4">
                                  <!-- <form> -->
                                  <?php echo form_open('#', array('id' => 'frm_event_category')); ?>
                                      <div class="form-group">
                                          <label class="control-label">Category Name</label>
                                          <input class="form-control form-white" placeholder="Enter name" type="text" id="event_category_name" name="category_name"/>
                                          <p class="text-danger d-none" id="err-category-name">* Please input category name</p>
                                      </div>
                                      <div class="form-group">

                                              <label class="control-label">Choose a Category Color</label>
                                          <div class="p-3 mb-2 bg-primary text-white"> &nbsp;
                                          <input class="form-check-input" type="radio" name="category_color" id="colorRadios1" value="bg-primary" required><label class="form-check-label pl-1" for="colorRadios1">
                                              Primary
                                            </label></div>
                                          <div class="p-3 mb-2 bg-success text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="category_color" id="colorRadios2" value="bg-success"><label class="form-check-label pl-1" for="colorRadios2">
                                                  Success
                                                </label></div>
                                          <div class="p-3 mb-2 bg-danger text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="category_color" id="colorRadios3" value="bg-danger"><label class="form-check-label pl-1" for="colorRadios3">
                                                  Danger
                                                </label></div>
                                          <div class="p-3 mb-2 bg-warning text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="category_color" id="colorRadios4" value="bg-warning"><label class="form-check-label pl-1" for="colorRadios4">
                                                  Warning
                                                </label></div>
                                          <div class="p-3 mb-2 bg-info text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="category_color" id="colorRadios5" value="bg-info"><label class="form-check-label pl-1" for="colorRadios5">
                                                  Info
                                                </label></div>
                                          <div class="p-3 mb-2 bg-dark text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="category_color" id="colorRadios6" value="bg-dark"><label class="form-check-label pl-1" for="colorRadios6">
                                                  Dark
                                                </label></div>
                                                <p class="text-danger d-none" id="err-category">* Please Select Category Color</p>
                                      </div>
                                    <?php echo form_close(); ?>
                                  <!-- </form> -->
                                  <div class="text-right">
                                      <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary ml-1"  id="save-event-category" >Save</button>
                                  </div>

                              </div> <!-- end modal-body-->
                          </div> <!-- end modal-content-->
                      </div> <!-- end modal dialog-->
                  </div>
                  <!-- end modal-->
                   <!-- Modal Edit Category -->
                   <div class="modal fade" id="edit-event-category" tabindex="-1">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header border-bottom-0 d-block">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Edit an Event Category</h4>
                              </div>
                              <div class="modal-body p-4">
                                  <!-- <form> -->
                                  <?php echo form_open('#', array('id' => 'frm-edit-event')); ?>
                                      <div class="form-group">
                                          <label class="control-label">Category Name</label><!--This should be dynamic - existing category name appears here-->
                                          <input class="form-control form-white" id="edit_category_name" placeholder="Category Name Here" type="text" name="edit_category_name"/>
                                          <p class="text-danger d-none" id="err-edit-category-name">* Please input category name</p>
                                      </div>
                                      <div class="form-group">
                                          <!--existing category color should be dyn amically chosen below-->
                                              <label class="control-label">Category Color</label>
                                          <div class="p-3 mb-2 bg-primary text-white"> &nbsp;
                                          <input class="form-check-input" type="radio" name="edit_category_color" id="edit_category_color"  value="bg-primary"><label class="form-check-label pl-1" for="colorRadios1">
                                              Primary
                                            </label></div>
                                          <div class="p-3 mb-2 bg-success text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="edit_category_color" id="edit_category_color" value="bg-success"><label class="form-check-label pl-1" for="colorRadios2">
                                                  Success
                                                </label></div>
                                          <div class="p-3 mb-2 bg-danger text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="edit_category_color" id="edit_category_color" value="bg-danger"><label class="form-check-label pl-1" for="colorRadios3">
                                                  Danger
                                                </label></div>
                                          <div class="p-3 mb-2 bg-warning text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="edit_category_color" id="edit_category_color" value="bg-warning"><label class="form-check-label pl-1" for="colorRadios4">
                                                  Warning
                                                </label></div>
                                          <div class="p-3 mb-2 bg-info text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="edit_category_color" id="edit_category_color" value="bg-info"><label class="form-check-label pl-1" for="colorRadios5">
                                                  Info
                                                </label></div>
                                          <div class="p-3 mb-2 bg-dark text-white">&nbsp;
                                              <input class="form-check-input" type="radio" name="edit_category_color" id="edit_category_color" value="bg-dark"><label class="form-check-label pl-1" for="colorRadios6">
                                                  Dark
                                                </label></div>
                                                <p class="text-danger d-none" id="err-edit-category">* Please Select Category Color</p>
                                      </div>
                                                <input type="hidden" name="event_category_id" id="event_category_id">
                                    <?php echo form_close(); ?>
                                  <!-- </form> -->
                                  <div class="text-right">
                                      <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary ml-1"  id="save-edit-category" >Save</button>
                                  </div>
                              </div> <!-- end modal-body-->
                          </div> <!-- end modal-content-->
                      </div> <!-- end modal dialog-->
                  </div>
                  <!-- end modal-->
                  <!--begin buttons-->
                  <div class="row justify-content">
                      <div class="col-md-3">
                          <a href="#" data-toggle="modal" data-target="#add-category" class="btn font-14 btn-outline-info btn-block  ">
                              <i class="mdi mdi-plus-circle-outline"></i> Add Category
                          </a>
                        </div>
                      <div class="col-md-3">
                          <a href="/admin/add_event_content" class="btn font-14 btn-outline-primary btn-block">
                              <i class="mdi mdi-plus-circle-outline"></i> Add New Event
                          </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/events" class="btn font-14 btn-outline-success btn-block">
                                <i class="mdi mdi-calendar"></i> Event Calendar
                            </a>
                          </div>
                            <div class="col-md-3">
                                <a href="/admin/events_manage" class="btn font-14 btn-outline-success btn-block">
                                    <i class="mdi mdi-calendar"></i> Manage Events
                                </a>
                              </div>
                     <!--end col-->
                    </div><!--end row-->
                       <!--begin Events Table-->
                       <!--This is supposed to be a datatable with the datatable JS working on it. -->
                  <div class="row mt-3">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="header-title mb-4">Event Categories&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the catgories. You can search event catgories by using the search box, and you choose how many catgories to see on this page. To manage your events on a calendar click the Events Calendar link above."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                                  <?php if($this->session->flashdata('success_event_category')): ?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success_event_category') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                  <?php endif; ?>
                                  <table id="event_category_table" class="table dt-responsive nowrap" width="100%">
                                      <thead>
                                          <tr>
                                              <th>Category</th>
                                              <th>Action</th>
                                              <th># of Events</th>
                                              <th>Color</th>

                                          </tr>
                                      </thead>
                                      <!--this table has Dynamically populated information based on current events-->
                                      <tbody>
                                        <?php foreach ($event_CategoryObj as $event_category) : ?>
                                          <tr>
                                              <td><h5><?= $event_category->name ?></h5>
                                              </td>
                                              <td>
                                                <!--Dynamic to go to the Edit Modal for this Event-->
                                                  <a href="#"  id="event-category" data-color="<?= $event_category->color ?>" data-name = "<?= $event_category->name ?>" data-id="<?= $event_category->id ?>" title="Edit"><i class="mdi mdi-pencil mdi-24px"></i></a>
                                                <!--Dynamic to go to the Delete Modal for this Event-->
                                                  <a href="#"  id="delete-category-event" data-id="<?= $event_category->id ?>"> <i class="mdi mdi-delete mdi-24px"></i></a>
                                              </td>
                                              <td>0</td>
                                              <td><span class="p-2 m-1 <?= $event_category->color ?>">&nbsp;</span></td>
                                          </tr>
                                        <?php endforeach; ?>
                                      </tbody>
                                  </table>
                              </div> <!-- end card body-->
                          </div> <!-- end card -->
                      </div><!-- end col-->
                  </div>
                  <!-- end row-->

                </div><!--end container-->
                <!--end page content-->
