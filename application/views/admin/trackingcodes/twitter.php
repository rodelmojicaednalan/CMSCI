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
                                            <li class="breadcrumb-item active">Twitter Tag Manager</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Twitter Tag Manager Code</h4>
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
                              You can add your Twitter Tag Manager Code to your site by entering it here. This allows you to track Twitter ads and Tweets that lead to your website by using the Twitter Tag Manager. You obtain this code by logging into your&nbsp;<a href="https://business.twitter.com/en/help/campaign-measurement-and-analytics/conversion-tracking-for-websites.html" title="Twitter Tag Manager">Twitter Tag Manager</a> account.
                            </p>
                            <p>This is a two step process. First you must set everything up in your Twitter for Business acccount, then you place your Twitter Pixel / Tag here. This will allow you to start measuring conversions. We call this code snippet a website tag. On other ad platforms, the website tag is commonly referred to as a tracking script or a “pixel.”

                                Twitter’s conversion tracking for websites includes powerful capabilities to let you track conversions cross-device. For example, website conversions from users who view your Promoted Tweet on their mobile device, then convert on their home computer, can be attributed to your campaign performance. Advertisers that completely integrate the Twitter Universal Website Tag across all their site pages give Twitter more touch points with their site visitors and increase the likelihood that Twitter can report accurate cross-device conversions.</p>
                    <div class="col">
                      <!--Add you magic to make this form submit - this should add the Google Tag Manager Tracking Code to the Users website-->
                      <form action="" id="frmtrackingcode">
                          <div class="form-group mb-3">
                              <label for="example-textarea">Add the Twitter Tag tracking code below and hit Save.</label>
		              <input type="hidden" name="type" value="twitter" />
                              <textarea class="form-control" id="example-textarea" name="value" rows="15"><?php echo htmlentities($group_settings_obj->group_settings_tracking_code_twitter); ?></textarea>
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
