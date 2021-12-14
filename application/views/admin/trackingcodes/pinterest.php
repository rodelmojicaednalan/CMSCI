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
                                            <li class="breadcrumb-item active">Pinterest Tag Manager</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Pinterest Tag Manager Code</h4>
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
                              You can add your Pinterest Tag Manager Code to your site by entering it here. This allows you to track Pinterest ads and Pins that lead to your website by using the Pinterest Tag Manager. You obtain this code by logging into your&nbsp;<a href="https://help.pinterest.com/en/business/article/track-conversions-with-pinterest-tag" title="Pinterest Tag Manager">Pinterest Tag Manager</a> account.
                            </p>
                    <div class="col">
                      <!--Add you magic to make this form submit - this should add the Google Tag Manager Tracking Code to the Users website-->
                      <form action="" id="frmtrackingcode">
                          <div class="form-group mb-3">
                              <label for="example-textarea">Add the Pinterest Tag tracking code below and hit Save.</label>
			      <input type="hidden" name="type" value="pinterest" />
                              <textarea name="value" class="form-control" id="example-textarea" rows="15"><?php echo htmlentities($group_settings_obj->group_settings_tracking_code_twitter); ?></textarea>
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
