<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                            <li class="breadcrumb-item"><a href="#">Site Design</a></li>
                            <li class="breadcrumb-item active">Custom Design Styles</li>
                    </ol>
                </div>
                <h4 class="page-title">Site Design - Custom Design Styles</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
  <!--START PAGE CONTENT HERE-->
  <div class="row">
    <div class="col-10">
      <div class="card">
        <div class="card-body">
            <h4 class="header-title">
              Add Custom Site CSS &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use this CSS sandbox to create custom layouts that work for your site pages. This requires knowledge of front-end web development and CSS for Bootstrap 4."><i class="dripicons mdi mdi-help-circle-outline"></i></a>
            </h4>
            <p class="text-muted font-14">
              Paste your custom CSS here to overwrite existing site styles.
            </p>
            <p></p>
            <form action="/admin/site_design_save" method="POST" id="frmcustomdesign">
                <div class="form-group mb-3">
                    <label for="example-textarea">Custom CSS</label>
                    <textarea class="form-control" name="custom_design_style" id="example-textarea" rows="15"><?=isset($site_design_obj->custom_design_style) ? $site_design_obj->custom_design_style : ''?></textarea>
                </div>
            <div class="d-print-none mt-4">
                <div class="text-right">
                    <!--<button type="submit" class="btn btn-secondary">Cancel</button>&nbsp;&nbsp;-->
                    <button type="button" data-published="0" class="btn btn-info save-custom-design">Save Draft</button>&nbsp;&nbsp;
                    <button type="button" data-published="1" class="btn btn-primary save-custom-design">Publish</button>
                </div>
            </div>
            <!-- end buttons -->
            </form>
          </div>
        </div> <!-- end card body -->
      </div><!--end card-->
    </div><!-- end col -->
  </div><!-- end row -->
