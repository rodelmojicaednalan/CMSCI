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
                    <li class="breadcrumb-item active">Newsletter Signup Widget</li>
                </ol>
            </div>
            <h4 class="page-title">Newsletter Signup Widget</h4>
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
               Newsletter Signup
              </h3>
              <p>Use this widget to create a small Newsletter Signup form for users to fill out so that their email address will be added to your email newsletter list.  You can add this widget to a webpage on your site.
                </p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Newsletter Signup Modal Preview modal content -->
  <div id="newslettersignup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Newsletter Signup</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">
                <div class="col m-auto">
                <form action="#" class="needs-validation" novalidate><!--This is how to style the Newsletter Signup-->
                <div class="input-group">
                    <input type="email" class="form-control" id="emailaddress" required aria-describedby="emailHelp" placeholder="Sign up for our Newsletter!">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter your email address.
                    </div>
                </div>
              </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div><!--end modal body-->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="row mt-2">
      <div class="col-10"><!--begin middle footer area-->
        <div class="card">
          <div class="card-body">
            <h2 class="header-title">
              Newsletter Signup Widget
            </h2>
            <form action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
              <label for="newslettersignup-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="newslettersignup-widgetname-input" class="form-control" placeholder="Widget Name" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
               <p class="mt-2">
               <label for="newslettersignup-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="newslettersignup-width-input" class="form-control" placeholder="300px" required>
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
              </p>
              <p class="mt-2">
                  <label for="newslettersignup-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="newslettersignup-ht-input" class="form-control" placeholder="200px" required>
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="newsletter-position-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="newsletter-position-select">
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
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck1">
                        <label class="custom-control-label" for="DisplayNameCheck1">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                  </div>
                  <div class="form-group"><!--PHP needed here-->
                    <label for="example-select">Email List&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the email list so users who fill out this form will be added. Your email lists are segments you set up in Marketing/Email Marketing."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <select class="form-control" id="example-select"><!--These choices should be dynamically generated based on the email lists available.-->
                        <option value="selected">Choose Email List</option>
                        <option>Email List</option>
                        <option>Email List</option>
                        <option>Email List</option>
                    </select>
                    <div class="invalid-feedback">
                        Please Select an email list.
                    </div>
                </div>
                  <!--here are the buttons-->
                      <div class="button-list text-right">
                          <button type="cancel" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#newslettersignup-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
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
