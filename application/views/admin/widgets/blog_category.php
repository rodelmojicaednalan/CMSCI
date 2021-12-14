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
                    <li class="breadcrumb-item active">Blog Category Widget</li>
                </ol>
            </div>
            <h4 class="page-title">Blog Category Widget</h4>
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
                Blog Category List
              </h3>
              <p>	Use this widget to add a list of your all of your Blog Categories with links to the categories and blog posts to a webpage on your site.
                </p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Blog Cat Modal Preview modal content -->
  <div id="blog-cat-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body"><!--This will need to be dynamic information based on their blog categories.-->
                  <!--dynamic php magic needed here-->
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
              Blog Category List Widget
            </h2>
            <form id="frmwidget" action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
              <input type="hidden" name="type" value="blog_category" />
              <input type="hidden" name="widget_type_id" value="9" />
              <input type="hidden" name="sidebar_widget_id" value="<?=$widget_id?>" />

              <p class="mt-2">
                <label for="blogcat-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogcat-widgetname-input" class="form-control" placeholder="Widget Name" name="sidebar_widget_name" value="<?=$sidebar_widget?$sidebar_widget[0]->sidebar_widget_name:''?>" required />
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
              </p>

              <p class="mt-2">
               <label for="blogcat-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogcat-width-input" class="form-control" name="Width" placeholder="300px" value="<?=$fields && isset($fields['Width']) ? $fields['Width'] : '' ?>" />
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
              </p>
              <p class="mt-2">
                  <label for="blogcat-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="blogcat-ht-input" class="form-control" name="Height" placeholder="200px" value="<?=$fields && isset($fields['Height']) ? $fields['Height'] : '' ?>">
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="example-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="sidebar_widget_position" name="sidebar_widget_position">
                            <option value="">Choose one</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Left' ? 'selected' : ''?> >Left</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Middle' ? 'selected' : ''?>>Middle</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Right' ? 'selected' : ''?>>Right</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Position on Page.
                        </div>
                    </div>
                  </p>
                  <div class="mt-3 mb-3">
                    <div class="custom-control custom-checkbox">
                        <input <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_display_title == 1? 'checked':''?> type="checkbox" class="custom-control-input" id="DisplayNameCheck1" name="sidebar_widget_display_title" value="1" />
                        <label class="custom-control-label" for="DisplayNameCheck1">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                  </div>
                  <!--here are the buttons-->
                      <div class="button-list text-right">
                          <button type="cancel" onclick="window.location='/admin/widgets';" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info widget-preview-btn" data-toggle="modal" data-target="#blog-cat-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
                          <button type="submit" class="btn btn-lg btn-primary" id="save_widget"><?=$sidebar_widget?'Save':'Create'?> Widget</button>
                      </div><!--this form is supposed to validate. -->
                  <!--end button div-->
                </form><!--end the form-->
          </div> <!--end card body-->
        </div> <!--end card-->
      </div><!--end col-->


  </div><!--end the row-->
</div>
<!--end page content-->
