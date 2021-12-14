<div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#">Manage Events</a></li>
                                            <li class="breadcrumb-item active">Events</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Events</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                <!-- content -->
                <!--begin page content here-->
                  <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <a href="/admin/add_event_content"  class="btn btn-lg font-16 btn-outline-primary btn-block  ">
                                            <i class="mdi mdi-plus-circle-outline"></i> Add New Event
                                        </a>
                                        <a href="/admin/events_manage" class="btn btn-lg font-16 btn-outline-success btn-block  ">
                                            <i class="mdi mdi-plus-circle-outline"></i> Events List View
                                        </a>
                                        <a href="/admin/event_categories" title="Manage Event Categories" class="btn btn-lg font-16 btn-outline-info btn-block ">
                                            <i class="mdi mdi-plus-circle-outline"></i> Manage Event Categories
                                        </a>
                                        <div class="mt-4 d-none d-xl-block">
                                        <div id="accordion" class="custom-accordion mb-3">

                                            <div class="card mb-0">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="m-0">
                                                        <a class="text-dark d-block pt-2 pb-2" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            How to Add and Manage Events <span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <ul class="pl-3">
                                                            <li class="text-muted mb-3">
                                                                To add an Event, click the Add Event button and follow the wizard. The added event will create a new Event page which you can manage in the <a href="/admin/events" title="Manage Events">Manage Events section</a>  of the Admin interface. You can add images and more details through the Events page. When you add an event, it will create an event page on your website. The event page needs to be linked to your site navigation by going to the <a href="/admin" title="Site Build / Navigation">Navigation page</a>.
                                                            </li>
                                                            <li class="text-muted mb-3">
                                                                To Manage or Add an Event category, click the Manage Event Category button.
                                                            </li>
                                                            <li class="text-muted mb-3">
                                                                To Manage your Events, click the <a href="/admin/events_manage" title="Manage Events">Manage Events</a>  button. You can also drag your created events in the calendar to change the date or you can delete the event or change the event name here in the calendar.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> <!-- end card-->
                                        </div> <!-- end custom accordions-->
                                      </div>
                                        <div id="external-events" class="m-t-20">
                                            <br><!--This is dynamic information the Event categories should appear below with the proper colors-->
                                            <!--no longer drag and drop-->
                                            <p class="text-muted">Event Category Legend</p>


                                            <?php foreach ($event_CategoryObj as $cats) { ?>
                                                  <div class="external-event <?=$cats->color?>" data-class="<?=$cats->color?>">
                                                      <i class="mdi mr-2 vertical-middle"></i><?=$cats->name?>
                                                  </div>
                                            <?php } ?>
                                        </div>

                                        <!-- checkbox
                                        <div class="custom-control custom-checkbox mt-3">
                                            <input type="checkbox" class="custom-control-input" id="drop-remove">
                                            <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                        </div> -->

                                    </div> <!-- end col-->

                                    <div class="col-lg-9">
                                        <div id="calendar"></div>
                                    </div> <!-- end col -->

                                </div>  <!-- end row -->
                            </div> <!-- end card body-->
                        </div> <!-- end card -->

                    </div>
                    <!-- end col-12 -->
                </div> <!-- end row -->
                </div><!--end container-->
