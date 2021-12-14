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
                    <li class="breadcrumb-item active">Blog Category Slider</li>
                </ol>
            </div>
            <h4 class="page-title">Blog Category Slider Widget</h4>
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
                Blog Category Slider
              </h3>
              <p>Use this widget to add an image slider with thumbnails of blog posts from a Blog Category to a webpage on your site. Each thumbnail image will link to a blog post from the category. To preview your slider, click the Preview button.
                </p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Blog Cat Modal Preview modal content -->
  <div id="blogcatslider-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Blog Cateogry Slider</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body"><!--This will need to be dynamic information based on their blog categories.-->
                  <!--dynamic php magic needed here-->
                    <div class="container text-center my-3">
                        <!--This will need to be dynamic information based on their blog categories.-->
                        <!--dynamic php magic needed here-->
                        <div id="recipeCarousel" class="carousel slide w-300" data-ride="carousel">
                            <div class="carousel-inner w-200" role="listbox">
                                <div class="carousel-item row no-gutters active">
                                    <div class="col-3 float-left"><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/350x250"></a></div><!--src needs to be a dynamic image from their blog posts from the selected category--><!--should link to the blog post-->
                                    <div class="col-3 float-left"><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/351x251"></a></div><!--src needs to be a dynamic image from their blog posts from the selected category-->
                                    <div class="col-3 float-left"><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/352x252"></a></div><!--src needs to be a dynamic image from their blog posts from the selected category-->
                                    <div class="col-3 float-left"><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/353x253"></a></div><!--src needs to be a dynamic image from their blog posts from the selected category-->
                                </div>
                                <div class="carousel-item row no-gutters">
                                    <div class="col-3 float-left"><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/354x254"></a></div>
                                    <div class="col-3 float-left"><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/352x252"></a></div><!--src needs to be a dynamic image from their blog posts from the selected category-->
                                    <div class="col-3 float-left"><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/351x251"></a></div><!--src needs to be a dynamic image from their blog posts from the selected category-->
                                    <div class="col-3 float-left"><a href="#"><img class="img-fluid" src="https://source.unsplash.com/random/350x250"></a></div><!--src needs to be a dynamic image from their blog posts from the selected category-->
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                     <!--should dynamically generate more slides if indicated-->
                    </div><!--end carousel-->
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
              Blog Category Slider Widget
            </h2>
            <form action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
              <label for="blogcatslider-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogcatslider-widgetname-input" class="form-control" placeholder="Widget Name" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
               <p class="mt-2">
               <label for="blogcatslider-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogcatslider-width-input" class="form-control" placeholder="300px" required>
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
              </p>
              <p class="mt-2">
                  <label for="blogcatslider-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="blogcatslider-ht-input" class="form-control" placeholder="200px" required>
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="blogcatslider-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="blogcatslider-select" required>
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
                        <label for="blogcatslider-cat">Blog Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the Blog Category from which the slider will take the images."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="blogcatslider-cat" required>
                            <option selected>Choose one</option>
                            <option>Blog Category 1</option><!--these should be dynamically generated based on the existing blog categories-->
                            <option value="">Blog Category 2</option>
                            <option value="">Blog Category 3</option>
                            <option value="">Blog Category 4</option>
                            <option value="">Blog Category 5</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Position on Page.
                        </div>
                    </div>
                  </p>
                  <div class="row">
                      <div class="col-sm mr-2">
                          <label for="blogcatslider-imagelimit">Image Limit&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the maximum number of images your slider will display."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <!--PHP HERE--> <input type="text" id="blogcatslider-imagelimit" class="form-control" placeholder="4" required>
                        <span class="invalid-feedback">
                            Please provide an image limit.
                        </span>
                        <div class="form-group mt-2">
                          <label for="blogcatslider-slides">Slides to Show&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the maximum number of slides that your slider will display"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <!--PHP HERE--> <input type="text" id="blogcatslider-slides" class="form-control" placeholder="8">
                        </div>
                      </div> <!--end slide number entry-->
                  <div class="col-sm mt-4 mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck2">
                        <label class="custom-control-label" for="DisplayNameCheck2">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                    <div class="custom-control custom-checkbox mt-3">
                      <input type="checkbox" class="custom-control-input" id="DisplayAllCheck2">
                      <label class="custom-control-label" for="DisplayAllCheck2">Show All?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display all of the blog post images in your slider."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  </div>
                </div><!--end checkboxes-->
                </div><!--end row-->
                  <!--here are the buttons-->
                      <div class="button-list text-right mt-4">
                          <button type="cancel" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#blogcatslider-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
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
