
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
                                            <li class="breadcrumb-item active">Manage Events</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Events</h4>
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
                            Manage Events
                          </h3>
                            <p>Use this page to manage your Events. If you'd like to Add a New Event or see them listed on a calendar, visit the <a href="/admin/events" title="Events Page">Events page</a>.</p>
                            <p>To edit an existing event from the table below, click the Pencil icon next to the Event Name <i class="mdi mdi-pencil mdi-24px"></i>. To Delete the Event, click the trashcan icon next to the event name <i class="mdi mdi-delete mdi-24px"></i>. You can also view the R.S.V.P.s for an event and Invite more people to an event by clicking the buttons below the event name.</p>
                          <p class="text-muted">This page works best on a desktop or laptop computer.</p>
                        </div><!--end card body-->
                      </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
                  <div id="event-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-alert-modalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content modal-filled bg-danger">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="fill-danger-modalLabel">Are you Certain?</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                  <p>This will delete this Event and the associated Event Page from your site. Are you sure you want to do this?</p>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                  <button type="button" id="cfrm-edelete" class="btn btn-outline-light">Delete Event(s)</button>
                              </div>
                          </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  <!-- Delete Alert Modal -->
                  <!--begin buttons-->
                  <div class="row justify-content">

                            <div class="col-md-4">
                                    <a href="/admin/add_event_content" class="btn font-14 btn-outline-primary btn-block">
                                        <i class="mdi mdi-plus-circle-outline"></i> Add New Event
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
                       <!--begin Events Table-->
                       <!--This is supposed to be a datatable with the datatable JS working on it. -->
                  <div class="row mt-3">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="header-title mb-4">Events&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the events. You can search events by using the search box, and you choose how many events to see on this page. Click the Publish button to publish your events. To manage your events on a calendar click the Events Calendar link above."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                                  <?php if($this->session->flashdata('success_event')): ?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success_event') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                  <?php endif; ?>
                                  <table id="basic-datatable" class="table dt-responsive nowrap basic-datatable" width="100%">
                                      <thead>
                                          <tr>
                                              <th>Event</th>
                                              <th>Action</th>
                                              <th>Group</th>
                                              <th>Added By</th>
                                              <th>Status</th>
                                              <th>Date / Time</th>

                                          </tr>
                                      </thead>
                                      <!--this table has Dynamically populated information based on current events-->
                                      <tbody>
                                        <?php foreach ($events as $key => $row): ?>
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1"><h5><?php echo $row->event_title ?></h5>
                                                    <br>
                                                    <a href="#" data-toggle="modal" data-target="#rsvp-modal" class="btn btn-sm btn-primary btn-rounded" title="RSVPs">RSVPS</a>
                                                    <a href="#" data-toggle="modal" data-target="#invitemore-modal" class="btn btn-sm btn-info btn-rounded" title="Invite More">Invite More</a>
                                                </td>
                                                <td>
                                                <!--Dynamic to go to the Edit Modal for this Event-->
                                                    <a href="/admin/edit_event_content/<?php echo $row->event_id ?>" title="Edit"><i class="mdi mdi-pencil mdi-24px"></i></a>
                                                <!--Dynamic to go to the Delete Modal for this Event-->
                                                    <a href="#" id="event-delete" data-id = "<?= $row->event_id ?>"> <i class="mdi mdi-delete mdi-24px"></i></a>
                                                </td>
                                                <td>Members</td>
                                                <td><?php echo $row->event_host ?></td>
                                                <td>Upcoming</td>
                                                <td><?php echo $row->event_date ?></td>

                                            </tr>
                                        <?php endforeach ?>
                                      </tbody>
                                  </table>
                              </div> <!-- end card body-->
                          </div> <!-- end card -->
                      </div><!-- end col-->
                  </div>
                  <!-- end row-->
                                               <!-- RSVP Header Modal -->
                                        <div id="rsvp-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-colored-header bg-primary">
                                                        <h4 class="modal-title" id="info-header-modalLabel">Event R.S.V.P.s</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                <div class="modal-body">
                                                        <h5 class="mt-0">R.S.V.Ps</h5>
                                            <ul class="nav nav-tabs mb-3" role="tablist">
                                                <li class="nav-item">
                                                    <a href="#attending" data-toggle="tab" role="tab" aria-controls="attending" aria-expanded="true" class="nav-link active">
                                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                                    <span class="d-none d-lg-block">Attending</span>
                                                </a>
                                                </li>
                                                <li class="nav-item">
                                                <a href="#not-attending" data-toggle="tab" role="tab" aria-controls="not-attending" aria-expanded="false" class="nav-link">
                                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                                    <span class="d-none d-lg-block">Not Attending</span>
                                                </a>
                                             </li>
                                                <li class="nav-item">
                                                <a href="#maybe" data-toggle="tab" role="tab" aria-controls="maybe" aria-expanded="false" class="nav-link">
                                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                                    <span class="d-none d-lg-block">Maybe</span>
                                                </a>
                                                </li>
                                                <li class="nav-item">
                                                <a href="#no-reply" data-toggle="tab" role="tab" aria-controls="no-reply" aria-expanded="false" class="nav-link">
                                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                                    <span class="d-none d-lg-block">No Reply</span>
                                                </a>
                                                </li>
                                             </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active" id="attending" role="tabpanel" aria-labelledby="attending-tab">
                                                    <div class="table-responsive-sm">
                                                            <table class="table table-striped table-centered mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Attending</th>
                                                                        <th>Email</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="table-user"><!--Dynamically generated with Users Avatar and Users Name-->
                                                                            <img src="/assets/images/users/avatar-2.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Risa D. Pearson
                                                                        </td>
                                                                        <!--This should be a dynamically generated field with the User's email address-->
                                                                        <td>risa@email.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-3.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Ann C. Thompson
                                                                        </td>
                                                                        <td>user@email.com</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-4.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Paul J. Friend
                                                                        </td>
                                                                        <td>user@email.com</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-5.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Sean C. Nguyen
                                                                        </td>
                                                                        <td>user@email.com</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end table-responsive-->
                                                        <!--Dynamically Generated .csv file of table above-->
                                                        <p> <a href="#">Download CSV of List</a> </p>
                                                    </div><!--end tab pane-->
                                            </div><!--end tab content-->
                                            <div class="tab-content">
                                                <div class="tab-pane fade" id="not-attending" role="tabpanel" aria-labelledby="not-attending-tab">
                                                    <div class="table-responsive-sm">
                                                            <table class="table table-striped table-centered mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Not Attending</th>
                                                                        <th>Email</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="table-user"><!--Dynamically generated with Users Avatar and Users Name-->
                                                                            <img src="/assets/images/users/avatar-2.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Risa D. Pearson
                                                                        </td>
                                                                        <!--This should be a dynamically generated field with the User's email address-->
                                                                        <td>risa@email.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-3.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Ann C. Thompson
                                                                        </td>
                                                                        <td>user@email.com</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <!--if no image available use the icon-->
                                                                            <span class="mr-2 rounded-circle"><i class="fas fa-user mr-2 rounded-circle"></i></span>
                                                                            Sean C. Nguyen
                                                                        </td>
                                                                        <td>user@email.com</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end table-responsive-->
                                                        <!--Dynamically Generated .csv file of table above-->
                                                        <p> <a href="#">Download CSV of List</a> </p>
                                                </div><!--end tab pane-->
                                            </div><!--end tab content-->
                                            <div class="tab-content">
                                                <div class="tab-pane fade" id="maybe" role="tabpanel" aria-labelledby="maybe-tab">
                                                    <div class="table-responsive-sm">
                                                            <table class="table table-striped table-centered mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Maybe</th>
                                                                        <th>Email</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-3.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Ann C. Thompson
                                                                        </td>
                                                                        <td>user@email.com</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-4.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Paul J. Friend
                                                                        </td>
                                                                        <td>user@email.com</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-5.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Sean C. Nguyen
                                                                        </td>
                                                                        <td>user@email.com</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end table-responsive-->
                                                        <!--Dynamically Generated .csv file of table above-->
                                                        <p> <a href="#">Download CSV of List</a> </p>
                                                </div>
                                            </div><!--end tab content-->
                                            <div class="tab-content">
                                                <div class="tab-pane fade" id="no-reply" role="tabpanel" aria-labelledby="no-reply-tab">
                                                    <div class="table-responsive-sm">
                                                            <table class="table table-striped table-centered mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No Reply</th>
                                                                        <th>Email</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="table-user"><!--Dynamically generated with Users Avatar and Users Name-->
                                                                            <img src="/assets/images/users/avatar-2.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Risa D. Pearson
                                                                        </td>
                                                                        <!--This should be a dynamically generated field with the User's email address-->
                                                                        <td>risa@email.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-3.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Ann C. Thompson
                                                                        </td>
                                                                        <td>user@email.com</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-4.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Paul J. Friend
                                                                        </td>
                                                                        <td>user@email.com</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-user">
                                                                            <img src="/assets/images/users/avatar-5.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                                                            Sean C. Nguyen
                                                                        </td>
                                                                        <td>user@email.com</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end table-responsive-->
                                                        <!--Dynamically Generated .csv file of table above-->
                                                        <p> <a href="#">Download CSV of List</a> </p>
                                                    </div>
                                                </div><!--end tab content-->
                                            </div><!--end modal body-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-info">Save changes</button>
                                                    </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <!--begin Invite More Modal-->
                                <div id="invitemore-modal" class="modal fade" tabindex="-1" role="dialog"    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-info">
                                                    <h4 class="modal-title" id="info-header-modalLabel">Invite More People</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                            <div class="modal-body">
                                            <div class="form-group row mb-3">
                                                <div class="col-md-6">
                                                    <h5 class="mt-3">Let's Tell People About This Event</h5>
                                                    <p>You can either select people from the dropdown list below, or enter their email addresses followed by a comma to send the invitation email.</p>
                                                  <!--Custom list below is dynamic and site member names should appear in dropdown below-->
                                                  <label class="col-form-label" for="member-select">Invite Existing Members</label>
                                                  <select class="custom-select" id="member-select">
                                                        <option selected>Select Members</option>
                                                        <option value="member1">Harry Potter</option>
                                                        <option value="member2">Herminone Granger</option>
                                                        <option value="member3">Peter Pettigrew</option>
                                                        <option value="member3">Luna Lovegood</option>
                                                    </select>
                                                </div><!--end col-->
                                                <div class="col-md-6 mb-2">
                                                <div class="custom-control custom-radio mt-3">
                                                    <input type="radio" class="custom-control-input" name="RSVPradio" id="RSVPradio1">
                                                    <label class="custom-control-label" for="RSVPradio1">Request R.S.V.P. (Accept, Maybe, Decline) - Invitee List Public</label>
                                                </div>
                                                <div class="custom-control custom-radio mt-1">
                                                    <input type="radio" class="custom-control-input"  name="RSVPradio" id="RSVPradio2">
                                                    <label class="custom-control-label" for="RSVPradio2">Make R.S.V.P.s Private - Only Administrator sees them.</label>
                                                </div>
                                                <div class="mt-2">
                                                    <label class="col-form-label" for="event-subject">Event Invite Email Subject</label>
                                                    <input type="text" id="event-subject" name="event-subject" class="form-control" placeholder="Your Your Subject Here">
                                                </div>
                                              </div>
                                            </div><!--end form group row-->
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="emails-textarea">Enter Email Addresses</label>
                                                        <textarea class="form-control" id="emails-textarea" rows="5" placeholder="Enter the emails in this field like this: email@yoursite.com, another-email@yoursite.com, harrypotter@hogwarts.edu"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="emails-textarea">Event Invite Email Text</label><!--This should be a Froala Editor-->
                                                        <textarea class="form-control froala-container" id="emails-textarea" rows="5" placeholder="Enter the text for your Invitation Email here."></textarea>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </div> <!--end modal body-->
                                        <div class="modal-footer">
                                                <a href="#" data-toggle="modal" data-target="#email-preview" class="btn font-16 btn-outline-info">
                                                        <i class="mdi mdi-plus-circle-outline"></i> Preview Email
                                                    </a>
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-info">Send Invites</button>
                                            </div>
                                    </div> <!--end modal content-->
                                </div><!--end Modal dialog-->
                            </div><!--end modal-->
                            <!--<div class="row">
                        <div class="col">
                            <?php //echo $this->pagination->create_links(); ?>
                        </div>
                    </div>-->
                                    <!-- Modal -->
                                    <div id="email-preview" id="bottom-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="email-previewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-colored-header bg-warning">
                                                        <h4 class="modal-title" id="email-previewModalLabel">Email Preview</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="mt-0">You are Invited to our Fantastic Event</h5>
                                                        <p>Hello, support@boomity.com has invited you to an event.</p>
                                                        <p>Please reply to this email with your R.S.V.P.</p>
                                                        <dl class="row">
                                                            <dt class="col-sm-3">Event Title:</dt>
                                                            <dd class="col-sm-9">My Fantastic Event</dd><!--Dynamic Data from Event Title-->
                                                            <dt class="col-sm-3">Start Date / Time:</dt>
                                                            <dd class="col-sm-9">
                                                               07/24/2019 - 10:00am PST
                                                            </dd>
                                                            <dt class="col-sm-3">End Date / Time:</dt>
                                                            <dd class="col-sm-9">
                                                               07/24/2019 - 6:00am PST
                                                            </dd>
                                                            <dt class="col-sm-3">Organization:</dt>
                                                            <dd class="col-sm-9">SmashingConf SF</dd>
                                                            <dt class="col-sm-3">Location:</dt>
                                                            <dd class="col-sm-9">San Francisco Marriott Marquis</dd>
                                                            <dt class="col-sm-3">Event Address:</dt>
                                                            <dd class="col-sm-9">780 Mission St, San Francisco, CA 94103</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                </div><!--end container-->
    <!--end page content-->
