<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                    <li class="breadcrumb-item"><a href="#">Widgets</a></li>
                    <li class="breadcrumb-item active">Edit Widgets</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Widgets</h4>
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
                Widgets
              </h3>
              <p>	A BOOMITY widget adds extra functionality to each page. For example, you could add a gallery to a page, or add your Instagram feed, or add a product from your online shop.
                  To create a new widget, click on the Widgets link in the left hand menu. Then select the Widget type. Each widget has a unique configuration.
                  You can then add the widget to a content block of a page by inserting the widget's code where you want it to display.
                </p>
              <p>
                 The site's existing widgets are below. Click Settings to Edit the Widget.
              </p>
              <p class="text-muted">This feature works best on laptop or desktop computers.</p>
            </div><!--end card body div-->
            <!--widgets search div-->
            <div class="col-10 offset-8">
                <div class="app-search">

                        <form><!--this is the widget title search form should search widget titles only-->
                            <div class="input-group">
                                <input name="keyword" type="text" class="form-control" placeholder="Widgets Search" value="<?=$keyword?>">
                                <span class="mdi mdi-magnify"></span>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div><!--end widgets search col-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
   <!-- Danger Alert Modal -->
<div id="widget-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-danger">
            <div class="modal-body p-4">
                <div class="text-center">
                    <a href="#" data-dismiss="modal"><i class="dripicons-wrong h1"></i></a>
                    <h4 class="mt-2">Are you Certain?</h4>
                    <p class="mt-3">This will delete this widget from your site. Are you sure you want to do this?</p>
                    <button id="delete_widget_modal_btn" type="button" class="btn btn-light my-2" data-dismiss="modal">Delete Widget</button><!--change so that it deletes the widget-->
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 <!--END THE MODALS BEGIN PAGE CONTENT-->
  <div class="row mt-2">
    <div class="col-12">
      <!--This begins the Widgets Cards Section-->
        <!--begin card deck wrapper-->
        <div class="card-deck-wrapper">
          <div class="card-deck">
            <!--begin column one-->
              <!--These cards will need to be dynamically added based on site pages-->
              <!--YOU ONLY NEED TO COPY THIS CARD TO MAKE ALL OF THE OTHER PAGE CARDS THE REST OF THEM DO NOT HAVE THE PROPER LINKS-->

              <?php foreach ($widgets as $key => $widget) {
                  $keyurl = str_replace('_widget', '', str_replace(' ', '_', strtolower($widget->widget_type_name)));
              ?>
              <div class="card-d-block" id="sidebar_widget_<?=(String)$widget->sidebar_widget_id?>">
                  <div class="card bg-light mt-2 p-2">
                      <div class="card-header">
                          <?=$widget->sidebar_widget_name?>
                      </div>
                      <div class="card-body">
                          <p class="button-list text-center mb-1">
                              <p class="card-text"> Make Active?</p>
                              <input data-sidebar_widget_id="<?=$widget->sidebar_widget_id?>" value="1" class="widget-switch-active" type="checkbox" id="widget-switch-<?=$widget->sidebar_widget_id?>" <?=$widget->sidebar_widget_is_active == 1 ? 'checked' : ''?> data-switch="success"/>
                              <label for="widget-switch-<?=$widget->sidebar_widget_id?>" data-on-label="Yes" data-off-label="No"></label>
                          </p><!--end button div-->
                         <p><a href="/admin/widget/<?=$keyurl.'/'.$widget->sidebar_widget_id?>" class="btn btn-primary btn-block" title="edit this widget"><i class="dripicons dripicons-pencil mr-1" ></i>Edit Widget</a></p>
                         <p><a href="#widget-alert-modal" data-sidebar_widget_id="<?=$widget->sidebar_widget_id?>" data-toggle="modal" data-target="#widget-alert-modal" class="btn btn-danger btn-block delete-widget-btn" title="This will delete the Widget from your site."><i class="dripicons dripicons-trash mr-1"></i>Delete Widget</a></p>
                      </div>
                  </div> <!-- end card-->
              </div><!--end card block-->
              <?php } ?>

          </div><!--card deck-->
        </div><!--card deck wrapper-->
    </div><!--end col 12-->
  </div><!--end row-->
</div><!--end container -->
<!--end page content-->
