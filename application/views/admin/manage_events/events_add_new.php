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
                            <li class="breadcrumb-item"><a href="/admin/events">Manage Events</a></li>
                            <li class="breadcrumb-item active"><?php echo (isset($editView) ? 'Edit Event' : 'Add a New Event') ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo (isset($editView) ? 'Edit Event' : 'Add a New Event') ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div> <!-- container -->
</div> <!-- content -->
<!--begin page content here-->
<div class="container-fluid">
    <?php
        if(isset($editView)) {
            echo '<div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div id="accordion" class="custom-accordion mb-4">
                          <div class="card mb-0">
                              <div class="card-header" id="headingOne">
                                  <h5 class="m-0">
                                      <a class="text-dark d-block pt-2 pb-2" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                      How to Edit an Event (Click to Open)<span class="float-right text-primary"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                                      </a>
                                  </h5>
                              </div>
                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body">
                                          <p>
                                                  You can use the wizard on this page to Edit Your Event page. The form fields with an asterisk <span class="text-danger">*</span> by them are ones that you should fill in to make your page look presentable. You can choose a page template in step 2. To PREVIEW your page, hit the SAVE DRAFT button, then the PREVIEW button. To save your work and publish your Events page to your website, hit the SAVE button.</p>

                                                  <p>The Events page templates are divided up into sections. This description is crucial for good page SEO. You can follow this up with a longer description and some photos.</p>
                                                  <p>You can add your events page to your website navigation in the Site Build / <a href="/admin/navigation" title="Navigation">Navigation </a> section. Simply, push the + sign in the column where you want your navigation to appear and fill out the form. To edit your Event page, navigate to the <a href="events-manage.html" title="Manage Events">Manage Events</a> page.</p>

                                                 <p>To ensure that your page loads quickly and gets good SEO, use images that have been compressed for the web. Squoosh is a free resource for image compression and is recommended by Google. You can access it here - <a href="https://squoosh.app" title="Squoosh" target="_blank">https://squoosh.app/</a>.
                                                </p>
                                                <p>Here is a list of Images you can upload with the image sizes in pixels.</p>
                                                <dl class="row">
                                                      <dt class="col-sm-3">1 Main Event Image</dt>
                                                      <dd class="col-sm-9">1920px x 1280px</dd>
                                                      <dt class="col-sm-3">Event Images</dt>
                                                      <dd class="col-sm-9">
                                                        1440px x 967px
                                                      </dd>
                                                    </dl>
                                                <p>Roll over the question mark in a circle for instructions on how to use a feature. <span class="text-muted">This page works best on laptop or desktop computers.</span> <!-- More information and instructions can be found in the Knowledgebase.--></p>
                                              </div><!--end card body div-->
                                  </div>
                              </div>
                          </div> <!-- end card-->
                      </div> <!-- end custom accordions-->
                  </div><!--end card body div-->
              </div><!--end card-->
      </div><!--end col-->';
        } else {
            echo '<div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <div id="accordion" class="custom-accordion mb-4">
                        <div class="card mb-0">
                            <div class="card-header" id="headingOne">
                                <h5 class="m-0">
                                    <a class="text-dark d-block pt-2 pb-2" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    How to Add a New Event (Click to Open)<span class="float-right text-primary"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                        <p>
                                                You can use the wizard on this page to add a new Event page to your website. The form fields with an asterisk <span class="text-danger">*</span> by them are ones that you should fill in to make your page look presentable. You can choose a page template in step 2. To PREVIEW your page, hit the SAVE DRAFT button, then the PREVIEW button. To save your work and publish your Events page to your website, hit the SAVE button.</p>

                                                <p>The Events page templates are divided up into sections. This description is crucial for good page SEO. You can follow this up with a longer description and some photos.</p>
                                                <p>You can add your events page to your website navigation in the Site Build / <a href="site-build-nav.html" title="Navigation">Navigation </a> section. Simply, push the + sign in the column where you want your navigation to appear and fill out the form. To edit your Event page, navigate to the <a href="events-manage.html" title="Manage Events">Manage Events</a> page.</p>

                                                <p>To ensure that your page loads quickly and gets good SEO, use images that have been compressed for the web. Squoosh is a free resource for image compression and is recommended by Google. You can access it here - <a href="https://squoosh.app" title="Squoosh" target="_blank">https://squoosh.app/</a>.
                                                </p>
                                                <p>Here is a list of Images you can upload with the image sizes in pixels.</p>
                                                <dl class="row">
                                                    <dt class="col-sm-3">1 Main Event Image</dt>
                                                    <dd class="col-sm-9">1920px x 1280px</dd>
                                                    <dt class="col-sm-3">Event Images</dt>
                                                    <dd class="col-sm-9">
                                                        1440px x 967px
                                                    </dd>
                                                    </dl>
                                                <p>Roll over the question mark in a circle for instructions on how to use a feature. <span class="text-muted">This page works best on laptop or desktop computers.</span> <!-- More information and instructions can be found in the Knowledgebase.--></p>
                                            </div><!--end card body div-->
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end custom accordions-->
                </div><!--end card body div-->
            </div><!--end card-->
        </div><!--end col-->';
        }
    ?>

        <!--begin buttons-->
    <div class="row justify-content mb-3">
        <div class="col-md-4">
                <a href="/admin/events_manage" class="btn font-14 btn-outline-primary btn-block">
                    <i class="mdi mdi-plus-circle-outline"></i> Manage Events
                </a>
                </div>
                <div class="col-md-4">
                    <a href="/admin/events" class="btn font-14 btn-outline-success btn-block">
                        <i class="mdi mdi-calendar"></i> Event Calendar
                    </a>
    </div>
    <div class="col-md-4">
        <a href="/admin/event_categories" class="btn btn-lg font-14 btn-outline-info btn-block  ">
            <i class="mdi mdi mdi-calendar"></i> Manage Event Categories
        </a>
        </div>
    <!--end col-->
