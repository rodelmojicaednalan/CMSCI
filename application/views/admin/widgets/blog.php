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
                    <li class="breadcrumb-item active">Blog Widget</li>
                </ol>
            </div>
            <h4 class="page-title">Blog Widget</h4>
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
                Blog Widget
              </h3>
              <p>Use this widget to create a preview of your blog categories, blog tags and/or your blog's featured items.  This widget creates a tag, category and number of posts list which you can add to a webpage on your site.
                </p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Blog Modal Preview modal content -->
  <div id="blogwidget-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Blog Widget</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body"><!--This will need to be dynamic information based on their blog categories.-->
                  <!--dynamic php magic needed here-->
                  <div class="card">
                      <div class="card-body">
                          <ul class="nav nav-tabs mb-3">
                              <li class="nav-item">
                                  <a href="#categories" data-toggle="tab" aria-expanded="false" class="nav-link">
                                      <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                      <span class="d-none d-lg-block">Categories</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#featured" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                      <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                      <span class="d-none d-lg-block">Featured</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#tags" data-toggle="tab" aria-expanded="false" class="nav-link">
                                      <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                      <span class="d-none d-lg-block">Tags</span>
                                  </a>
                              </li>
                          </ul>
                          <div class="tab-content">
                              <div class="tab-pane show active" id="categories"><!--CATEGORIES TAB-->
                                <div class="col"><!--DYNAMIC CONTENT HERE-->
                                  <h5 class="headline-text">Category 1</h5>
                                  <h5 class="headline-text">Category 2</h5>
                                  <h5 class="headline-text">Category 3</h5>
                                  <h5 class="headline-text">Category 4</h5>
                                  <p><a href="">4</a></p>
                                </div>
                                <div class="col mt-4">
                                    <h5 class="headline-text">Category 5</h5>
                                    <h5 class="headline-text">Category 6</h5>
                                    <h5 class="headline-text">Category 7</h5>
                                    <h5 class="headline-text">Category 8</h5>
                                    <p><a href="">4</a></p>
                                  </div>
                              </div>
                              <div class="tab-pane" id="featured"><!--FEATURED TAB HERE-->
                                  <div class="col"><!--DYNAMIC CONTENT HERE-->
                                    <h5 class="headline-text">Featured Post 1</h5>
                                  <h5 class="headline-text">Featured Post  2</h5>
                                  <h5 class="headline-text">Featured Post  3</h5>
                                  <h5 class="headline-text">Featured Post  4</h5>
                                  <p><a href="">4</a></p>

                                  </div>
                              </div>
                              <div class="tab-pane" id="tags"><!--these are the dynamically added blog tags-->
                                  <p class="justified"><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a><a href="">Tag&nbsp;</a></p>
                          </div>
                          </div>
                      </div>
                  </div>
              </div><!--modal body-->
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
              Blog Widget
            </h2>
            <form action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
              <label for="blogwidget-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogwidget-widgetname-input" class="form-control" placeholder="Widget Name" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
               <p class="mt-2">
               <label for="blogwidget-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogwidget-width-input" class="form-control" placeholder="300px" required>
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
              </p>
              <p class="mt-2">
                  <label for="blogwidget-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="blogwidget-ht-input" class="form-control" placeholder="200px" required>
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="blogwidget-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="blogwidget-select" required>
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
                  <div class="row">
                    <div class="col-4 mt-3">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="DisplayNameCheck2">
                          <label class="custom-control-label" for="DisplayNameCheck2">Display Categories Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display a tab for blog categories in your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      </div>
                      <div class="custom-control custom-checkbox mt-3">
                          <input type="checkbox" class="custom-control-input" id="DisplayNameCheck2">
                          <label class="custom-control-label" for="DisplayNameCheck2">Featured Item Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display a tab with featured blog items in your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      </div>
                    </div>

                  <div class="col-sm mt-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck2">
                        <label class="custom-control-label" for="DisplayNameCheck2">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                    <div class="custom-control custom-checkbox mt-3">
                      <input type="checkbox" class="custom-control-input" id="DisplayAllCheck2">
                      <label class="custom-control-label" for="DisplayAllCheck2">Tags Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display a tag with blog tags in your widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  </div>
                </div><!--end checkboxes-->
                </div><!--end row-->
                  <!--here are the buttons-->
                      <div class="button-list text-right mt-4">
                          <button type="cancel" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#blogwidget-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
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
