<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Admin - Communication</li>
                    </ol>
                </div>
                <h4 class="page-title">Admin - Communication</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
</div> <!-- container -->

<div class="container">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">
                        Communication
                      </h4>
                      <div class="text-muted">
                          <p>
                            Use this page to set up the default email addresses for your website. You can also select the default email address for your newsletter subscription form and for website members. You can also set up a welcome message which will appear in the email sent to users after they sign-up to receive emails from you.
                          </p>
                          <p>
                            Click the Question mark in the circle for further explanation on how to use a feature.
                          </p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-10">
             <!--define the form action below-->
             <!--begin page form-->
             <form id="frmcommunications" action="/admin/general_settings" method="POST">
                <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <p class="form-group mb-3">
                                <label for="from-email-input">From Field Email&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the email address that will appear in the FROM field in emails that are sent out by your website or newsletter."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                <!--PHP HERE--><input type="text" name="group_settings_from_email" value="<?=isset($group_settings_obj->group_settings_from_email)?$group_settings_obj->group_settings_from_email:''?>" id="from-email-input" class="form-control" placeholder="email@yoursite.com">
                            </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                              <div class="card-body">
                                          <span class="form-group m-3">
                                              <label for="contact-email-input">Contact Us Email&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the email mailbox that will receive emails from the website's Contact Us Form."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                             <!--PHP HERE--> <input type="text" name="group_settings_contact_us_email" value="<?=isset($group_settings_obj->group_settings_contact_us_email)?$group_settings_obj->group_settings_contact_us_email:''?>" id="contact-email-input" class="form-control" placeholder="contact@yoursite.com">
                                            </span>
                            </div>
                          </div>
                      </div>
                    </div><!--end row-->
        <!--begin Redirect Page Card-->
        <div class="row">
            <div class="col">
                <div class="card border">
                    <div class="card-body">
                        <h5 class="card-title">Redirect Page After Login &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Info here"><i class="dripicons mdi mdi-help-circle-outline"></i></a></h5>
                        <p class="card-text">Choose the page site members will see after they login.</p><br>
                        <span class="form-group mb-3">
                            <label for="loginpage-select">Pick a Webpage</label>

                            <select name="group_settings_redirect_to_after_login" class="form-control" id="loginpage-select">
                              <?php
                                    if($pages !== false){
                                      echo "<option ".($group_settings_obj->group_settings_redirect_to_after_login == 'prevpage' ? 'SELECTED' : '')." value=\"prevpage\">[Previous Page Before Login]</option>\n";
                                      foreach($pages as $page){
                                        echo "<option value=\"".$page->page_url_alias."\" ";
                                        if($page->page_url_alias == $group_settings_obj->group_settings_redirect_to_after_login)
                                          echo "SELECTED";
                                        echo ">".htmlentities($page->page_title)."</option> \n";
                                      }
                                    }
                              ?>
                            </select>

                        </span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border">
                    <div class="card-body">
                        <h5 class="card-title">Opt-in Email List for User Registration &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Info here"><i class="dripicons mdi mdi-help-circle-outline"></i></a></h5>
                        <p class="card-text">This is the email newsletter list that a User will be added to after they register to become a member of your website.</p>
                        <span class="form-group mb-3">
                            <label for="loginpage-select">Pick a Segment</label>
                            <!--PHP NEEDED HERE this should be automatically generated based on the email segments-->
                            <select name="group_settings_default_mailinglist_id" class="form-control" id="loginpage-select">
                                <option>Segment1</option>
                                <option>Newsletter1</option>
                                <option>Segment2</option>
                                <option>Segment3</option>
                                <option>Segment4</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <div class="container"><!--begin container-->
            <div class="row"><!--begin row-->
                <div class="col-12">
                    <h4>Email Lists for Newsletter Signup&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can choose more than one, these are the Segments that you can find in the Email Marketing area."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                    <p>Select the email list or lists where Users will be registered when they fill out the Newsletter Sign-up form.</p>
                </div>
                <!--The Checkboxes here should reflect the actual number of segments. As segments are added the checkboxes should automatically be added here-->
                <div class="col-md-6">
                        <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <!--This should be PHP for the site's ACTUAL newsletter segment lists-->
                                    <input name="group_settings_mailinglist_id[]" type="checkbox" class="custom-control-input" id="segmentCheck1">
                                    <label class="custom-control-label" for="segmentCheck1">Newsletter1</label>
                                </div>
                            </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->
        <p>&nbsp;</p>
        <div class="container"><!--begin container-->
            <div class="row"><!--being row-->
                <div class="col">
                    <div class="card bg-light">
                        <div class="card-body">
                                <h4 class="header-title">Site Membership Welcome</h4>

                                <p class="text-muted font-14 mb-3">This is the welcome email that users will receive after they register as Members with your site.</p>

                                <div class="col-sm-12">
                                  <span class="form-group m-12">
                                      <label for="group_settings_welcome_email_subject">Email Subject&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the email Subject"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                     <!--PHP HERE--> <input type="text" name="group_settings_welcome_email_subject" value="<?=isset($group_settings_obj->group_settings_welcome_email_subject)?$group_settings_obj->group_settings_welcome_email_subject:''?>" class="form-control" placeholder="">
                                    </span>
                                </div>

                                <div class="col-sm-12">
                                  <span class="form-group m-12">
                                      <label for="group_settings_welcome_email_content">Email Body&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the email body"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                      <textarea name="group_settings_welcome_email_content" id="group_settings_welcome_email_content" cols="100" rows="10" placeholder=""><?=isset($group_settings_obj->group_settings_welcome_email_content)?$group_settings_obj->group_settings_welcome_email_content:''?></textarea>
                                  </span>
                                </div>

                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->
                <div class="d-print-none mt-4">
                        <div class="text-right">
                            <button type="button" onclick="window.location='/admin';" class="btn btn-secondary">Cancel</button>&nbsp;&nbsp;
                            <!--<button type="submit" class="btn btn-info">Save Draft</button>&nbsp;&nbsp;-->
                            <button type="button" class="btn btn-primary save-settings-communications">Save</button>
                        </div>
                    </div>
             </div>
            </form><!--end page form-->
        </div><!--end col 10 div-->
    </div> <!--end row-->