</div><!--end row-->
        <!-- Event Email Preview Modal -->
        <!--This will need to be filled with dynamic data-->
        <div id="email-preview" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="email-previewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-info">
                        <h4 class="modal-title" id="email-previewModalLabel">Event Email Preview</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <hr />
                        <?php
                            $event_obj = isset($events[0]->event_id) ? $events[0] : false;
                            print $this->load->view('admin/manage_events/email_preview', array('event'=>$event_obj), true)
                        ?>
                        <hr />
                        <!--
                        <h5 class="mt-0">You are Invited to our Fantastic Event</h5>
                        <p>Hello, support@boomity.com has invited you to an event.</p>
                        <p>Please reply to this email with your R.S.V.P.</p>
                        <dl class="row">
                            <dt class="col-sm-3">Event Title:</dt>
                            <dd class="col-sm-9" id="preview-event-title"></dd>
                            <dt class="col-sm-3">Start Date/Time:</dt>
                            <dd class="col-sm-9" id="preview-event-start"></dd>
                            <dt class="col-sm-3">End Date/Time:</dt>
                            <dd class="col-sm-9" id="preview-event-end"></dd>
                            <dt class="col-sm-3">Organization:</dt>
                            <dd class="col-sm-9" id="preview-event-org"></dd>
                            <dt class="col-sm-3">Location:</dt>
                            <dd class="col-sm-9" id="preview-event-location"></dd>
                            <dt class="col-sm-3">Event Address:</dt>
                            <dd class="col-sm-9" id="preview-event-address"></dd>
                        </dl>
                        -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div><!--end row-->

    <form method="POST" id="formAddEvent" enctype="multipart/form-data" ><!--Dynamic Form-->
    <div class="row">
    <div class="col-12">
            <div class="card">
                    <div class="card-body">
                        <h2 class="header-title mb-3">Add a New Event Wizard</h2>
                        <div id="btnwizard">
                            <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
                                <li class="nav-item">
                                    <a href="#tab1" id="1tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span class="d-none d-sm-inline">Create Event</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#tab2" id="2tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 <?php echo (!isset($editView) ? "disabled" : '') ?>">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span class="d-none d-sm-inline">Create a Web Page</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#tab3" id="3tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 <?php echo (!isset($editView) ? "disabled" : '') ?>">
                                        <i class="mdi mdi-face-profile mr-1"></i>
                                        <span class="d-none d-sm-inline">Create Email Invite</span>
                                    </a>
                                </li>
                                <!--
                                <li class="nav-item">
                                        <a href="#tab4" id="4tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 <?php echo (!isset($editView) ? "disabled" : '') ?>">
                                            <i class="mdi mdi-approval mr-1"></i>
                                            <span class="d-none d-sm-inline">Step 4. Finish</span>
                                        </a>
                                    </li>
                                -->
                            </ul>

                            <div class="tab-content mb-0 b-0">
                                    <!-- <div id="bar" class="progress mb-3" style="height: 7px;">
                                            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                        </div>-->

                                    <div class="tab-pane" id="tab1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="col-form-label" for="event-title">Event Title<span class="text-danger"> *</span></label>
                                                            <input type="text" class="form-control" id="event-title" name="event_title" value="<?php echo (isset($editView) ? $events[0]->event_title : '') ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-form-label" for="event-host">Event Host/Organization</label>
                                                            <input type="text" id="event-host" name="event_host" class="form-control" placeholder="Optional" value=<?php echo (isset($editView) ? $events[0]->event_host : '') ?> >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="col-form-label" for="event-category">Event Category<span class="text-danger"> *</span></label>
                                                            <select class="form-control" name="event_categories_id" id="example-select">
                                                                <option value="0">Select Category</option>
                                                                <?php foreach($events_category as $key => $row): ?>
                                                                    <option value="<?php echo $row->id ?>" <?php echo (isset($editView) && $events[0]->event_categories_id == $row->id ? "selected=''" : '' ) ?>><?php echo $row->name ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                                    <label class="col-form-label" for="event-location">Event Venue</label>
                                                                    <input type="text" id="event-location" name="event_location" class="form-control" placeholder="Optional" value="<?php echo (isset($editView) ? $events[0]->event_location : '') ?>">
                                                                </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-6 mt-1">
                                                            <label for="example-select">Event Type&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the Event Type from the list below. This will help your event page's SEO."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                                <select class="form-control" name="event_type" id="example-select">
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "BusinessEvent" ? "selected=''" : '') ?> value="BusinessEvent">Business Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "ChildrensEvent" ? "selected=''" : '') ?> value="ChildrensEvent">Childrens Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "ComedyEvent" ? "selected=''" : '') ?> value="ComedyEvent">Comedy Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "CourseInstance" ? "selected=''" : '') ?> value="CourseInstance">Course Instance</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "PerformanceEvent" ? "selected=''" : '') ?> value="PerformanceEvent">Performance Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "DeliveryEvent" ? "selected=''" : '') ?> value="DeliveryEvent">Delivery Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "EducationEvent" ? "selected=''" : '') ?> value="EducationEvent">Education Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "ExhibitionEvent" ? "selected=''" : '') ?> value="ExhibitionEvent">Exhibition Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "Festival" ? "selected=''" : '') ?> value="Festival">Festival</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "FoodEvent" ? "selected=''" : '') ?> value="FoodEvent">Food Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "LiteraryEvent" ? "selected=''" : '') ?> value="LiteraryEvent">Literary Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "MusicEvent" ? "selected=''" : '') ?> value="MusicEvent">Music Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "PublicationEvent" ? "selected=''" : '') ?> value="PublicationEvent">Publication Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "SaleEvent" ? "selected=''" : '') ?> value="SaleEvent">Sale Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "ScreeningEvent" ? "selected=''" : '') ?> value="ScreeningEvent">Screening Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "SocialEvent" ? "selected=''" : '') ?> value="SocialEvent">Social Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "SportsEvent" ? "selected=''" : '') ?> value="SportsEvent">Sports Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "TheaterEvent" ? "selected=''" : '') ?> value="TheaterEvent">Theater Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "VisualArtsEvent" ? "selected=''" : '') ?> value="VisualArtsEvent">Visual Arts Event</option>
                                                                    <option <?php echo (isset($editView) && $events[0]->event_type == "EventSeries" ? "selected=''" : '') ?> value="EventSeries">Event Series</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="col-form-label" for="event-address">Event Venue Address<span class="text-danger">*</span></label>
                                                            <input type="text" id="event-address" name="event_address" class="form-control" value="<?php echo (isset($editView) ? $events[0]->event_address : '') ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="daterangetime" class="col-form-label">Event Start Date &amp; Time<span class="text-danger">*</span></label>
                                                            <!--Please fix this so that the ID is correct for the Event Start-->
                                                            <input type="text" name="event_start_time" class="form-control datetimepicker" autocomplete="off" onkeydown="return false" id="datetimepicker" value="<?php echo (isset($editView) && $events[0]->event_start_time != "0000-00-00 00:00:00" ? $events[0]->event_start_time : '') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-2">
                                                        <label class="col-form-label" for="event-city">Event City<span class="text-danger">*</span></label>
                                                        <input type="text" id="event-city" name="event_city" class="form-control" placeholder="City" value="<?php echo (isset($editView) ? $events[0]->event_city : '') ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-form-label" for="event-description">Event State </label>
                                                        <select class="form-control" name="event_state" id="state" value="<?php echo (isset($editView) ? $events[0]->event_state : '') ?>">
                                                            <option value="" selected="selected">Choose a State</option>
                                                            <option value="AL" <?php echo (isset($editView) && $events[0]->event_state == "AL" ? "selected=''" : '') ?>>Alabama</option>
                                                            <option value="AK" <?php echo (isset($editView) && $events[0]->event_state == "AK" ? "selected=''" : '') ?>>Alaska</option>
                                                            <option value="AZ" <?php echo (isset($editView) && $events[0]->event_state == "AZ" ? "selected=''" : '') ?>>Arizona</option>
                                                            <option value="AR" <?php echo (isset($editView) && $events[0]->event_state == "AR" ? "selected=''" : '') ?>>Arkansas</option>
                                                            <option value="CA" <?php echo (isset($editView) && $events[0]->event_state == "CA" ? "selected=''" : '') ?>>California</option>
                                                            <option value="CO" <?php echo (isset($editView) && $events[0]->event_state == "CO" ? "selected=''" : '') ?>>Colorado</option>
                                                            <option value="CT" <?php echo (isset($editView) && $events[0]->event_state == "CT" ? "selected=''" : '') ?>>Connecticut</option>
                                                            <option value="DE" <?php echo (isset($editView) && $events[0]->event_state == "DE" ? "selected=''" : '') ?>>Delaware</option>
                                                            <option value="DC" <?php echo (isset($editView) && $events[0]->event_state == "DC" ? "selected=''" : '') ?>>District Of Columbia</option>
                                                            <option value="FL" <?php echo (isset($editView) && $events[0]->event_state == "FL" ? "selected=''" : '') ?>>Florida</option>
                                                            <option value="GA" <?php echo (isset($editView) && $events[0]->event_state == "GA" ? "selected=''" : '') ?>>Georgia</option>
                                                            <option value="HI" <?php echo (isset($editView) && $events[0]->event_state == "HI" ? "selected=''" : '') ?>>Hawaii</option>
                                                            <option value="ID" <?php echo (isset($editView) && $events[0]->event_state == "ID" ? "selected=''" : '') ?>>Idaho</option>
                                                            <option value="IL" <?php echo (isset($editView) && $events[0]->event_state == "IL" ? "selected=''" : '') ?>>Illinois</option>
                                                            <option value="IN" <?php echo (isset($editView) && $events[0]->event_state == "IN" ? "selected=''" : '') ?>>Indiana</option>
                                                            <option value="IA" <?php echo (isset($editView) && $events[0]->event_state == "IA" ? "selected=''" : '') ?>>Iowa</option>
                                                            <option value="KS" <?php echo (isset($editView) && $events[0]->event_state == "KS" ? "selected=''" : '') ?>>Kansas</option>
                                                            <option value="KY" <?php echo (isset($editView) && $events[0]->event_state == "KY" ? "selected=''" : '') ?>>Kentucky</option>
                                                            <option value="LA" <?php echo (isset($editView) && $events[0]->event_state == "LA" ? "selected=''" : '') ?>>Louisiana</option>
                                                            <option value="ME" <?php echo (isset($editView) && $events[0]->event_state == "ME" ? "selected=''" : '') ?>>Maine</option>
                                                            <option value="MD" <?php echo (isset($editView) && $events[0]->event_state == "MD" ? "selected=''" : '') ?>>Maryland</option>
                                                            <option value="MA" <?php echo (isset($editView) && $events[0]->event_state == "MA" ? "selected=''" : '') ?>>Massachusetts</option>
                                                            <option value="MI" <?php echo (isset($editView) && $events[0]->event_state == "MI" ? "selected=''" : '') ?>>Michigan</option>
                                                            <option value="MN" <?php echo (isset($editView) && $events[0]->event_state == "MN" ? "selected=''" : '') ?>>Minnesota</option>
                                                            <option value="MS" <?php echo (isset($editView) && $events[0]->event_state == "MS" ? "selected=''" : '') ?>>Mississippi</option>
                                                            <option value="MO" <?php echo (isset($editView) && $events[0]->event_state == "MO" ? "selected=''" : '') ?>>Missouri</option>
                                                            <option value="MT" <?php echo (isset($editView) && $events[0]->event_state == "MT" ? "selected=''" : '') ?>>Montana</option>
                                                            <option value="NE" <?php echo (isset($editView) && $events[0]->event_state == "NE" ? "selected=''" : '') ?>>Nebraska</option>
                                                            <option value="NV" <?php echo (isset($editView) && $events[0]->event_state == "NV" ? "selected=''" : '') ?>>Nevada</option>
                                                            <option value="NH" <?php echo (isset($editView) && $events[0]->event_state == "NH" ? "selected=''" : '') ?>>New Hampshire</option>
                                                            <option value="NJ" <?php echo (isset($editView) && $events[0]->event_state == "NJ" ? "selected=''" : '') ?>>New Jersey</option>
                                                            <option value="NM" <?php echo (isset($editView) && $events[0]->event_state == "NM" ? "selected=''" : '') ?>>New Mexico</option>
                                                            <option value="NY" <?php echo (isset($editView) && $events[0]->event_state == "NY" ? "selected=''" : '') ?>>New York</option>
                                                            <option value="NC" <?php echo (isset($editView) && $events[0]->event_state == "NC" ? "selected=''" : '') ?>>North Carolina</option>
                                                            <option value="ND" <?php echo (isset($editView) && $events[0]->event_state == "ND" ? "selected=''" : '') ?>>North Dakota</option>
                                                            <option value="OH" <?php echo (isset($editView) && $events[0]->event_state == "OH" ? "selected=''" : '') ?>>Ohio</option>
                                                            <option value="OK" <?php echo (isset($editView) && $events[0]->event_state == "OK" ? "selected=''" : '') ?>>Oklahoma</option>
                                                            <option value="OR" <?php echo (isset($editView) && $events[0]->event_state == "OR" ? "selected=''" : '') ?>>Oregon</option>
                                                            <option value="PA" <?php echo (isset($editView) && $events[0]->event_state == "PA" ? "selected=''" : '') ?>>Pennsylvania</option>
                                                            <option value="RI" <?php echo (isset($editView) && $events[0]->event_state == "RI" ? "selected=''" : '') ?>>Rhode Island</option>
                                                            <option value="SC" <?php echo (isset($editView) && $events[0]->event_state == "SC" ? "selected=''" : '') ?>>South Carolina</option>
                                                            <option value="SD" <?php echo (isset($editView) && $events[0]->event_state == "SD" ? "selected=''" : '') ?>>South Dakota</option>
                                                            <option value="TN" <?php echo (isset($editView) && $events[0]->event_state == "TN" ? "selected=''" : '') ?>>Tennessee</option>
                                                            <option value="TX" <?php echo (isset($editView) && $events[0]->event_state == "TX" ? "selected=''" : '') ?>>Texas</option>
                                                            <option value="UT" <?php echo (isset($editView) && $events[0]->event_state == "UT" ? "selected=''" : '') ?>>Utah</option>
                                                            <option value="VT" <?php echo (isset($editView) && $events[0]->event_state == "VT" ? "selected=''" : '') ?>>Vermont</option>
                                                            <option value="VA" <?php echo (isset($editView) && $events[0]->event_state == "VA" ? "selected=''" : '') ?>>Virginia</option>
                                                            <option value="WA" <?php echo (isset($editView) && $events[0]->event_state == "WA" ? "selected=''" : '') ?>>Washington</option>
                                                            <option value="WV" <?php echo (isset($editView) && $events[0]->event_state == "WV" ? "selected=''" : '') ?>>West Virginia</option>
                                                            <option value="WI" <?php echo (isset($editView) && $events[0]->event_state == "WI" ? "selected=''" : '') ?>>Wisconsin</option>
                                                            <option value="WY" <?php echo (isset($editView) && $events[0]->event_state == "WY" ? "selected=''" : '') ?>>Wyoming</option>
                                                        </select>
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label for="event-zip" class="col-form-label">ZIP Code</label>
                                                        <input type="text" id="event-zip" name="event_zip" class="form-control" data-toggle="input-mask" data-mask-format="00000" value="<?php echo (isset($editView) ? $events[0]->event_zip : '') ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="daterangetime2" class="col-form-label">Event End Date &amp; Time</label>
                                                            <!--Please fix this so that the ID is correct for the Event End-->
                                                            <!-- <input type="datetime-local" name="event_end_time" class="form-control date" id="daterangetime2"> -->
                                                            <input type="text" name="event_end_time" class="form-control datetimepicker" autocomplete="off" onkeydown="return false" id="datetimepicker" value="<?php echo (isset($editView) &&  $events[0]->event_end_time != "0000-00-00 00:00:00"  ? $events[0]->event_end_time : '') ?>">
                                                        </div>
                                                    </div><!--end row-->
                                                    <div class="form-group row mb-">
                                                    <div class="col-md-3">
                                                            <label for="phone-input">Event Location Phone #&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the phone number for users to call to obtain more information about this location."></i></a></label>
                                                            <!--PHP HERE--> <input type="text" name="event_location_phone" id="buttonURL-input" class="form-control" placeholder="(415) 555-1212" value="<?php echo (isset($editView) ? $events[0]->event_location_phone : '') ?>">
                                                    </div>
                                                    <div class="col-md-3">
                                                            <label for="country-input">Event Location Country&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the Event Location Country."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                            <select class="form-control" name="event_country" id="country">
                                                                    <option value="">Pick your country</option>
                                                                    <option value="US" <?php echo (isset($editView) && $events[0]->event_country == "US" ? "selected=''" : '') ?>>United States</option>
                                                                    <option value="AF" <?php echo (isset($editView) && $events[0]->event_country == "AF" ? "selected=''" : '') ?>>Afghanistan</option>
                                                                    <option value="AX" <?php echo (isset($editView) && $events[0]->event_country == "AX" ? "selected=''" : '') ?>>Åland Islands</option>
                                                                    <option value="AL" <?php echo (isset($editView) && $events[0]->event_country == "AL" ? "selected=''" : '') ?>>Albania</option>
                                                                    <option value="DZ" <?php echo (isset($editView) && $events[0]->event_country == "DZ" ? "selected=''" : '') ?>>Algeria</option>
                                                                    <option value="AS" <?php echo (isset($editView) && $events[0]->event_country == "AS" ? "selected=''" : '') ?>>American Samoa</option>
                                                                    <option value="AD" <?php echo (isset($editView) && $events[0]->event_country == "AD" ? "selected=''" : '') ?>>Andorra</option>
                                                                    <option value="AO" <?php echo (isset($editView) && $events[0]->event_country == "AO" ? "selected=''" : '') ?>>Angola</option>
                                                                    <option value="AI" <?php echo (isset($editView) && $events[0]->event_country == "AI" ? "selected=''" : '') ?>>Anguilla</option>
                                                                    <option value="AQ" <?php echo (isset($editView) && $events[0]->event_country == "AQ" ? "selected=''" : '') ?>>Antarctica</option>
                                                                    <option value="AG" <?php echo (isset($editView) && $events[0]->event_country == "AG" ? "selected=''" : '') ?>>Antigua and Barbuda</option>
                                                                    <option value="AR" <?php echo (isset($editView) && $events[0]->event_country == "AR" ? "selected=''" : '') ?>>Argentina</option>
                                                                    <option value="AM" <?php echo (isset($editView) && $events[0]->event_country == "AM" ? "selected=''" : '') ?>>Armenia</option>
                                                                    <option value="AW" <?php echo (isset($editView) && $events[0]->event_country == "AW" ? "selected=''" : '') ?>>Aruba</option>
                                                                    <option value="AU" <?php echo (isset($editView) && $events[0]->event_country == "AU" ? "selected=''" : '') ?>>Australia</option>
                                                                    <option value="AT" <?php echo (isset($editView) && $events[0]->event_country == "AT" ? "selected=''" : '') ?>>Austria</option>
                                                                    <option value="AZ" <?php echo (isset($editView) && $events[0]->event_country == "AZ" ? "selected=''" : '') ?>>Azerbaijan</option>
                                                                    <option value="BS" <?php echo (isset($editView) && $events[0]->event_country == "BS" ? "selected=''" : '') ?>>Bahamas</option>
                                                                    <option value="BH" <?php echo (isset($editView) && $events[0]->event_country == "BH" ? "selected=''" : '') ?>>Bahrain</option>
                                                                    <option value="BD" <?php echo (isset($editView) && $events[0]->event_country == "BD" ? "selected=''" : '') ?>>Bangladesh</option>
                                                                    <option value="BB" <?php echo (isset($editView) && $events[0]->event_country == "BB" ? "selected=''" : '') ?>>Barbados</option>
                                                                    <option value="BY" <?php echo (isset($editView) && $events[0]->event_country == "BY" ? "selected=''" : '') ?>>Belarus</option>
                                                                    <option value="BE" <?php echo (isset($editView) && $events[0]->event_country == "BE" ? "selected=''" : '') ?>>Belgium</option>
                                                                    <option value="BZ" <?php echo (isset($editView) && $events[0]->event_country == "BZ" ? "selected=''" : '') ?>>Belize</option>
                                                                    <option value="BJ" <?php echo (isset($editView) && $events[0]->event_country == "BJ" ? "selected=''" : '') ?>>Benin</option>
                                                                    <option value="BM" <?php echo (isset($editView) && $events[0]->event_country == "BM" ? "selected=''" : '') ?>>Bermuda</option>
                                                                    <option value="BT" <?php echo (isset($editView) && $events[0]->event_country == "BT" ? "selected=''" : '') ?>>Bhutan</option>
                                                                    <option value="BO" <?php echo (isset($editView) && $events[0]->event_country == "BO" ? "selected=''" : '') ?>>Bolivia, Plurinational State of</option>
                                                                    <option value="BQ" <?php echo (isset($editView) && $events[0]->event_country == "BQ" ? "selected=''" : '') ?>>Bonaire, Sint Eustatius and Saba</option>
                                                                    <option value="BA" <?php echo (isset($editView) && $events[0]->event_country == "BA" ? "selected=''" : '') ?>>Bosnia and Herzegovina</option>
                                                                    <option value="BW" <?php echo (isset($editView) && $events[0]->event_country == "BW" ? "selected=''" : '') ?>>Botswana</option>
                                                                    <option value="BV" <?php echo (isset($editView) && $events[0]->event_country == "BV" ? "selected=''" : '') ?>>Bouvet Island</option>
                                                                    <option value="BR" <?php echo (isset($editView) && $events[0]->event_country == "BR" ? "selected=''" : '') ?>>Brazil</option>
                                                                    <option value="IO" <?php echo (isset($editView) && $events[0]->event_country == "IO" ? "selected=''" : '') ?>>British Indian Ocean Territory</option>
                                                                    <option value="BN" <?php echo (isset($editView) && $events[0]->event_country == "BN" ? "selected=''" : '') ?>>Brunei Darussalam</option>
                                                                    <option value="BG" <?php echo (isset($editView) && $events[0]->event_country == "BG" ? "selected=''" : '') ?>>Bulgaria</option>
                                                                    <option value="BF" <?php echo (isset($editView) && $events[0]->event_country == "BF" ? "selected=''" : '') ?>>Burkina Faso</option>
                                                                    <option value="BI" <?php echo (isset($editView) && $events[0]->event_country == "BI" ? "selected=''" : '') ?>>Burundi</option>
                                                                    <option value="KH" <?php echo (isset($editView) && $events[0]->event_country == "KH" ? "selected=''" : '') ?>>Cambodia</option>
                                                                    <option value="CM" <?php echo (isset($editView) && $events[0]->event_country == "CM" ? "selected=''" : '') ?>>Cameroon</option>
                                                                    <option value="CA" <?php echo (isset($editView) && $events[0]->event_country == "CA" ? "selected=''" : '') ?>>Canada</option>
                                                                    <option value="CV" <?php echo (isset($editView) && $events[0]->event_country == "CV" ? "selected=''" : '') ?>>Cape Verde</option>
                                                                    <option value="KY" <?php echo (isset($editView) && $events[0]->event_country == "KY" ? "selected=''" : '') ?>>Cayman Islands</option>
                                                                    <option value="CF" <?php echo (isset($editView) && $events[0]->event_country == "CF" ? "selected=''" : '') ?>>Central African Republic</option>
                                                                    <option value="TD" <?php echo (isset($editView) && $events[0]->event_country == "TD" ? "selected=''" : '') ?>>Chad</option>
                                                                    <option value="CL" <?php echo (isset($editView) && $events[0]->event_country == "CL" ? "selected=''" : '') ?>>Chile</option>
                                                                    <option value="CN" <?php echo (isset($editView) && $events[0]->event_country == "CN" ? "selected=''" : '') ?>>China</option>
                                                                    <option value="CX" <?php echo (isset($editView) && $events[0]->event_country == "CX" ? "selected=''" : '') ?>>Christmas Island</option>
                                                                    <option value="CC" <?php echo (isset($editView) && $events[0]->event_country == "CC" ? "selected=''" : '') ?>>Cocos (Keeling) Islands</option>
                                                                    <option value="CO" <?php echo (isset($editView) && $events[0]->event_country == "CO" ? "selected=''" : '') ?>>Colombia</option>
                                                                    <option value="KM" <?php echo (isset($editView) && $events[0]->event_country == "KM" ? "selected=''" : '') ?>>Comoros</option>
                                                                    <option value="CG" <?php echo (isset($editView) && $events[0]->event_country == "CG" ? "selected=''" : '') ?>>Congo</option>
                                                                    <option value="CD" <?php echo (isset($editView) && $events[0]->event_country == "CD" ? "selected=''" : '') ?>>Congo, the Democratic Republic of the</option>
                                                                    <option value="CK" <?php echo (isset($editView) && $events[0]->event_country == "CK" ? "selected=''" : '') ?>>Cook Islands</option>
                                                                    <option value="CR" <?php echo (isset($editView) && $events[0]->event_country == "CR" ? "selected=''" : '') ?>>Costa Rica</option>
                                                                    <option value="CI" <?php echo (isset($editView) && $events[0]->event_country == "CI" ? "selected=''" : '') ?>>Côte d'Ivoire</option>
                                                                    <option value="HR" <?php echo (isset($editView) && $events[0]->event_country == "HR" ? "selected=''" : '') ?>>Croatia</option>
                                                                    <option value="CU" <?php echo (isset($editView) && $events[0]->event_country == "CU" ? "selected=''" : '') ?>>Cuba</option>
                                                                    <option value="CW" <?php echo (isset($editView) && $events[0]->event_country == "CW" ? "selected=''" : '') ?>>Curaçao</option>
                                                                    <option value="CY" <?php echo (isset($editView) && $events[0]->event_country == "CY" ? "selected=''" : '') ?>>Cyprus</option>
                                                                    <option value="CZ" <?php echo (isset($editView) && $events[0]->event_country == "CZ" ? "selected=''" : '') ?>>Czech Republic</option>
                                                                    <option value="DK" <?php echo (isset($editView) && $events[0]->event_country == "DK" ? "selected=''" : '') ?>>Denmark</option>
                                                                    <option value="DJ" <?php echo (isset($editView) && $events[0]->event_country == "DJ" ? "selected=''" : '') ?>>Djibouti</option>
                                                                    <option value="DM" <?php echo (isset($editView) && $events[0]->event_country == "DM" ? "selected=''" : '') ?>>Dominica</option>
                                                                    <option value="DO" <?php echo (isset($editView) && $events[0]->event_country == "DO" ? "selected=''" : '') ?>>Dominican Republic</option>
                                                                    <option value="EC" <?php echo (isset($editView) && $events[0]->event_country == "EC" ? "selected=''" : '') ?>>Ecuador</option>
                                                                    <option value="EG" <?php echo (isset($editView) && $events[0]->event_country == "EG" ? "selected=''" : '') ?>>Egypt</option>
                                                                    <option value="SV" <?php echo (isset($editView) && $events[0]->event_country == "SV" ? "selected=''" : '') ?>>El Salvador</option>
                                                                    <option value="GQ" <?php echo (isset($editView) && $events[0]->event_country == "GQ" ? "selected=''" : '') ?>>Equatorial Guinea</option>
                                                                    <option value="ER" <?php echo (isset($editView) && $events[0]->event_country == "ER" ? "selected=''" : '') ?>>Eritrea</option>
                                                                    <option value="EE" <?php echo (isset($editView) && $events[0]->event_country == "EE" ? "selected=''" : '') ?>>Estonia</option>
                                                                    <option value="ET" <?php echo (isset($editView) && $events[0]->event_country == "ET" ? "selected=''" : '') ?>>Ethiopia</option>
                                                                    <option value="FK" <?php echo (isset($editView) && $events[0]->event_country == "FK" ? "selected=''" : '') ?>>Falkland Islands (Malvinas)</option>
                                                                    <option value="FO" <?php echo (isset($editView) && $events[0]->event_country == "FO" ? "selected=''" : '') ?>>Faroe Islands</option>
                                                                    <option value="FJ" <?php echo (isset($editView) && $events[0]->event_country == "FJ" ? "selected=''" : '') ?>>Fiji</option>
                                                                    <option value="FI" <?php echo (isset($editView) && $events[0]->event_country == "FI" ? "selected=''" : '') ?>>Finland</option>
                                                                    <option value="FR" <?php echo (isset($editView) && $events[0]->event_country == "FR" ? "selected=''" : '') ?>>France</option>
                                                                    <option value="GF" <?php echo (isset($editView) && $events[0]->event_country == "GF" ? "selected=''" : '') ?>>French Guiana</option>
                                                                    <option value="PF" <?php echo (isset($editView) && $events[0]->event_country == "PF" ? "selected=''" : '') ?>>French Polynesia</option>
                                                                    <option value="TF" <?php echo (isset($editView) && $events[0]->event_country == "TF" ? "selected=''" : '') ?>>French Southern Territories</option>
                                                                    <option value="GA" <?php echo (isset($editView) && $events[0]->event_country == "GA" ? "selected=''" : '') ?>>Gabon</option>
                                                                    <option value="GM" <?php echo (isset($editView) && $events[0]->event_country == "GM" ? "selected=''" : '') ?>>Gambia</option>
                                                                    <option value="GE" <?php echo (isset($editView) && $events[0]->event_country == "GE" ? "selected=''" : '') ?>>Georgia</option>
                                                                    <option value="DE" <?php echo (isset($editView) && $events[0]->event_country == "DE" ? "selected=''" : '') ?>>Germany</option>
                                                                    <option value="GH" <?php echo (isset($editView) && $events[0]->event_country == "GH" ? "selected=''" : '') ?>>Ghana</option>
                                                                    <option value="GI" <?php echo (isset($editView) && $events[0]->event_country == "GI" ? "selected=''" : '') ?>>Gibraltar</option>
                                                                    <option value="GR" <?php echo (isset($editView) && $events[0]->event_country == "GR" ? "selected=''" : '') ?>>Greece</option>
                                                                    <option value="GL" <?php echo (isset($editView) && $events[0]->event_country == "GL" ? "selected=''" : '') ?>>Greenland</option>
                                                                    <option value="GD" <?php echo (isset($editView) && $events[0]->event_country == "GD" ? "selected=''" : '') ?>>Grenada</option>
                                                                    <option value="GP" <?php echo (isset($editView) && $events[0]->event_country == "GP" ? "selected=''" : '') ?>>Guadeloupe</option>
                                                                    <option value="GU" <?php echo (isset($editView) && $events[0]->event_country == "GU" ? "selected=''" : '') ?>>Guam</option>
                                                                    <option value="GT" <?php echo (isset($editView) && $events[0]->event_country == "GT" ? "selected=''" : '') ?>>Guatemala</option>
                                                                    <option value="GG" <?php echo (isset($editView) && $events[0]->event_country == "GG" ? "selected=''" : '') ?>>Guernsey</option>
                                                                    <option value="GN" <?php echo (isset($editView) && $events[0]->event_country == "GN" ? "selected=''" : '') ?>>Guinea</option>
                                                                    <option value="GW" <?php echo (isset($editView) && $events[0]->event_country == "GW" ? "selected=''" : '') ?>>Guinea-Bissau</option>
                                                                    <option value="GY" <?php echo (isset($editView) && $events[0]->event_country == "GY" ? "selected=''" : '') ?>>Guyana</option>
                                                                    <option value="HT" <?php echo (isset($editView) && $events[0]->event_country == "HT" ? "selected=''" : '') ?>>Haiti</option>
                                                                    <option value="HM" <?php echo (isset($editView) && $events[0]->event_country == "HM" ? "selected=''" : '') ?>>Heard Island and McDonald Islands</option>
                                                                    <option value="VA" <?php echo (isset($editView) && $events[0]->event_country == "VA" ? "selected=''" : '') ?>>Holy See (Vatican City State)</option>
                                                                    <option value="HN" <?php echo (isset($editView) && $events[0]->event_country == "HN" ? "selected=''" : '') ?>>Honduras</option>
                                                                    <option value="HK" <?php echo (isset($editView) && $events[0]->event_country == "HK" ? "selected=''" : '') ?>>Hong Kong</option>
                                                                    <option value="HU" <?php echo (isset($editView) && $events[0]->event_country == "HU" ? "selected=''" : '') ?>>Hungary</option>
                                                                    <option value="IS" <?php echo (isset($editView) && $events[0]->event_country == "IS" ? "selected=''" : '') ?>>Iceland</option>
                                                                    <option value="IN" <?php echo (isset($editView) && $events[0]->event_country == "IN" ? "selected=''" : '') ?>>India</option>
                                                                    <option value="ID" <?php echo (isset($editView) && $events[0]->event_country == "ID" ? "selected=''" : '') ?>>Indonesia</option>
                                                                    <option value="IR" <?php echo (isset($editView) && $events[0]->event_country == "IR" ? "selected=''" : '') ?>>Iran, Islamic Republic of</option>
                                                                    <option value="IQ" <?php echo (isset($editView) && $events[0]->event_country == "IQ" ? "selected=''" : '') ?>>Iraq</option>
                                                                    <option value="IE" <?php echo (isset($editView) && $events[0]->event_country == "IE" ? "selected=''" : '') ?>>Ireland</option>
                                                                    <option value="IM" <?php echo (isset($editView) && $events[0]->event_country == "IM" ? "selected=''" : '') ?>>Isle of Man</option>
                                                                    <option value="IL" <?php echo (isset($editView) && $events[0]->event_country == "IL" ? "selected=''" : '') ?>>Israel</option>
                                                                    <option value="IT" <?php echo (isset($editView) && $events[0]->event_country == "IT" ? "selected=''" : '') ?>>Italy</option>
                                                                    <option value="JM" <?php echo (isset($editView) && $events[0]->event_country == "JM" ? "selected=''" : '') ?>>Jamaica</option>
                                                                    <option value="JP" <?php echo (isset($editView) && $events[0]->event_country == "JP" ? "selected=''" : '') ?>>Japan</option>
                                                                    <option value="JE" <?php echo (isset($editView) && $events[0]->event_country == "JE" ? "selected=''" : '') ?>>Jersey</option>
                                                                    <option value="JO" <?php echo (isset($editView) && $events[0]->event_country == "JO" ? "selected=''" : '') ?>>Jordan</option>
                                                                    <option value="KZ" <?php echo (isset($editView) && $events[0]->event_country == "KZ" ? "selected=''" : '') ?>>Kazakhstan</option>
                                                                    <option value="KE" <?php echo (isset($editView) && $events[0]->event_country == "KE" ? "selected=''" : '') ?>>Kenya</option>
                                                                    <option value="KI" <?php echo (isset($editView) && $events[0]->event_country == "KI" ? "selected=''" : '') ?>>Kiribati</option>
                                                                    <option value="KP" <?php echo (isset($editView) && $events[0]->event_country == "KP" ? "selected=''" : '') ?>>Korea, Democratic People's Republic of</option>
                                                                    <option value="KR" <?php echo (isset($editView) && $events[0]->event_country == "KR" ? "selected=''" : '') ?>>Korea, Republic of</option>
                                                                    <option value="KW" <?php echo (isset($editView) && $events[0]->event_country == "KW" ? "selected=''" : '') ?>>Kuwait</option>
                                                                    <option value="KG" <?php echo (isset($editView) && $events[0]->event_country == "KG" ? "selected=''" : '') ?>>Kyrgyzstan</option>
                                                                    <option value="LA" <?php echo (isset($editView) && $events[0]->event_country == "LA" ? "selected=''" : '') ?>>Lao People's Democratic Republic</option>
                                                                    <option value="LV" <?php echo (isset($editView) && $events[0]->event_country == "LV" ? "selected=''" : '') ?>>Latvia</option>
                                                                    <option value="LB" <?php echo (isset($editView) && $events[0]->event_country == "LB" ? "selected=''" : '') ?>>Lebanon</option>
                                                                    <option value="LS" <?php echo (isset($editView) && $events[0]->event_country == "LS" ? "selected=''" : '') ?>>Lesotho</option>
                                                                    <option value="LR" <?php echo (isset($editView) && $events[0]->event_country == "LR" ? "selected=''" : '') ?>>Liberia</option>
                                                                    <option value="LY" <?php echo (isset($editView) && $events[0]->event_country == "LY" ? "selected=''" : '') ?>>Libya</option>
                                                                    <option value="LI" <?php echo (isset($editView) && $events[0]->event_country == "LI" ? "selected=''" : '') ?>>Liechtenstein</option>
                                                                    <option value="LT" <?php echo (isset($editView) && $events[0]->event_country == "LT" ? "selected=''" : '') ?>>Lithuania</option>
                                                                    <option value="LU" <?php echo (isset($editView) && $events[0]->event_country == "LU" ? "selected=''" : '') ?>>Luxembourg</option>
                                                                    <option value="MO" <?php echo (isset($editView) && $events[0]->event_country == "MO" ? "selected=''" : '') ?>>Macao</option>
                                                                    <option value="MK" <?php echo (isset($editView) && $events[0]->event_country == "MK" ? "selected=''" : '') ?>>Macedonia, the former Yugoslav Republic of</option>
                                                                    <option value="MG" <?php echo (isset($editView) && $events[0]->event_country == "MG" ? "selected=''" : '') ?>>Madagascar</option>
                                                                    <option value="MW" <?php echo (isset($editView) && $events[0]->event_country == "MW" ? "selected=''" : '') ?>>Malawi</option>
                                                                    <option value="MY" <?php echo (isset($editView) && $events[0]->event_country == "MY" ? "selected=''" : '') ?>>Malaysia</option>
                                                                    <option value="MV" <?php echo (isset($editView) && $events[0]->event_country == "MV" ? "selected=''" : '') ?>>Maldives</option>
                                                                    <option value="ML" <?php echo (isset($editView) && $events[0]->event_country == "ML" ? "selected=''" : '') ?>>Mali</option>
                                                                    <option value="MT" <?php echo (isset($editView) && $events[0]->event_country == "MT" ? "selected=''" : '') ?>>Malta</option>
                                                                    <option value="MH" <?php echo (isset($editView) && $events[0]->event_country == "MH" ? "selected=''" : '') ?>>Marshall Islands</option>
                                                                    <option value="MQ" <?php echo (isset($editView) && $events[0]->event_country == "MQ" ? "selected=''" : '') ?>>Martinique</option>
                                                                    <option value="MR" <?php echo (isset($editView) && $events[0]->event_country == "MR" ? "selected=''" : '') ?>>Mauritania</option>
                                                                    <option value="MU" <?php echo (isset($editView) && $events[0]->event_country == "MU" ? "selected=''" : '') ?>>Mauritius</option>
                                                                    <option value="YT" <?php echo (isset($editView) && $events[0]->event_country == "YT" ? "selected=''" : '') ?>>Mayotte</option>
                                                                    <option value="MX" <?php echo (isset($editView) && $events[0]->event_country == "MX" ? "selected=''" : '') ?>>Mexico</option>
                                                                    <option value="FM" <?php echo (isset($editView) && $events[0]->event_country == "FM" ? "selected=''" : '') ?>>Micronesia, Federated States of</option>
                                                                    <option value="MD" <?php echo (isset($editView) && $events[0]->event_country == "MD" ? "selected=''" : '') ?>>Moldova, Republic of</option>
                                                                    <option value="MC" <?php echo (isset($editView) && $events[0]->event_country == "MC" ? "selected=''" : '') ?>>Monaco</option>
                                                                    <option value="MN" <?php echo (isset($editView) && $events[0]->event_country == "MN" ? "selected=''" : '') ?>>Mongolia</option>
                                                                    <option value="ME" <?php echo (isset($editView) && $events[0]->event_country == "ME" ? "selected=''" : '') ?>>Montenegro</option>
                                                                    <option value="MS" <?php echo (isset($editView) && $events[0]->event_country == "MS" ? "selected=''" : '') ?>>Montserrat</option>
                                                                    <option value="MA" <?php echo (isset($editView) && $events[0]->event_country == "MA" ? "selected=''" : '') ?>>Morocco</option>
                                                                    <option value="MZ" <?php echo (isset($editView) && $events[0]->event_country == "MZ" ? "selected=''" : '') ?>>Mozambique</option>
                                                                    <option value="MM" <?php echo (isset($editView) && $events[0]->event_country == "MM" ? "selected=''" : '') ?>>Myanmar</option>
                                                                    <option value="NA" <?php echo (isset($editView) && $events[0]->event_country == "NA" ? "selected=''" : '') ?>>Namibia</option>
                                                                    <option value="NR" <?php echo (isset($editView) && $events[0]->event_country == "NR" ? "selected=''" : '') ?>>Nauru</option>
                                                                    <option value="NP" <?php echo (isset($editView) && $events[0]->event_country == "NP" ? "selected=''" : '') ?>>Nepal</option>
                                                                    <option value="NL" <?php echo (isset($editView) && $events[0]->event_country == "NL" ? "selected=''" : '') ?>>Netherlands</option>
                                                                    <option value="NC" <?php echo (isset($editView) && $events[0]->event_country == "NC" ? "selected=''" : '') ?>>New Caledonia</option>
                                                                    <option value="NZ" <?php echo (isset($editView) && $events[0]->event_country == "NZ" ? "selected=''" : '') ?>>New Zealand</option>
                                                                    <option value="NI" <?php echo (isset($editView) && $events[0]->event_country == "NI" ? "selected=''" : '') ?>>Nicaragua</option>
                                                                    <option value="NE" <?php echo (isset($editView) && $events[0]->event_country == "NE" ? "selected=''" : '') ?>>Niger</option>
                                                                    <option value="NG" <?php echo (isset($editView) && $events[0]->event_country == "NG" ? "selected=''" : '') ?>>Nigeria</option>
                                                                    <option value="NU" <?php echo (isset($editView) && $events[0]->event_country == "NU" ? "selected=''" : '') ?>>Niue</option>
                                                                    <option value="NF" <?php echo (isset($editView) && $events[0]->event_country == "NF" ? "selected=''" : '') ?>>Norfolk Island</option>
                                                                    <option value="MP" <?php echo (isset($editView) && $events[0]->event_country == "MP" ? "selected=''" : '') ?>>Northern Mariana Islands</option>
                                                                    <option value="NO" <?php echo (isset($editView) && $events[0]->event_country == "NO" ? "selected=''" : '') ?>>Norway</option>
                                                                    <option value="OM" <?php echo (isset($editView) && $events[0]->event_country == "OM" ? "selected=''" : '') ?>>Oman</option>
                                                                    <option value="PK" <?php echo (isset($editView) && $events[0]->event_country == "PK" ? "selected=''" : '') ?>>Pakistan</option>
                                                                    <option value="PW" <?php echo (isset($editView) && $events[0]->event_country == "PW" ? "selected=''" : '') ?>>Palau</option>
                                                                    <option value="PS" <?php echo (isset($editView) && $events[0]->event_country == "PS" ? "selected=''" : '') ?>>Palestinian Territory, Occupied</option>
                                                                    <option value="PA" <?php echo (isset($editView) && $events[0]->event_country == "PA" ? "selected=''" : '') ?>>Panama</option>
                                                                    <option value="PG" <?php echo (isset($editView) && $events[0]->event_country == "PG" ? "selected=''" : '') ?>>Papua New Guinea</option>
                                                                    <option value="PY" <?php echo (isset($editView) && $events[0]->event_country == "PY" ? "selected=''" : '') ?>>Paraguay</option>
                                                                    <option value="PE" <?php echo (isset($editView) && $events[0]->event_country == "PE" ? "selected=''" : '') ?>>Peru</option>
                                                                    <option value="PH" <?php echo (isset($editView) && $events[0]->event_country == "PH" ? "selected=''" : '') ?>>Philippines</option>
                                                                    <option value="PN" <?php echo (isset($editView) && $events[0]->event_country == "PN" ? "selected=''" : '') ?>>Pitcairn</option>
                                                                    <option value="PL" <?php echo (isset($editView) && $events[0]->event_country == "PL" ? "selected=''" : '') ?>>Poland</option>
                                                                    <option value="PT" <?php echo (isset($editView) && $events[0]->event_country == "PT" ? "selected=''" : '') ?>>Portugal</option>
                                                                    <option value="PR" <?php echo (isset($editView) && $events[0]->event_country == "PR" ? "selected=''" : '') ?>>Puerto Rico</option>
                                                                    <option value="QA" <?php echo (isset($editView) && $events[0]->event_country == "QA" ? "selected=''" : '') ?>>Qatar</option>
                                                                    <option value="RE" <?php echo (isset($editView) && $events[0]->event_country == "RE" ? "selected=''" : '') ?>>Réunion</option>
                                                                    <option value="RO" <?php echo (isset($editView) && $events[0]->event_country == "RO" ? "selected=''" : '') ?>>Romania</option>
                                                                    <option value="RU" <?php echo (isset($editView) && $events[0]->event_country == "RU" ? "selected=''" : '') ?>>Russian Federation</option>
                                                                    <option value="RW" <?php echo (isset($editView) && $events[0]->event_country == "RW" ? "selected=''" : '') ?>>Rwanda</option>
                                                                    <option value="BL" <?php echo (isset($editView) && $events[0]->event_country == "BL" ? "selected=''" : '') ?>>Saint Barthélemy</option>
                                                                    <option value="SH" <?php echo (isset($editView) && $events[0]->event_country == "SH" ? "selected=''" : '') ?>>Saint Helena, Ascension and Tristan da Cunha</option>
                                                                    <option value="KN" <?php echo (isset($editView) && $events[0]->event_country == "KN" ? "selected=''" : '') ?>>Saint Kitts and Nevis</option>
                                                                    <option value="LC" <?php echo (isset($editView) && $events[0]->event_country == "LC" ? "selected=''" : '') ?>>Saint Lucia</option>
                                                                    <option value="MF" <?php echo (isset($editView) && $events[0]->event_country == "MF" ? "selected=''" : '') ?>>Saint Martin (French part)</option>
                                                                    <option value="PM" <?php echo (isset($editView) && $events[0]->event_country == "PM" ? "selected=''" : '') ?>>Saint Pierre and Miquelon</option>
                                                                    <option value="VC" <?php echo (isset($editView) && $events[0]->event_country == "VC" ? "selected=''" : '') ?>>Saint Vincent and the Grenadines</option>
                                                                    <option value="WS" <?php echo (isset($editView) && $events[0]->event_country == "WS" ? "selected=''" : '') ?>>Samoa</option>
                                                                    <option value="SM" <?php echo (isset($editView) && $events[0]->event_country == "SM" ? "selected=''" : '') ?>>San Marino</option>
                                                                    <option value="ST" <?php echo (isset($editView) && $events[0]->event_country == "ST" ? "selected=''" : '') ?>>Sao Tome and Principe</option>
                                                                    <option value="SA" <?php echo (isset($editView) && $events[0]->event_country == "SA" ? "selected=''" : '') ?>>Saudi Arabia</option>
                                                                    <option value="SN" <?php echo (isset($editView) && $events[0]->event_country == "SN" ? "selected=''" : '') ?>>Senegal</option>
                                                                    <option value="RS" <?php echo (isset($editView) && $events[0]->event_country == "RS" ? "selected=''" : '') ?>>Serbia</option>
                                                                    <option value="SC" <?php echo (isset($editView) && $events[0]->event_country == "SC" ? "selected=''" : '') ?>>Seychelles</option>
                                                                    <option value="SL" <?php echo (isset($editView) && $events[0]->event_country == "SL" ? "selected=''" : '') ?>>Sierra Leone</option>
                                                                    <option value="SG" <?php echo (isset($editView) && $events[0]->event_country == "SG" ? "selected=''" : '') ?>>Singapore</option>
                                                                    <option value="SX" <?php echo (isset($editView) && $events[0]->event_country == "SX" ? "selected=''" : '') ?>>Sint Maarten (Dutch part)</option>
                                                                    <option value="SK" <?php echo (isset($editView) && $events[0]->event_country == "SK" ? "selected=''" : '') ?>>Slovakia</option>
                                                                    <option value="SI" <?php echo (isset($editView) && $events[0]->event_country == "SI" ? "selected=''" : '') ?>>Slovenia</option>
                                                                    <option value="SB" <?php echo (isset($editView) && $events[0]->event_country == "SB" ? "selected=''" : '') ?>>Solomon Islands</option>
                                                                    <option value="SO" <?php echo (isset($editView) && $events[0]->event_country == "SO" ? "selected=''" : '') ?>>Somalia</option>
                                                                    <option value="ZA" <?php echo (isset($editView) && $events[0]->event_country == "ZA" ? "selected=''" : '') ?>>South Africa</option>
                                                                    <option value="GS" <?php echo (isset($editView) && $events[0]->event_country == "GS" ? "selected=''" : '') ?>>South Georgia and the South Sandwich Islands</option>
                                                                    <option value="SS" <?php echo (isset($editView) && $events[0]->event_country == "SS" ? "selected=''" : '') ?>>South Sudan</option>
                                                                    <option value="ES" <?php echo (isset($editView) && $events[0]->event_country == "ES" ? "selected=''" : '') ?>>Spain</option>
                                                                    <option value="LK" <?php echo (isset($editView) && $events[0]->event_country == "LK" ? "selected=''" : '') ?>>Sri Lanka</option>
                                                                    <option value="SD" <?php echo (isset($editView) && $events[0]->event_country == "SD" ? "selected=''" : '') ?>>Sudan</option>
                                                                    <option value="SR" <?php echo (isset($editView) && $events[0]->event_country == "SR" ? "selected=''" : '') ?>>Suriname</option>
                                                                    <option value="SJ" <?php echo (isset($editView) && $events[0]->event_country == "SJ" ? "selected=''" : '') ?>>Svalbard and Jan Mayen</option>
                                                                    <option value="SZ" <?php echo (isset($editView) && $events[0]->event_country == "SZ" ? "selected=''" : '') ?>>Swaziland</option>
                                                                    <option value="SE" <?php echo (isset($editView) && $events[0]->event_country == "SE" ? "selected=''" : '') ?>>Sweden</option>
                                                                    <option value="CH" <?php echo (isset($editView) && $events[0]->event_country == "CH" ? "selected=''" : '') ?>>Switzerland</option>
                                                                    <option value="SY" <?php echo (isset($editView) && $events[0]->event_country == "SY" ? "selected=''" : '') ?>>Syrian Arab Republic</option>
                                                                    <option value="TW" <?php echo (isset($editView) && $events[0]->event_country == "TW" ? "selected=''" : '') ?>>Taiwan, Province of China</option>
                                                                    <option value="TJ" <?php echo (isset($editView) && $events[0]->event_country == "TJ" ? "selected=''" : '') ?>>Tajikistan</option>
                                                                    <option value="TZ" <?php echo (isset($editView) && $events[0]->event_country == "TZ" ? "selected=''" : '') ?>>Tanzania, United Republic of</option>
                                                                    <option value="TH" <?php echo (isset($editView) && $events[0]->event_country == "TH" ? "selected=''" : '') ?>>Thailand</option>
                                                                    <option value="TL" <?php echo (isset($editView) && $events[0]->event_country == "TL" ? "selected=''" : '') ?>>Timor-Leste</option>
                                                                    <option value="TG" <?php echo (isset($editView) && $events[0]->event_country == "TG" ? "selected=''" : '') ?>>Togo</option>
                                                                    <option value="TK" <?php echo (isset($editView) && $events[0]->event_country == "TK" ? "selected=''" : '') ?>>Tokelau</option>
                                                                    <option value="TO" <?php echo (isset($editView) && $events[0]->event_country == "TO" ? "selected=''" : '') ?>>Tonga</option>
                                                                    <option value="TT" <?php echo (isset($editView) && $events[0]->event_country == "TT" ? "selected=''" : '') ?>>Trinidad and Tobago</option>
                                                                    <option value="TN" <?php echo (isset($editView) && $events[0]->event_country == "TN" ? "selected=''" : '') ?>>Tunisia</option>
                                                                    <option value="TR" <?php echo (isset($editView) && $events[0]->event_country == "TR" ? "selected=''" : '') ?>>Turkey</option>
                                                                    <option value="TM" <?php echo (isset($editView) && $events[0]->event_country == "TM" ? "selected=''" : '') ?>>Turkmenistan</option>
                                                                    <option value="TC" <?php echo (isset($editView) && $events[0]->event_country == "TC" ? "selected=''" : '') ?>>Turks and Caicos Islands</option>
                                                                    <option value="TV" <?php echo (isset($editView) && $events[0]->event_country == "TV" ? "selected=''" : '') ?>>Tuvalu</option>
                                                                    <option value="UG" <?php echo (isset($editView) && $events[0]->event_country == "UG" ? "selected=''" : '') ?>>Uganda</option>
                                                                    <option value="UA" <?php echo (isset($editView) && $events[0]->event_country == "UA" ? "selected=''" : '') ?>>Ukraine</option>
                                                                    <option value="AE" <?php echo (isset($editView) && $events[0]->event_country == "AE" ? "selected=''" : '') ?>>United Arab Emirates</option>
                                                                    <option value="GB" <?php echo (isset($editView) && $events[0]->event_country == "GB" ? "selected=''" : '') ?>>United Kingdom</option>
                                                                    <option value="US" <?php echo (isset($editView) && $events[0]->event_country == "US" ? "selected=''" : '') ?>>United States</option>
                                                                    <option value="UM" <?php echo (isset($editView) && $events[0]->event_country == "UM" ? "selected=''" : '') ?>>United States Minor Outlying Islands</option>
                                                                    <option value="UY" <?php echo (isset($editView) && $events[0]->event_country == "UY" ? "selected=''" : '') ?>>Uruguay</option>
                                                                    <option value="UZ" <?php echo (isset($editView) && $events[0]->event_country == "UZ" ? "selected=''" : '') ?>>Uzbekistan</option>
                                                                    <option value="VU" <?php echo (isset($editView) && $events[0]->event_country == "VU" ? "selected=''" : '') ?>>Vanuatu</option>
                                                                    <option value="VE" <?php echo (isset($editView) && $events[0]->event_country == "VE" ? "selected=''" : '') ?>>Venezuela, Bolivarian Republic of</option>
                                                                    <option value="VN" <?php echo (isset($editView) && $events[0]->event_country == "VN" ? "selected=''" : '') ?>>Viet Nam</option>
                                                                    <option value="VG" <?php echo (isset($editView) && $events[0]->event_country == "VG" ? "selected=''" : '') ?>>Virgin Islands, British</option>
                                                                    <option value="VI" <?php echo (isset($editView) && $events[0]->event_country == "VI" ? "selected=''" : '') ?>>Virgin Islands, U.S.</option>
                                                                    <option value="WF" <?php echo (isset($editView) && $events[0]->event_country == "WF" ? "selected=''" : '') ?>>Wallis and Futuna</option>
                                                                    <option value="EH" <?php echo (isset($editView) && $events[0]->event_country == "EH" ? "selected=''" : '') ?>>Western Sahara</option>
                                                                    <option value="YE" <?php echo (isset($editView) && $events[0]->event_country == "YE" ? "selected=''" : '') ?>>Yemen</option>
                                                                    <option value="ZM" <?php echo (isset($editView) && $events[0]->event_country == "ZM" ? "selected=''" : '') ?>>Zambia</option>
                                                                    <option value="ZW" <?php echo (isset($editView) && $events[0]->event_country == "ZW" ? "selected=''" : '') ?>>Zimbabwe</option>
                                                                    </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <label for="locationURL-input">Event Location URL&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the full absolute URL link to your event's location webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                            <!--PHP HERE--> <input type="text" name="event_location_url" id="locationURL-input" class="form-control" placeholder="https://eventlocation.com" value="<?php echo (isset($editView) ? $events[0]->event_location_url : '') ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-6 froala-container"><!--this text area should be a Froala-->
                                                        <label class="col-form-label" for="event-description">Event Short Description<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="event_description" id="event-description" rows="5" placeholder="Describe your Event here."><?php echo (isset($editView) ? $events[0]->event_description : '') ?></textarea>
                                                    </div>
                                                    <div class="col-md-6 froala-container"><!--this text area should be a Froala-->
                                                        <label class="col-form-label" for="location-description">Event Location Description</label>
                                                    <textarea class="form-control" name="event_details" id="location-description" rows="5" placeholder="Details about your Event location, organization or host here."><?php echo (isset($editView) ? $events[0]->event_details : '') ?></textarea>
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="permission-select">Event Permissions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose which users can see this event page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                            <select class="form-control" name="event_permission" id="permission-select">
                                                                <option value="public" <?php echo (isset($editView) && $events[0]->event_permission == "public" ? "selected=''" : '') ?>>Public</option><!--Default Choice-->
                                                                <option value="members" <?php echo (isset($editView) && $events[0]->event_permission == "members" ? "selected=''" : '') ?>>Members Only</option><!--This is dynamic based on the member groups-->
                                                                <option value="members2" <?php echo (isset($editView) && $events[0]->event_permission == "members2" ? "selected=''" : '') ?>>Member Group 2</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>Make this Event Public?</h4>&nbsp;
                                                            <!-- Success Switch-->
                                                            <input type="checkbox" id="switch3" data-switch="success" name="is_event_public" value="1" <?php echo (isset($editView) && $events[0]->is_event_public == 1 ? "checked=''" : '') ?> />
                                                                <label for="switch3" data-on-label="Yes" data-off-label="No"></label>

                                                        </div>

                                                    </div><!--end row-->


                                                    <div class="form-group row">
                                                            <div class="col-md-6">
                                                                    <h3 class="header-title mt-2">Large Event Image Upload&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Upload a web compressed .jpg, .png, or .gif image which is 1920px x 1280px."><span class="text-danger">*</span>&nbsp;<i class="dripicons mdi mdi-help-circle-outline"></i></a></h3>
                                                                    <input type="hidden" name="file_upload_id" id="file_upload_id" class="form-control" value="<?php echo (isset($editView) ? $events[0]->file_upload_id : '') ?>">
                                                                    <!--this is the large image at the top of the page-->
                                                                    <!--begin image dropzone-->
                                                                    <div class="text-center border p-4 mb-3"><!--this is number2 of potentially 6 images-->
                                                                    <!-- I think you need to adjust the Javascript so it uploads.-->
                                                                    <div method="post" class="dropzone" id="eventAddDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                                                    <div class="fallback">
                                                                        <input name="file" type="file" />
                                                                    </div>
                                                                    <div class="dz-message needsclick">
                                                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                                        <h3>Drop your image here or click to upload.</h3>
                                                                        <span class="text-muted font-13">Drop your image here.</span>
                                                                    </div>

                                                                                </div>
                                                                <!-- Preview -->
                                                                <div class="dropzone-previews mt-3 mb-3" id="file-previews">
                                                                    <?php if( isset($events) && !empty($events[0]->file_upload_path) ) : ?>
                                                                        <img src="<?php echo base_url($events[0]->file_upload_path) ?>" width="300">
                                                                    <?php endif ?>
                                                                </div>

                                                                <button type="button" class="btn btn-danger btn-icon btn-rounded" <?php echo isset($events) && $events[0]->file_upload_id == 0  ? "style='display:none'" : ""  ?> id="delete_img" value="submit"><i class="mdi mdi-delete"></i>&nbsp;Delete Image</button>
                                                                    </div><!--end dropzone-->
                                                            </div><!--end col 6-->
                                                            <div class="col-md-6">
                                                                    <div class="custom-control custom-checkbox mb-3 mt-4">
                                                                            <input type="checkbox" class="custom-control-input" id="CalltoActionCheck" value="1" name="is_call_action" <?php echo (isset($editView) && $events[0]->is_call_action ? "checked=''" : '') ?>>
                                                                            <label class="custom-control-label" for="CalltoActionCheck">Add a Call to Action Button?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box if you'd like to add a Call to Action button to a Registration or other landing page from your event page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                                        </div>
                                                                            <p class="mt-2 mb-3">
                                                                                <label for="buttonURL-input">Call to Action Button Link&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the full absolute URL link to your event's Registration or another page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                                                    <!--PHP HERE--> <input type="text" id="buttonURL-input" class="form-control" name="call_action_url" placeholder="https://yoursite.com/registration" value="<?php echo (isset($editView) ? $events[0]->call_action_url : '') ?>">
                                                                                </p>
                                                            </div><!--end col 6-->
                                                        </div><!--end row-->
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>

                                    <!--begin Page Design Tab Pane-->
                                    <div class="tab-pane fade" id="tab2">
                                            <div class="row">
                                                <div class="col-12">
                                            <div class="form-group row mb-3">
                                                    <div class="col-md-6">
                                                        <h4>If you do not want to create an event page layout, you can skip this step.</h4>
                                                    </div>
                                                        <div class="col-md-6 text-right">
                                                            <button class="btn btn-lg btn-primary button-next" id="skip" name='next' value='Next'>Skip This Step</button>
                                                        </div>
                                                    </div>
                                                </div>  <!--end column 12-->
                                                </div><!--end row-->
                                            <div class="row">
                                                    <div class="col-md-12">
                                                            <h4>Event Page Layout&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Please choose your Page Template from the list below. Then hit Preview or Edit to See your template."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center mb-6">
                                                    <div class="col-md-6">
                                                                <div class="form-group mb-6 pt-3">
                                                                        <label for="example-select">Page Templates</label>
                                                                        <select class="form-control" id="example-select" name="event_templates_id">
                                                                            <?php foreach($events_templates as $key => $row ): ?>
                                                                             <option value="<?php echo $row->id ?>" <?php echo (isset($editView) && $events[0]->event_templates_id == $row->id ? "selected=''"  : '') ?>><?php echo $row->name ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mt-2">&nbsp;</p>
                                                            <div class="button-list pt-6">
                                                                <button type="button" class="btn btn-info" id="btn_event_preview">Preview</button>
                                                                <button type="button" class="btn btn-warning" id="btn_event_edit"> &nbsp;Edit&nbsp;</a>
                                                                <button type="button" class="btn btn-success" id="btn_event_save_draft">Save Draft</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                <!--end row-->
                                    </div><!--end page design Tab Pane-->

                                    <!--begin Invite Tab Pane-->
                                    <div class="tab-pane" id="tab3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <div class="col-md-6">
                                                    <h4>If you do not want to send invites to attendees, you can skip this step.</h4>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <!--<button class="btn btn-lg btn-primary button-next" id="skip" name='next' value='Next'>Skip This Step</button>-->
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <div class="col-md-6">
                                                        <h5 class="mt-4">Let's Tell People About This Event</h5>
                                                        <p>You can either choose to send an event invite to one of your email list segments from the dropdown list below, or enter their email addresses followed by a comma to send the invitation email.</p>
                                                        <!--Custom list below is dynamic and site member names should appear in dropdown below -- delete example names-->
                                                        <select class="custom-select" name="newsletters_list_id">
                                                            <option selected>Select Email List</option>
                                                            <option value="1" <?php echo (isset($editView) && $events[0]->newsletters_list_id == 5 ? "selected=''"  : '') ?>>Newsletter List 1</option>
                                                            <option value="2" <?php echo (isset($editView) && $events[0]->newsletters_list_id == 5 ? "selected=''"  : '') ?>>Newsletter List 2</option>
                                                            <option value="3" <?php echo (isset($editView) && $events[0]->newsletters_list_id == 5 ? "selected=''"  : '') ?>>Newsletter List 3</option>
                                                            <option value="4" <?php echo (isset($editView) && $events[0]->newsletters_list_id == 5 ? "selected=''"  : '') ?>>Newsletter List 4</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                    <div class="custom-control custom-radio mt-3">
                                                        <input type="radio" class="custom-control-input" value="0" name="event_rsvp_private" id="RSVPradio1" <?php echo (isset($editView) && $events[0]->event_rsvp_private == 0 ? "checked=''"  : '') ?>>
                                                        <label class="custom-control-label" for="RSVPradio1">Request R.S.V.P. (Accept, Maybe, Decline) - Invitee List Public</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-1">
                                                        <input type="radio" class="custom-control-input" value="1" name="event_rsvp_private" id="RSVPradio2" <?php echo (isset($editView) && $events[0]->event_rsvp_private == 1 ? "checked=''"  : '') ?>>
                                                        <label class="custom-control-label" for="RSVPradio2">Make R.S.V.P.s Private - Only Administrator sees them.</label>
                                                    </div>
                                                    <div class="mt-4">
                                                        <label class="col-form-label" for="event-subject">Event Invite Email Subject</label>
                                                        <input type="text" id="event-subject" name="event_email_subject" class="form-control" placeholder="Your Your Subject Here" value="<?php echo (isset($editView) ? $events[0]->event_email_subject : '') ?>">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="emails-textarea">Enter Email Addresses</label>
                                                            <textarea class="form-control" name="event_email_event" id="emails-textarea" rows="5" placeholder="Enter the emails in this field like this: email@yoursite.com, another-email@yoursite.com, harrypotter@hogwarts.edu"><?php echo (isset($editView) ? $events[0]->event_email_event : '') ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="emails-textarea">Event Invite Email Text</label><!--This should be a Froala Editor!!!-->
                                                            <textarea class="form-control" name="event_email_message" id="event_invite_email_text" rows="10" placeholder="Enter the text for your Invitation Email here."><?php echo (isset($editView) ? $events[0]->event_email_message : '') ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="button-list ml-2 mb-2">
                                                            <!-- Custom width modal -->
                                                            <button type="button" id="preview_emailbtn" class="btn btn-outline-info" data-toggle="modal" data-target="#email-preview"><i class="dripicons-inbox"></i>&nbsp;Preview Email</button>
                                                            <!-- Full width modal -->
                                                        </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div><!--end tab pane-->
                                    <div class="tab-pane" id="tab4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="justify-content-center">
                                                        <h2 class="text-center mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                        <p class="lead">If you want to see a draft of your page, then click the Preview Button below, or to Edit it click the Edit Button on the <a href="/admin/events_manage" title="Manage Events Page">Manage Events Page</a>. To publish your page and make it live, you must hit the Save button. To Add your new Events Page to your site Navigation, visit the <a href="/admin/navigation">Navigation Page</a> under Site Build. Then Click the Plus + Sign on the top of the column you wish your page to appear.</p>
                                                        <h3 class="mt-0">Event Details Preview</h3>
                                                        </div>
                                                        <!--information on this page should be dynamically added-->
                                                        <dl class="row">
                                                            <dt class="col-sm-3 mb-2">Event Title:</dt>
                                                            <dd class="col-sm-9"><div id="vEventTitle"><?php echo (isset($editView) ? $events[0]->event_title : '') ?></div></dd><!--Dynamic Data from Event Title-->
                                                            <dt class="col-sm-3">Start Date / Time:</dt>
                                                            <dd class="col-sm-9">
                                                                <div id="vStartDate"><?php echo (isset($editView) ? $events[0]->event_start_time : '') ?></div>
                                                            </dd>
                                                            <dt class="col-sm-3">End Date / Time:</dt>
                                                            <dd class="col-sm-9">
                                                                <div id="vEndDate"><?php echo (isset($editView) ? $events[0]->event_end_time : '') ?></div>
                                                            </dd>
                                                            <dt class="col-sm-3">Organization:</dt>
                                                            <dd class="col-sm-9"><div id="vOrganization"><?php echo (isset($editView) ? $events[0]->event_host : '') ?></div></dd>
                                                            <dt class="col-sm-3">Location:</dt>
                                                            <dd class="col-sm-9"><div id="vLocation"><?php echo (isset($editView) ? $events[0]->event_location : '') ?></div></dd>
                                                            <dt class="col-sm-3">Event Address:</dt>
                                                            <dd class="col-sm-9"><div id="vAddre"><?php echo (isset($editView) ? $events[0]->event_details : '') ?></div></dd>

                                                            <dt class="col-sm-3">Invitees:</dt>
                                                            <dd class="col-sm-9"><div id="vInvitees"><?php echo (isset($editView) ? $events[0]->event_email_event : '') ?></div></dd>
                                                            <span class="mt-3">
                                                            <dt class="col-sm-9">Invitation Email:</dt>
                                                            <dd class="col-sm-9">
                                                                <dl class="row mb-3">
                                                                    <dt class="col-sm-6">Subject:</dt>
                                                                    <dd class="col-sm-6"><div id="vSubject"><?php echo (isset($editView) ? $events[0]->event_email_subject : '') ?></div></dd>
                                                                    <dt class="col-sm-6">Email Text:</dt>
                                                                    <dd class="col-sm-6"><div id="vEmailText"><?php echo (isset($editView) ? $events[0]->event_email_message : '') ?></div></dd>
                                                                    <dt> <div class="button-list mb-3"></div></dt>
                                                                </dl>
                                                            </dd></span>
                                                        </dl>

                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>
                                    <div class="float-right">
                                        <input type='submit'  class='btn btn-info button-next' name='next' value='Next' />
                                        <input type='button' class='btn btn-warning button-last' name='last' value='Last' />
                                    </div>
                                    <div class="float-left">
                                        <input type='button' class='btn btn-info button-first' name='first' value='First' />
                                        <input type='button' class='btn btn-success button-previous' name='previous' value='Previous' />
                                    </div>

                                    <div class="clearfix"></div>
                            </div> <!-- tab-content -->
                        </div> <!-- end #btnwizard-->

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
    </div><!--end col-->
            <div class="col-12 mb-3">
            <div class="button-list">
            <div class="text-right">
                <button type="button" class="btn btn-lg btn-secondary" onclick="location.href = '<?php echo  base_url('admin/events') ?>';">Cancel</button>
                <button type="button" id=<?php echo (isset($editView) ? "edit_event_btn" : "add_event_btn") ?> class="btn btn-lg btn-primary">Save</button>
                </div>
            </div>
        </div>
         <input type='hidden' id="currentId">
         <input type='hidden' value=<?php echo isset($editView) ? $id : '0'?> name="event_id">
        </form>
        <!--end row-->
    </div><!--end row-->
