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
                    <li class="breadcrumb-item active">RSS Widget</li>
                </ol>
            </div>
            <h4 class="page-title">RSS Widget</h4>
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
                RSS Widget
              </h3>
              <p>
                  Use this widget to create an RSS feed from your site's blog posts, recipes, or job listings.  You can add this widget to a Page on your site.
              </p>
              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
              <p class="text-muted">This feature works best on laptop or desktop computers.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- RSS Modal Preview modal content -->
  <div id="rss-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">RSS Widget</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"><!--This will need to be dynamic information based on their events.-->
                <!--dynamic php magic needed here-->
                <div class="col-sm">
                  <h3 class="header-title">Your RSS Feed Title Here</h3><!--replace this with dynamic content-->
                      <div class="mt-3">
                          <p><a href="#">Feed Content here</a></p>
                          <p><a href="#">Lorem ipsum dolor sit amet.</a></p>
                          <p><a href="#">Lorem ipsum dolor sit amet.</a></p>
                          <p><a href="#">Lorem ipsum dolor sit amet.</a></p>
                          <p><a href="#">Lorem ipsum dolor sit amet.</a></p>
                          <p><a href="#">Lorem ipsum dolor sit amet.</a></p>
                          <p><a href="#">Lorem ipsum dolor sit amet.</a></p>
                      </div>
              </div> <!-- end col-->
            </div><!--end body-->
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
              RSS Widget
            </h2>
            <form action="#"><!--Add the PHP to make this form work-->
              <label for="rss-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="rss-widgetname-input" class="form-control" placeholder="Widget Name">
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
               <div class="mt-2">
               <label for="rss-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="rss-width-input" class="form-control" placeholder="300px">
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
              </div>
              <div class="mt-2">
                  <label for="rss-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="rss-ht-input" class="form-control" placeholder="200px">
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                  </div>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="rss-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="rss-select">
                            <option selected>Choose one</option>
                            <option>Left</option>
                            <option>Middle</option>
                            <option>Right</option>
                        </select>
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
      <div class="row">
      <div class="col-10">
        <div class="card">
          <div class="card-body">

          </div>
        </div>
      </div><!--end col-->
    </div><!--end row-->
<div class="container-fluid">
  <div class="row">
    <div class="col-10"><!--begin middle area-->
          <div class="card">
            <div class="card-body">
              <h2 class="header-title">
               RSS Content
              </h2>
                <div class="form-group mt-3">
                  <label for="rss-ht-input">Limit&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is number of posts to show. It is the number of items that will publish in your feed."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="rss-ht-input" class="form-control" placeholder="5">
                  </div>
                  <div class="form-group mt-3"><!--PHP needed here-->
                    <label for="rss-cat-select">Category to Show&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="CHoose from your site's blog, recipe or job listings categories."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <select class="form-control" id="rss-cat-select">
                        <option selected>Choose one</option><!--this should be dynamic content based on the categories-->
                        <option>Category 1</option>
                        <option>Category 2</option>
                        <option>Category 3</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="rss-term-input">Filter Term for Feed&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you'd like the RSS feed to filter for a specific word, then enter it here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <!--PHP HERE--> <input type="text" id="rss-term-input" class="form-control" placeholder="Leave blank if no filter term.">
                </div>
        </div> <!--end card body-->
    </div> <!--end card-->
  </div><!--end col-->
</div><!--end row-->
  <div class="row justify-content-lg-start">
      <div class="col-md-5"><!--colorcards-->
          <div class="card">
            <div class="card-body">
              <div class="form-group m-2">
                  <span class="custom-control custom-checkbox"><!--PHP needed for this form entry-->
                      <input type="checkbox" class="custom-control-input" id="answer-text-color">
                      <label class="custom-control-label" for="rss-bkgd-color">Background Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color for the color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <div class="mt-2">
                      <input class="form-control jscolor" value="000000" id="rss-bkgd-color">
                    </div>
                  </span>
                </div>
            </div>
          </div>
      </div>
      <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <div class="form-group m-2">
                  <span class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="link-question-color">
                  <label class="custom-control-label" for="rss-border-color">Border Color&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check this box then click on the box below to choose a color to change the border color of your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <div class="mt-2">
                  <input class="form-control jscolor" value="ab2567" id="rss-border-color">
                  </div>
                  </span>
              </div>
            </div>
          </div>
        </div><!--end color cards-->
    </div><!--end row-->
  <div class="row">
          <div class="col-10 mb-3">
             <!--here are the buttons-->
            <div class="button-list text-right">
              <button type="cancel" class="btn btn-lg btn-secondary">Cancel</button>
              <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#rss-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
              <button type="submit" class="btn btn-lg btn-primary">Create Widget</button>
            </div><!--this form is supposed to validate. -->
                  <!--end button div-->
                </form><!--end the form-->
           </div>
      <!--end row-->
  </div><!--end row-->
</div><!--end container-->
<!--end page content-->
