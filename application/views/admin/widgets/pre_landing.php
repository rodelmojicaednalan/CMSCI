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
                    <li class="breadcrumb-item active">Prelanding Page</li>
                </ol>
            </div>
            <h4 class="page-title">Prelanding Page Widget</h4>
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
                Prelanding Page Widget
              </h3>
              <p>
                  Use this widget to create a Pop-up that appears when the user clicks on a link to a Landing Page.  You can add this widget to a Landing Page you create on your site. To create a Landing Page choose <a href="marketing-landing.html" title="Landing Pages">Marketing/Landing Pages</a> from the menu at left.
              </p>
              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
              <p class="text-muted">This feature works best on laptop or desktop computers.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Prelanding Page Modal Preview modal content -->
  <div id="prelanding-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Prelanding Page Widget</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"><!--This will need to be dynamic information based on their events.-->
                <!--dynamic php magic needed here-->
                <div class="col-sm">
                  <h3 class="header-title">Your Title Here</h3><!--replace this with dynamic content-->
                  <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, enim.</p>
                  <form action="">
                      <div class="form-group mb-3">
                          <label for="simpleinput">Email Address</label>
                          <input type="text" id="simpleinput" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                          <label for="simpleinput">Name</label>
                          <input type="text" id="simpleinput" class="form-control">
                      </div>
                      <div class="button-list text-right">
                          <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                      </div>
                  </form>
              </div> <!-- end col-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--end modal begin content-->
  <div class="row">
      <div class="col-10"><!--begin widget name and details area-->
        <div class="card">
          <div class="card-body">
            <h2 class="header-title">
              Prelanding Page Widget
            </h2>
            <form action="#"><!--Add the PHP to make this form work-->
              <label for="landingpage-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="landingpage-widgetname-input" class="form-control" placeholder="Widget Name">
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
               <div class="mt-2">
               <label for="landingpage-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="landingpage-width-input" class="form-control" placeholder="300px">
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
              </div>
              <div class="mt-2">
                  <label for="landingpage-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="landingpage-ht-input" class="form-control" placeholder="200px">
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                  </div>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="landingpage-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="landingpage-select">
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
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck10">
                        <label class="custom-control-label" for="DisplayNameCheck10">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                </div>
            </div><!--end card body-->
          </div><!--end card-->
      </div><!--end col-->
<div class="container-fluid">
  <div class="row justify-content-lg-start">
    <div class="col-10"><!--colorcards-->
        <div class="card">
          <div class="card-body">
              <h2 class="header-title">
                  Prelanding Page Content
                 </h2>
            <div class="form-group mt-2">
                    <label for="landingpage-textarea">Landing Page Copy&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the explanation of your Prelanding page questions."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <textarea class="form-control" id="landingpage-textarea" rows="5"></textarea>
            </div>
                <div class="form-group mt-2"><!--PHP needed here-->
                  <label for="landingpage2-select">Landing Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose a Landing Page from your existing Landing Pages. If you haven't created a Landing Page yet, go to Marketing/Landing Pages from the navigation menu at left."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <select class="form-control" id="landingpage2-select" required>
                      <option selected>Choose one</option><!--THis should be dynamic content based on the site's landing pages. -->
                      <option>Landing Page 1</option>
                      <option>Landing Page 2</option>
                      <option>Landing Page 3</option>
                  </select>
                  <div class="invalid-feedback">
                      Please Select the Landing Page.
                  </div>
              </div>
              <div class="form-group mt-2"><!--PHP needed here-->
                <label for="landingpage-input-select">Landing Page Input&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="The Landing Page Input Choices are based on the Form Fields that can be found on the Landing Page that is chosen."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <select class="form-control" id="landingpage-input-select">
                    <option selected>Choose one</option><!--THis should be dynamic content based on the site's landing pages. -->
                    <option>Landing Page Input 1</option>
                    <option>Landing Page Input 2</option>
                    <option>Landing Page Input 3</option>
                </select>
            </div>
              <div class="form-group mb-3">
                  <label for="prelanding-palaceholder">Form Field&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Add a question for your users or a field to collect their email address or other information."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <input type="text" id="prelanding-palaceholder" class="form-control" placeholder="Add a Form Field title.">
              </div>
              <div class="col">
                  <div class="mb-4">
                      <p>
                          <button class="btn btn-primary ml-1" type="button" data-toggle="collapse" data-target="#collapseFormField" aria-expanded="false" aria-controls="collapseFormField">
                              Add Another Form Field
                          </button>
                      </p>
                      <div class="collapse" id="collapseFormField">
                          <div class="form-group mb-3">
                              <label for="prelanding2-palaceholder">Form Field 2&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Add a question for your users or a field to collect their email address or other information."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <input type="text" id="prelanding2-palaceholder" class="form-control" placeholder="Add a Form Field title.">
                          </div>
                          <div class="form-group mb-3">
                              <label for="prelanding3-palaceholder">Form Field 3&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Add a question for your users or a field to collect their email address or other information."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <input type="text" id="prelanding3-palaceholder" class="form-control" placeholder="Add a Form Field title.">
                          </div>
                          <div class="form-group mb-3">
                              <label for="prelanding4-palaceholder">Form Field 4&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Add a question for your users or a field to collect their email address or other information."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <input type="text" id="prelanding4-palaceholder" class="form-control" placeholder="Add a Form Field title.">
                          </div>
                      </div>
                  </div> <!-- end .mb-4-->
              </div> <!-- end col -->
              <div class="form-group mb-3">
                  <label for="prelanding-button">Submit Button Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the text that will appear on your Submit button."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <input type="text" id="prelanding-button" class="form-control" placeholder="Submit">
              </div>

          </div><!--end card body-->
        </div> <!--end card-->
    </div><!--end col-->
</div><!--end row-->
</div>
          <div class="col-10 mb-3">
             <!--here are the buttons-->
            <div class="button-list text-right">
              <button type="cancel" class="btn btn-lg btn-secondary">Cancel</button>
              <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#prelanding-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
              <button type="submit" class="btn btn-lg btn-primary">Create Widget</button>
            </div><!--this form is supposed to validate. -->
                  <!--end button div-->
                </form><!--end the form-->
           </div>
      <!--end row-->
  </div><!--end row-->
</div><!--end container-->
<!--end page content-->
