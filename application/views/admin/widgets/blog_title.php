<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                    <li class="breadcrumb-item"><a href="#">Widgets</a></li>
                    <li class="breadcrumb-item"><a href="#">Blogs</a></li>
                    <li class="breadcrumb-item active">Blog Title</li>
                </ol>
            </div>
            <h4 class="page-title">Blog Title</h4>
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
                Blog Title
              </h3>
              <p>Use this widget to create a preview of your blog posts from one category by title only, or by title, thumbnail and posting date to add to a webpage on your site.
                </p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Blog Title Modal Preview modal content -->
  <div id="blogtitle-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Blog Title Widget</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body"><!--This will need to be dynamic information based on their blog categories.-->
                  <!--dynamic php magic needed here-->
                    <div class="container my-3">
                        <h3>Post Titles Without Images</h3>
                      <div class="row">
                        <!--This will need to be dynamic information based on their blog categories.-->
                        <!--dynamic php magic needed here-->
                        <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link" href="#"><h5>Blog Post 1</h5></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#"><h5>Blog Post 2</h5></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#"><h5>Blog Post 3</h5></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#"><h5>Blog Post 4</h5></a>
                            </li>
                          </ul>
                       <!--this links to the blog post-->
                     <!--should dynamically generate more titles if indicated-->
                    </div><!--end row-->
                    <h3>Post Titles With Images</h3>
                    <div class="row">
                      <div class="col">
                      <a href="#"><h5>Blog Post 1</h5></a>
                      <p><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/150x150"></a></p><!--src needs to be a dynamic image from their blog posts from the selected category--><!--should link to the blog post-->
                      <h5 class="header-title">01/4/2019</h5>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <a href="#"><h5>Blog Post 2</h5></a>
                        <p><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/151x151"></a></p><!--src needs to be a dynamic image from their blog posts from the selected category--><!--should link to the blog post-->
                        <h5 class="header-title">01/4/2019</h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                          <a href="#"><h5>Blog Post 3</h5></a>
                          <p><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/152x152"></a></p><!--src needs to be a dynamic image from their blog posts from the selected category--><!--should link to the blog post-->
                          <h5 class="header-title">01/4/2019</h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <a href="#"><h5>Blog Post 4</h5></a>
                            <p><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/153x153"></a></p><!--src needs to be a dynamic image from their blog posts from the selected category--><!--should link to the blog post-->
                            <h5 class="header-title">01/4/2019</h5>
                          </div>
                        </div>
                    </div><!--end rows-->
                    </div><!--end containerl-->

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
              Blog Title Widget
            </h2>
            <form action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
              <label for="blogtitle-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogtitle-widgetname-input" class="form-control" placeholder="Widget Name" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
               <p class="mt-2">
               <label for="blogtitle-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogtitle-width-input" class="form-control" placeholder="300px" required>
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
              </p>
              <p class="mt-2">
                  <label for="blogtitle-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="blogtitle-ht-input" class="form-control" placeholder="200px" required>
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="blogtitle-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="blogtitle-select" required>
                            <option selected>Choose one</option>
                            <option value="left">Left</option>
                            <option value="middle">Middle</option>
                            <option value="rigtht">Right</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Position on Page.
                        </div>
                    </div>
                  </p>
                  <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="blogtitle-cat">Blog Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the Blog Category from which the slider will take the images."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="blogtitle-cat" required>
                            <option selected>Choose one</option>
                            <option>Blog Category 1</option><!--these should be dynamically generated based on the existing blog categories-->
                            <option value="">Blog Category 2</option>
                            <option value="">Blog Category 3</option>
                            <option value="">Blog Category 4</option>
                            <option value="">Blog Category 5</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Blog Category.
                        </div>
                    </div>
                  </p>
                  <div class="row">
                      <div class="col-sm mr-2">
                          <label for="blogtitle-imagelimit">Posts Limit&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the maximum number of posts your widget will display."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <!--PHP HERE--> <input type="text" id="blogtitle-imagelimit" class="form-control" placeholder="4" required>
                        <span class="invalid-feedback">
                            Please provide a post limit.
                        </span>
                        <div class="form-group mt-2">
                          <label for="blogtitle-posts">Number of Posts to Show&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the maximum number of posts that your widget will display"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <!--PHP HERE--> <input type="text" id="blogtitle-posts" class="form-control" placeholder="8" required>
                        <span class="invalid-feedback">
                            Please enter a number.
                        </span>
                        </div>
                      </div> <!--end slide number entry-->
                  <div class="col-sm mt-4 mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck2">
                        <label class="custom-control-label" for="DisplayNameCheck2">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                    <div class="custom-control custom-checkbox mt-3">
                      <input type="checkbox" class="custom-control-input" id="DisplayAllCheck2">
                      <label class="custom-control-label" for="DisplayAllCheck2">Include Thumbnail?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display blog post images in your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  </div>
                </div><!--end checkboxes-->
                </div><!--end row-->
                  <!--here are the buttons-->
                      <div class="button-list text-right mt-4">
                          <button type="cancel" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#blogtitle-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
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
