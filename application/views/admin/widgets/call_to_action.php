<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                    <li class="breadcrumb-item"><a href="#">Widgets</a></li>
                    <li class="breadcrumb-item"><a href="#">Call to Action</a></li>
                    <li class="breadcrumb-item active">Call to Action Widget</li>
                </ol>
            </div>
            <h4 class="page-title">Call to Action Widget</h4>
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
                Call to Action Widget
              </h3>
              <p>
                Use this widget to create a form for users to fill out.  This could be a survey or questionairre for your users. You can add this widget to a webpage on your site. To preview your widget click the Preview button.
              </p>
              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
              <p class="text-muted">This feature works best on laptop or desktop computers.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Call to Action Modal Preview modal content -->
  <div id="calltoaction-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Call to Action Widget</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"><!--This will need to be dynamic information based on their events.-->
                <!--dynamic php magic needed here-->
                <div class="col-sm">
                  <h3 class="header-title">Your Form Title Here</h3><!--replace this with dynamic content-->
                  <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem delectus vitae aliquam ab nostrum quisquam rem eveniet, at adipisci aperiam ipsam perferendis modi sint quo provident veniam natus, aut culpa impedit.</p>
                  <form action="">
                        <div class="form-group mb-3">
                                <label for="simpleinput">Question 1</label>
                                <input type="text" id="simpleinput" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="simpleinput">Question 2</label>
                                    <input type="text" id="simpleinput" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                        <label for="simpleinput">Question 3</label>
                                        <input type="text" id="simpleinput" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                            <label for="simpleinput">Question 4</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                                <label for="simpleinput">Question 5</label>
                                                <input type="text" id="simpleinput" class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                    <label for="simpleinput">Question 6</label>
                                                    <input type="text" id="simpleinput" class="form-control">
                                                </div>
                                                <div class="button-list">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
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
              Call to Action Widget
            </h2>
            <form action="#"><!--Add the PHP to make this form work-->
              <label for="text-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="text-widgetname-input" class="form-control" placeholder="Widget Name">
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
               <div class="mt-2">
               <label for="text-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="text-width-input" class="form-control" placeholder="300px">
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
              </div>
              <div class="mt-2">
                  <label for="text-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="text-ht-input" class="form-control" placeholder="200px">
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                  </div>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="text-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="text-select">
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
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck6">
                        <label class="custom-control-label" for="DisplayNameCheck6">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                </div>
            </div><!--end card body-->
          </div><!--end card-->
      </div><!--end col-->
<div class="container-fluid">
  <div class="row justify-content-lg-start">
    <div class="col-md-3"><!--colorcards-->
        <div class="card">
          <div class="card-body">
            <div class="form-group m-2">
                <span class="custom-control custom-checkbox"><!--PHP needed for this form entry-->
                    <input type="checkbox" class="custom-control-input" id="bordercolor">
                    <label class="custom-control-label" for="bordercolor">Border Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the border color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <div class="mt-2">
                    <input class="form-control jscolor" value="ab2567" id="bordercolor">
                  </div>
                </span>
              </div>
          </div>
        </div>
    </div>
    <div class="col-md-4"><!--color cards-->
      <div class="card">
        <div class="card-body">
          <div class="form-group m-2">
                <span class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="textcolor">
                <label class="custom-control-label" for="textcolor">Text Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the background color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <div class="mt-2">
                <input class="form-control jscolor" value="ab2567" id="textcolor">
                </div>
                </span>
            </div>
        </div>
      </div>
  </div>
    <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="form-group m-2">
                <span class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="backgroundcolor">
                <label class="custom-control-label" for="backgroundcolor">Background Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the text color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <div class="mt-2">
                <input class="form-control jscolor" value="ab2567" id="backgroundcolor">
                </div>
                </span>
            </div>
          </div>
        </div>
      </div><!--end color cards-->
