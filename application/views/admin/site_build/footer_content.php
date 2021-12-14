
<!--begin page content here-->
<div class="container-fluid">

    <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                            <li class="breadcrumb-item active">Footer</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Footer Content</h4>
                </div>
            </div>
    </div>   
  <div class="row">
      <div class="col-10">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">
                Customize Your Site's Footer
              </h3>
              <p>
                You can use this page to add or edit text to the Footer of your website. You can also choose to add text links and icon links to your social media profiles. You can use the WSIWG editor to style the text you add. 

              </p>
              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
              <p class="text-muted">This feature works best on laptop or desktop computers.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->

  <form id="frmFooterContent" method="post">
  

  <div class="row">
    <div class="col-10">
      <div class="card">
        <div class="card-body">
          <h2 class="header-title">
            Left Footer Area
          </h2>
          <!-- Froala, third party rich-text editor -->
          <div id="froala-editor">
          <?php echo (isset($data) && isset($data->leftFooterText) && $data->leftFooterText !== '') ? $data->leftFooterText : '<h5>Hello, </h5>
                              <p>If you click the Edit Footer button below you can add some custom text to your left footer area.</p>
                              <p>Use the editor to style your text or add an image.</p>
                              <p class="lead">Its a great idea to include a sentence or two about your company here. Make sure to delete this text!</p>'; ?>   
          </div>
          <input type="hidden" id="froalaHidden" class="leftFooterContents" name="leftFooterText">
          <p>
            <a id="froala-save" href="#" class="btn btn-success btn-sm mt-2" style="display: none;"><i class="mdi mdi-content-save-outline mr-1"></i> Save Changes</a>
            <a id="froala-edit" href="#" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil mr-1"></i> Edit Footer</a>
          </p>
        </div> <!--end card body-->
      </div> <!--end card-->
    </div><!--end col-->
    <div class="col-sm-4"><!--copyright cards-->
        <div class="card">
          <div class="card-body">
            <span class="form-group m-3">
                <span class="custom-control custom-checkbox">
                    <input type="checkbox" name="addcopyright" class="custom-control-input" id="copyrightCheck1" value="1" <?php echo (isset($data->addcopyright) && $data->addcopyright == 1) ? "checked=''" : ''; ?>>
                    <label class="custom-control-label" for="copyrightCheck1">Add Copyright?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then add your information in the Copyright Info field."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                </span>
              </span>
          </div>
        </div>  
    </div>
    <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <span class="form-group mb-3">
              <label for="copyright-input">Copyright Info&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the copyright info which will appear in the footer of your website. You make the 'circle c' by hitting option/G on a Mac and alt/G on a Windows computer."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
              <!--PHP HERE-->  <span id="year"></span><input type="text" name="copyrightinfo" id="copyright-input" class="form-control"  placeholder="© Your Company Name" value="<?php echo (isset($data) && isset($data->copyrightinfo) && $data->copyrightinfo !== '') ? $data->copyrightinfo : ''; ?>">
            </span>
          </div>
        </div>
      </div><!--end copyright cards-->
      <div class="col-10"><!--begin middle footer area-->
          <div class="card">
            <div class="card-body">
              <h2 class="header-title">
                Middle Footer Area
              </h2>
              <p class="card-text">Add links to your footer below. The links will only appear if you add a URL below.</p>
                <label for="privacypolicy-input">Privacy Policy Link&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Put in the full absolute URL link to your site's privacy policy. If you collect information from Users, this is required in the State of California."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" name="privacy" id="privacypolicy-input" class="form-control" placeholder="https://yourprivacypolicy.com" value="<?php echo (isset($data) && isset($data->privacy) && $data->privacy !== '') ? $data->privacy : ''; ?>">
                  <p class="mt-2">
                  <label for="termsofservice-input">Terms of Service Link&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Put in the full absolute URL link to your site's Terms of Service or Conditions. If you collect information from Users, this is required in the State of California."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" name="terms" id="termsofservice-input" class="form-control" placeholder="https://yourtermsofservicepage.com" value="<?php echo (isset($data) && isset($data->terms) && $data->terms !== '') ? $data->terms : ''; ?>">
                </p>
                <p class="mt-2">
                    <label for="contactus-input">Contact Us Link&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Put in the full absolute URL link to your site's Contact Us page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <!--PHP HERE--> <input type="text" name="contacus"  id="contactus-input" class="form-control" placeholder="https://yoursite.com/contactus" value="<?php echo (isset($data) && isset($data->contacus) && $data->contacus !== '') ? $data->contacus : ''; ?>">
                  </p>
                  <p class="mt-2">
                    <label for="customlink1-input">Custom Link 1 - Name&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Put in the name of a link to a page of your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <!--PHP HERE--> <input type="text" name="customlink1"  id="customlink1-input" class="form-control" placeholder="Custome Link 1 Name" value="<?php echo (isset($data) && isset($data->customlink1) && $data->customlink1 !== '') ? $data->customlink1 : ''; ?>">
                    </p>
                  <p class="mt-1">
                    <label for="customlink1-url-input">Custom Link 1&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Put in the full absolute URL to the page your listed above."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <!--PHP HERE--> <input type="text" name="customlink2" id="customlink1-url-input" class="form-control" placeholder="https://yoursite.com/customlink1"  value="<?php echo (isset($data) && isset($data->customlink2) && $data->customlink2 !== '') ? $data->customlink2 : ''; ?>">
                    </p>
                  <p class="mt-2">
                    <label for="customlink2-input">Custom Link 2 - Name&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Put in the name of a link to a page of your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <!--PHP HERE--> <input type="text" name="customlink3" id="customlink2-input" class="form-control" placeholder="Custome Link 2 Name"  value="<?php echo (isset($data) && isset($data->customlink3) && $data->customlink3 !== '') ? $data->customlink3 : ''; ?>">
                    </p>
                  <p class="mt-1">
                    <label for="customlink2-url-input">Custom Link 2&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Put in the full absolute URL to the page your listed above."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <!--PHP HERE--> <input type="text" name="customlink4" id="customlink2-url-input" class="form-control" placeholder="https://yoursite.com/customlink2"  value="<?php echo (isset($data) && isset($data->customlink4) && $data->customlink4 !== '') ? $data->customlink4 : ''; ?>">
                    </p>
            </div> <!--end card body-->
          </div> <!--end card-->
        </div><!--end col-->
        <div class="col-10"><!--begin right footer area-->
          <div class="card">
            <div class="card-body">
              <h2 class="header-title">
                Right Footer Area
              </h2>
              <!--This should add social media icons which match the user's website they should link to their social media page if a URL is entered.-->
              <p class="card-text">Add Social Media links to your footer below. The Social Media Icon links will only appear if you add URLs below.</p>
                <label for="twitter-input"><i class="fa fa-twitter"></i>&nbsp;&nbsp;Twitter</label>
                  <!--PHP HERE--> <input type="text" name="twitter" id="twitter-input" class="form-control" placeholder="https://twitter.com/yourusername"  value="<?php echo (isset($data) && isset($data->twitter) && $data->twitter !== '') ? $data->twitter : ''; ?>">
                  <p class="mt-2">
                  <label for="facebook-input"><i class="fa fa-facebook-square"></i>&nbsp;&nbsp;Facebook</label>
                  <!--PHP HERE--> <input type="text" name="facebook" id="facebook-input" class="form-control" placeholder="https://facebook.com/yourusername"  value="<?php echo (isset($data) && isset($data->facebook) && $data->facebook !== '') ? $data->facebook : ''; ?>">
                </p>
                <p class="mt-2">
                    <label for="instagram-input"><i class="fa fa-instagram"></i>&nbsp;&nbsp;Instagram</label>
                      <!--PHP HERE--> <input type="text" name="instagram" id="instagram-input" class="form-control" placeholder="https://instagram.com/yourusername"  value="<?php echo (isset($data) && isset($data->instagram) && $data->instagram !== '') ? $data->instagram : ''; ?>">
                  </p>
                  <p class="mt-2">
                    <label for="pinterest-input"><i class="fa fa-pinterest-square"></i>&nbsp;&nbsp;Pinterest</label>
                      <!--PHP HERE--> <input type="text" name="pinterest" id="pinterest-input" class="form-control" placeholder="https://pinterest.com/yourusername"  value="<?php echo (isset($data) && isset($data->pinterest) && $data->pinterest !== '') ? $data->pinterest : ''; ?>">
                    </p>
                  <p class="mt-2">
                    <label for="linkedin-url-input"><i class="fa fa-linkedin"></i>&nbsp;&nbsp;LinkedIn</label>
                      <!--PHP HERE--> <input type="text" name="linkedin" id="linkedin-input" class="form-control" placeholder="https://linkedin.com/yourusername"  value="<?php echo (isset($data) && isset($data->linkedin) && $data->linkedin !== '') ? $data->linkedin : ''; ?>">
                    </p>
                  <p class="mt-2">
                    <label for="youtube-input"><i class="fa fa-youtube"></i>&nbsp;&nbsp;YouTube</label>
                      <!--PHP HERE--> <input type="text" name="youtube" id="youtube-input" class="form-control" placeholder="https://youtube.com/yourusername"  value="<?php echo (isset($data) && isset($data->youtube) && $data->youtube !== '') ? $data->youtube : ''; ?>">
                    </p>
                  <p class="mt-2">
                    <label for="medium-input"><i class="fa fa-medium"></i>&nbsp;&nbsp;Medium</label>
                      <!--PHP HERE--> <input type="text" name="medium" id="medium-input" class="form-control" placeholder="https://medium.com/yourusername"  value="<?php echo (isset($data) && isset($data->medium) && $data->medium !== '') ? $data->medium : ''; ?>">
                    </p>
                  <p class="mt-2">
                    <label for="rss-input"><i class="fa fa-rss-square"></i>&nbsp;&nbsp;RSS</label>
                      <!--PHP HERE--> <input type="text" name="rss" id="rss-input" class="form-control" placeholder="your-rss-feed-link"  value="<?php echo (isset($data) && isset($data->rss) && $data->rss !== '') ? $data->rss : ''; ?>">
                    </p>
            </div> <!--end card body-->
          </div> <!--end card-->
        </div><!--end col-->
        
          <div class="col-10 mb-3">
            <div class="button-list">
            <div class="text-right">
                <button type="button" class="btn btn-lg btn-secondary" onClick="window.location.replace('<?php echo base_url('admin') ?>');">Cancel</button>
                <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#previewModal" id="btnPreview">Preview</button>
                <button type="button" class="btn btn-lg btn-primary" id="btnPublish">Publish</button>
              </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Footer preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="previewBody">
                <p><?php $this->load->view('admin/site_build/preview_footer.php'); ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <!--end row-->
  </div><!--end row-->

  </form>
</div><!--end container-->
<!--end page content-->
