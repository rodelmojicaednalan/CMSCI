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
                    <li class="breadcrumb-item active">Blog Preview Widget</li>
                </ol>
            </div>
            <h4 class="page-title">Blog Preview Widget</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<!--begin page content here-->
<div class="container-fluid">
  <div class="row">
      <div class="col-10">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">
                Blog Preview
              </h3>
              <p>	Use this widget to create a preview of the most recent blog posts to add to a webpage on your site.
                  This preview will display the Name of the Blog Post, the Date of the Blog Post, The preview sentences for the blog post and the number of comments.
              </p><p>
                  To preview your widget click the Preview button. To place a widget in a page, go to the Site Build/Pages, choose the page you want to place the widget on, then choose Edit. Once you are editing your in a page editor, choose this widget from the widget dropdown menu.
                </p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Blog Preview modal content -->
  <div id="blog-preview-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Blog Preview</h4>
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
              Blog Preview Widget
            </h2>
            <form id="frmwidget" action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
                <input type="hidden" name="type" value="blog_preview" />
                <input type="hidden" name="widget_type_id" value="10" />
                <input type="hidden" name="sidebar_widget_id" value="<?=$widget_id?>" />
                <label for="blogpreview-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogpreview-widgetname-input" class="form-control" placeholder="Widget Name" name="sidebar_widget_name" value="<?=$sidebar_widget?$sidebar_widget[0]->sidebar_widget_name:''?>" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
               <p class="mt-2">
               <label for="blogpreview-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="blogpreview-width-input" class="form-control" placeholder="300px" name="Width" value="<?=$fields && isset($fields['Width']) ? $fields['Width'] : '' ?>" required>
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
              </p>
              <p class="mt-2">
                  <label for="blogpreview-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="blogpreview-ht-input" class="form-control" placeholder="200px" name="Height" value="<?=$fields && isset($fields['Height']) ? $fields['Height'] : '' ?>" required>
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="blogpreview-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="blogpreview-select"  name="sidebar_widget_position" required>
                            <option selected>Choose one</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Left' ? 'selected' : ''?> >Left</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Middle' ? 'selected' : ''?>>Middle</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Right' ? 'selected' : ''?>>Right</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Position on Page.
                        </div>
                    </div>
                  </p>
                  <p class="mt-2">
                      <label for="blogpreview-ht-input">Number of Posts to show&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the number of blog posts that will be previewed in your blog preview widget."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <!--PHP HERE--> <input type="text" id="blogpreview-ht-input" name="Blogs" class="form-control"  placeholder="4" value="<?=$fields && isset($fields['Blogs']) ? $fields['Blogs'] : '' ?>"  required>
                        <span class="invalid-feedback">
                            Please provide the number of posts to show.
                        </span>
                    </p>
                  <div class="mt-3 mb-3">
                    <div class="custom-control custom-checkbox">
                        <input <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_display_title == 1? 'checked':''?> type="checkbox" class="custom-control-input" id="DisplayNameCheck3" name="sidebar_widget_display_title" value="1">
                        <label class="custom-control-label" for="DisplayNameCheck3">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                  </div>
                  <!--here are the buttons-->
                      <div class="button-list text-right">
                          <button type="cancel" onclick="window.location='/admin/widgets';" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info widget-preview-btn" data-toggle="modal" data-target="#blog-preview-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
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
