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
                                            <li class="breadcrumb-item active">Facebook Pixel</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Facebook Pixel</h4>
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
                              You can add your Facebook tracking pixel here. This tracks conversions through Facebook Ads. You obtain this code by logging into your account on <a href="https://www.facebook.com/business/learn/facebook-ads-pixel" title="Facebook Pixel Info">Facebook</a>.
                            </p>
                         <p>
                            For more information, read the guide on Facebook or through Google. 
                         </p>
                    <div class="col">
                      <!--Add you magic to make this form submit - this should add the Facebook Tracking Pixel to the Users website-->
                      <form action="" id="frmtrackingcode">
                          <div class="form-group mb-3">
                              <label for="example-textarea">Add the Facebook Pixel code below and hit Save.</label>
		              <input type="hidden" name="type" value="fbpixel" />
                              <textarea class="form-control" id="example-textarea" name="value" rows="15"><?php echo htmlentities($group_settings_obj->group_settings_tracking_code_fbpixel); ?></textarea>
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
