<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                    <li class="breadcrumb-item"><a href="#">Widgets</a></li>
                    <li class="breadcrumb-item"><a href="#">Content</a></li>
                    <li class="breadcrumb-item active">External Script</li>
                </ol>
            </div>
            <h4 class="page-title">External Script Widget</h4>
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
                External Script
              </h3>
              <p>Use this widget to incorporate an external script from another source into your website. You can import scripts and code into the Content box. After you create your widget by hitting Create Widget, you can preview the widget on this page. Your widget will appear on the WIDGETS page. You can find it by looking for the Name you fill out in the Name Your Widget field below. You can add this widget to a page on your site by clicking the edit button on the Page from the PAGES page. (See left hand navigation.)
                </p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!-- Blog Cat Modal Preview modal content -->
  <div id="externalscript-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body"><!--This will need to be dynamic information based on their events.-->
                  <!--dynamic php magic needed here-->
                  <div class="col-sm">
                    <h3 class="header-title">External Script</h3>
                    <!--And this area is full of dynamic information. It should be whichever script they've entered below.-->
                    <p>The external script goes here and is dynamically generated based on the script entered. </p><!--remove this code it is just a placeholder-->
                </div> <!-- end col-->
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
              External Script Widget
            </h2>
            <form id="frmwidget" action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
              <input type="hidden" name="type" value="external" />
              <input type="hidden" name="widget_type_id" value="5" />
              <input type="hidden" name="sidebar_widget_id" value="<?=$widget_id?>" />

              <label for="externalscript-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="externalscript-widgetname-input" class="form-control" placeholder="Widget Name" name="sidebar_widget_name" value="<?=$sidebar_widget?$sidebar_widget[0]->sidebar_widget_name:''?>" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
                <div class="form-group mt-3">
                  <label for="externalscript-textarea">Enter the External Script&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Copy the script from your external application or website and paste it exactly as provided here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <textarea class="form-control" id="externalscript-textarea" rows="10" name="Content" required><?=$fields && isset($fields['Content']) ? $fields['Content'] : '' ?></textarea>
                  <div class="invalid-feedback">
                    Please input your external script.
                </div>
              </div>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="externalscript-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="sidebar_widget_position" name="sidebar_widget_position" required>
                            <option selected>Choose one</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Left' ? 'selected' : ''?> >Left</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Middle' ? 'selected' : ''?> >Middle</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Right' ? 'selected' : ''?> >Right</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Position on Page.
                        </div>
                    </div>
                  </p>
                  <div class="mt-3 mb-3">
                    <div class="custom-control custom-checkbox">
                        <input <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_display_title == 1? 'checked':''?> name="sidebar_widget_display_title" value="1" type="checkbox" class="custom-control-input" id="DisplayNameCheck6">
                        <label class="custom-control-label" for="DisplayNameCheck6">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                  </div>
                  <!--here are the buttons-->
                      <div class="button-list text-right">
                          <button type="cancel" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info widget-preview-btn" data-toggle="modal" data-target="#externalscript-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
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
