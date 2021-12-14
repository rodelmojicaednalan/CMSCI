                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                            <li class="breadcrumb-item active">Google Tag Manager</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Google Tag Manager Code</h4>
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
                              You can add your Google Tag Manager Code to your site by entering it here. This allows you to quickly and easily update tracking codes and related code fragments collectively known as tags to your website by using the Google Tag Manager Tool on Google. You obtain this code by logging into your&nbsp;<a href="https://accounts.google.com/signin/v2/identifier?service=analytics&passive=1209600&continue=https%3A%2F%2Ftagmanager.google.com%2F&followup=https%3A%2F%2Ftagmanager.google.com%2F&flowName=GlifWebSignIn&flowEntry=ServiceLogin" title="Google Tag Manager">Google Tag Manager</a> account.
                            </p>
                         <p>
                            For more information, read the guide on <a href="https://support.google.com/tagmanager/answer/6102821?hl=en" title="Google Tag Manager Guide">Google.</a>  
                         </p>
                    <div class="col">
                      <!--Add you magic to make this form submit - this should add the Google Tag Manager Tracking Code to the Users website-->
                      <form action="" id="frmtrackingcode">
                          <div class="form-group mb-3">
                              <label for="example-textarea">Add the Google Analytics tracking code below and hit Save.</label>
			      <input type="hidden" name="type" value="googletagmanager" />
                              <textarea name="value" class="form-control" id="example-textarea" rows="15"><?php echo htmlentities($group_settings_obj->group_settings_tracking_code_googletagmanager); ?></textarea>
                          </div>
                          <div class="d-print-none mt-4">
                              <div class="text-right">
                                  <button type="reset" class="btn btn-secondary">Cancel</button>&nbsp;&nbsp;
                                  <!--<button type="submit" class="btn btn-info">Save Draft</button>&nbsp;&nbsp;-->
                                  <button type="button" class="btn btn-primary save-tracking-code">Save</button>
                              </div>
                          </div> 
                      </form>
                    </div>
                  </div>
                </div>
                <!--end page content-->
