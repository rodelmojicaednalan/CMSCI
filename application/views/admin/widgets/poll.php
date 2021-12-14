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
                    <li class="breadcrumb-item active">Poll Widget</li>
                </ol>
            </div>
            <h4 class="page-title">Poll Widget</h4>
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
                Poll Widget
              </h3>
              <p>
                  Use this widget to create a Poll for users to fill out on your website.  Click Add New Answer to add more answers to your poll. You can add this widget to a webpage on your site.
              </p>
              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
              <p class="text-muted">This feature works best on laptop or desktop computers.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Poll Modal Preview modal content -->
  <div id="poll-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Poll Widget</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"><!--This will need to be dynamic information based on their events.-->
                <!--dynamic php magic needed here-->
                <div class="col-sm">
                  <h3 class="header-title">Your Poll Title Here</h3><!--replace this with dynamic content-->
                  <p>
                  Share your opinion with us!</p>
                  <h3>Question here</h3>
                  <form action="">
                      <div class="mt-3">
                          <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio1">Answer 1</label>
                          </div>
                          <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio2">Answer 2</label>
                          </div>
                          <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio3">Answer 3</label>
                          </div>
                          <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio4">Answer 4</label>
                          </div>
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
              Poll Widget
            </h2>
            <form action="#"><!--Add the PHP to make this form work-->
              <label for="poll-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="poll-widgetname-input" class="form-control" placeholder="Widget Name">
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
               <div class="mt-2">
               <label for="poll-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="poll-width-input" class="form-control" placeholder="300px">
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
              </div>
              <div class="mt-2">
                  <label for="poll-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="poll-ht-input" class="form-control" placeholder="200px">
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                  </div>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="poll-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="poll-select">
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
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck9">
                        <label class="custom-control-label" for="DisplayNameCheck9">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
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
                    <input class="form-control jscolor" value="cccccc" id="bordercolor">
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
                <input type="checkbox" class="custom-control-input" id="background-question-color">
                <label class="custom-control-label" for="background-question-color">Background Question Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the background question color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <div class="mt-2">
                <input class="form-control jscolor" value="ab2567" id="background-question-color">
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
                <label class="custom-control-label" for="backgroundcolor">Background Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the background color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <div class="mt-2">
                <input class="form-control jscolor" value="ffffff" id="backgroundcolor">
                </div>
                </span>
            </div>
          </div>
        </div>
      </div><!--end color cards-->
</div><!--end row-->
<div class="row justify-content-lg-start">
    <div class="col-md-3"><!--colorcards-->
        <div class="card">
          <div class="card-body">
            <div class="form-group m-2">
                <span class="custom-control custom-checkbox"><!--PHP needed for this form entry-->
                    <input type="checkbox" class="custom-control-input" id="answer-text-color">
                    <label class="custom-control-label" for="answer-text-color">Answer Text Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the answer text color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <div class="mt-2">
                    <input class="form-control jscolor" value="000000" id="answer-text-color">
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
                <input type="checkbox" class="custom-control-input" id="linkcolor">
                <label class="custom-control-label" for="linkcolor">Link Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the link color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <div class="mt-2">
                <input class="form-control jscolor" value="ab2567" id="linkcolor">
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
                <input type="checkbox" class="custom-control-input" id="link-question-color">
                <label class="custom-control-label" for="link-question-color">Link Question Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the link question color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <div class="mt-2">
                <input class="form-control jscolor" value="ab2567" id="link-question-color">
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
               Poll Content
              </h2>
              <p class="card-text">Add a Question and the Answers for your users below. These answers will appear as radio buttons in the poll. If you leave a question blank, it will not add an extra question. To add more than four questions, click the Add Another Question button.</p>
              <div class="form-group mb-3">
                  <label for="question-textarea">Poll Question&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter in the question you would like your users to answer."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> </label>
                  <textarea class="form-control" id="question-textarea" rows="5"></textarea>
              </div>
                <label for="answer1-input">Poll Answer 1&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter in an answer to the question above."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" id="answer1-input" class="form-control" placeholder="Enter your Answer here">
                 <p class="mt-2">
                 <label for="answer2-input">Poll Answer 2&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you leave a form field blank then your poll will not display the answer."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" id="answer2-input" class="form-control" placeholder="Enter your Answer here">
                </p>
                <p class="mt-2">
                    <label for="answer3-input">Poll Answer 3</label>
                      <!--PHP HERE--> <input type="text" id="answer3-input" class="form-control" placeholder="Enter your Answer here">
                  </p>
                  <p class="mt-2">
                    <label for="answer4-input">Poll Answer 4</label>
                      <!--PHP HERE--> <input type="text" id="answer4-input" class="form-control" placeholder="Enter your Answer here">
                    </p>
                  <div class="col">
                <div class="mt-4">
                    <p>
                        <button class="btn btn-primary ml-1" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Add More Answers
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <p class="mt-2">
                            <label for="answer5-url-input">Poll Answer 5</label>
                            <!--PHP HERE--> <input type="text" id="answer5-input" class="form-control" placeholder="Enter your Answer here">
                          </p>
                          <p class="mt-2">
                              <label for="answer6-input">Poll Answer 6</label>
                                <!--PHP HERE--> <input type="text" id="answer6-input" class="form-control" placeholder="Enter your Answer here">
                              </p>
                        </div>
                    </div>
                </div> <!-- end .mb-4-->
            </div> <!-- end col -->
            </div> <!--end card body-->
          </div> <!--end card-->
        </div><!--end col-->
          <div class="col-10 mb-3">
             <!--here are the buttons-->
            <div class="button-list text-right">
              <button type="cancel" class="btn btn-lg btn-secondary">Cancel</button>
              <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#poll-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
              <button type="submit" class="btn btn-lg btn-primary">Create Widget</button>
            </div><!--this form is supposed to validate. -->
                  <!--end button div-->
                </form><!--end the form-->
           </div>
      <!--end row-->
  </div><!--end row-->
</div><!--end container-->
<!--end page content-->
