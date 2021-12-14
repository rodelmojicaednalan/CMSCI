<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                    <li class="breadcrumb-item"><a href="#">Widgets</a></li>
                    <li class="breadcrumb-item"><a href="#">Calls to Action</a></li>
                    <li class="breadcrumb-item active">PayPal Donation Button</li>
                </ol>
            </div>
            <h4 class="page-title">PayPal Donation Button</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="container-fluid">
  <div class="row">
      <div class="col-10">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">
              Pay Pal Donation Button
              </h3>
              <p>Use this widget to create a PayPal Donation Button for users to click and donate to your website.  A PayPal account is required to create this widget. You can add this widget to a webpage on your site. To get your PayPal API Signature Certificate please visit this page. <a href="https://www.paypal.com/us/smarthelp/article/how-do-i-request-api-signature-or-certificate-credentials-faq3196" title="PayPal Signature Certificate">https://www.paypal.com/us/smarthelp/article/how-do-i-request-api-signature-or-certificate-credentials-faq3196</a>
                </p>
                <p>After their donation, your users will be redirected back to the homepage of your website.</p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Blog Cat Modal Preview modal content -->
  <div id="paypal-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">PayPal Donation Widget</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body"><!--This will need to be dynamic information based on their events.-->
                  <!--dynamic php magic needed here-->
                  <div class="col-sm">
                    <h3 class="header-title">PayPal Button Preview</h3>
                    <!--Change this to the BOOMITY PayPal Account-->
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick" />
                        <input type="hidden" name="hosted_button_id" value="T47X9KMNGXGQS" />
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                        <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                        </form>
                </div> <!-- end col-->
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="row mt-2">
      <div class="col-10"><!--begin middle footer area-->
        <div class="card">
          <div class="card-body">
            <h2 class="header-title">
              PayPal Donation Widget
            </h2>
            <form action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
              <label for="paypal-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="paypal-widgetname-input" class="form-control" placeholder="Widget Name" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
               <p class="mt-2">
               <label for="paypal-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="paypal-width-input" class="form-control" placeholder="300px" required>
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
              </p>
              <p class="mt-2">
                  <label for="paypal-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="paypal-ht-input" class="form-control" placeholder="200px" required>
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="paypal-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="paypal-select">
                            <option selected>Choose one</option>
                            <option>Left</option>
                            <option>Middle</option>
                            <option>Right</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Position on Page.
                        </div>
                    </div>
                  </p>
                  <div class="mt-3 mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck9"><!--work your magic here-->
                        <label class="custom-control-label" for="DisplayNameCheck9">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                  </div>
                  <!--You may need to re-examine the PayPal API to configure this feature.-->
                  <p class="mt-2">
                      <label for="paypal-email-input">PayPal User Email&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the email address associated with your PayPal account."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                       <!--PHP HERE--> <input type="email" id="paypal-email-input" class="form-control" placeholder="user@example.com" required>
                       <div class="invalid-feedback">
                           Please provide your PayPal email.
                       </div>
                       <div class="valid-feedback">
                          Looks good!
                      </div>
                     </p>
                     <p class="mt-2">
                        <label for="paypal-password-input">PayPal Password&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the password you use to login to your company's PayPal account."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                         <!--PHP HERE--> <input type="password" id="paypal-password-input" class="form-control" placeholder="MyPassw0rd" required>
                         <div class="invalid-feedback">
                             Please provide your PayPal password.
                         </div>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                       </p>
                       <p class="mt-2">
                          <label for="paypal-signature-input">PayPal Signature Certificate&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can get your PayPal Signature Certificate by clicking on the link in the explanation above. You must be signed in to your PayPal account to get this certificate."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                           <!--PHP HERE--> <input type="text" id="paypal-signature-input" class="form-control" required>
                           <div class="invalid-feedback">
                               Please provide your PayPal signature certificate.
                           </div>
                           <div class="valid-feedback">
                              Looks good!
                          </div>
                         </p>
                  <!--here are the buttons-->
                      <div class="button-list text-right">
                          <button type="cancel" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#paypal-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
                          <button type="submit" class="btn btn-lg btn-primary" type="submit">Create Widget</button>
                      </div><!--this form is supposed to validate. -->
                  <!--end button div-->
                </form><!--end the form-->
          </div> <!--end card body-->
        </div> <!--end card-->
      </div><!--end col-->


  </div><!--end the row-->
</div>
<!--end page content-->