</div><!--end row-->
</div>
      <div class="col-10"><!--begin middle area-->
          <div class="card">
            <div class="card-body">
              <h2 class="header-title">
               Form Content
              </h2>
              <p class="card-text">Add Questions for you Users to Answer below.</p>
                <label for="field1-input">Form Field 1&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter in any survey question you would like your users to answer here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" id="field1-input" class="form-control" placeholder="Enter your Question here">
                 <p class="mt-2">
                 <label for="field2-input">Form Field 2&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you leave a form field blank then your questionairre will not display the question."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" id="field2-input" class="form-control" placeholder="Enter your Question here">
                </p>
                <p class="mt-2">
                    <label for="field3-input">Form Field 3</label>
                      <!--PHP HERE--> <input type="text" id="field3-input" class="form-control" placeholder="Enter your Question here">
                  </p>
                  <p class="mt-2">
                    <label for="field4-input">Form Field 4</label>
                      <!--PHP HERE--> <input type="text" id="field4-input" class="form-control" placeholder="Enter your Question here">
                    </p>
                  <p class="mt-1">
                    <label for="field5-url-input">Form Field 5</label>
                      <!--PHP HERE--> <input type="text" id="field5-input" class="form-control" placeholder="Enter your Question here">
                    </p>
                  <p class="mt-2">
                    <label for="field6-input">Form Field 6</label>
                      <!--PHP HERE--> <input type="text" id="field6-input" class="form-control" placeholder="Enter your Question here">
                    </p>

            </div> <!--end card body-->
          </div> <!--end card-->
        </div><!--end col-->
        <div class="col-10"><!--begin right footer area-->
          <div class="card">
            <div class="card-body">
              <h2 class="header-title">
                Add Content to Your Form
              </h2>
              <!--This should add social media icons which match the user's website they should link to their social media page if a URL is entered.-->
              <div class="m-2"><!--text editor - use this or add Froala code-->
                <!--This is another editor - you can actually use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
              <div id="summernote-editmode">
                   <p>If you click the Add Text button below you can add some custom text to survey or questionairre.</p>
                   <p>Use the editor to style your text or add an image.</p>
                   <p class="lead">Make sure to delete this text!</p>
              </div>
                    <button id="summernote-edit" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil mr-1"></i>Add Text</button>
                    <button id="summernote-save" class="btn btn-success btn-sm mt-2" style="display: none;"><i class="mdi mdi-content-save-outline mr-1"></i> Save Changes</button>
              </div><!--end text editor-->
              <h2 class="header-title mt-4"> Add an image to your form</h2>
              <p class="mt-2">
                <label for="field6-input">Image Name</label><!--this should also be the ALT tag of the image uploaded below-->
                  <!--PHP HERE--> <input type="text" id="field6-input" class="form-control" placeholder="Name Your Image Here">
                </p>
             <div class="text-center border p-4">
                    <form action="/" method="post" class="dropzone" id="calltoactionDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                        data-upload-preview-template="#uploadPreviewTemplate">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                        <div class="dz-message needsclick">
                            <i class="h1 text-muted dripicons-cloud-upload"></i>
                            <h3>Drop files here or click to upload.</h3>
                        </div>
                    </form>
                </div><!--end dropzone-->
                <h2 class="header-title mt-4">Form Thank You</h2>
                <p>Add a thank you message for people who have filled out your form. This will appear on the page after the User hits submit for your form. You can also send them a Thank You email which can be styled below.</p>
                <div class="m-2"><!--text editor - use this or add Froala code-->
                    <!--This is another editor - you can use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
                  <div id="summernote-editmode">
                       <p>If you click the Add Text button below you can add some custom text to your Thank You Page.</p>
                       <p>Use the editor to style your text or add an image.</p>

                  </div><!--This isn't working now - use Froala Text Editor here-->
                        <button id="thankyou-edit" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil mr-1"></i>Add Text</button>
                        <button id="thankyou-save" class="btn btn-success btn-sm mt-2" style="display: none;"><i class="mdi mdi-content-save-outline mr-1"></i> Save Changes</button>
                  </div><!--end text editor-->
                  <div class="m-2">
                        <h2 class="header-title mt-4">Form Email Thank You</h2>
                        <!--text editor - use this or add Froala code-->
                    <!--This is another editor - you can  use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
                  <div id="summernote2-editmode"><!--This isn't working now - use Froala Text Editor here-->
                       <p>If you click the Add Text button below you can add some custom text to your Thank You Email.</p>
                       <p>Use the editor to style your text or add an image.</p>

                  </div>
                        <button id="summernote2-edit" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil mr-1"></i>Add Text</button>
                        <button id="summernote2-save" class="btn btn-success btn-sm mt-2" style="display: none;"><i class="mdi mdi-content-save-outline mr-1"></i> Save Changes</button>
                  </div><!--end text editor-->
            </div> <!--end card body-->
          </div> <!--end card-->
        </div><!--end col-->

          <div class="col-10 mb-3">
             <!--here are the buttons-->
            <div class="button-list text-right">
              <button type="cancel" class="btn btn-lg btn-secondary">Cancel</button>
              <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#calltoaction-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
              <button type="submit" class="btn btn-lg btn-primary">Create Widget</button>
            </div><!--this form is supposed to validate. -->
                  <!--end button div-->
                </form><!--end the form-->
           </div>


      <!--end row-->
  </div><!--end row-->
</div><!--end container-->
<!--end page content-->
