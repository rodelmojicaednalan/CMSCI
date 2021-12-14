<div class="col-10">
  <div class="card">
    <div class="card-body">
      <h3 class="header-title">
        Customize Your Site's Pages
      </h3>
      <div id="page_accordion" class="custom-accordion mb-2">
            <div class="card mb-0">
                <div class="card-header" id="headingOne">
                    <h5 class="m-0">
                        <a class="text-dark d-block pt-2 pb-2" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            How to Use this Feature <span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                        </a>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse <?php print isset($_COOKIE['page_accordion_state']) ? $_COOKIE['page_accordion_state'] : 'show'; ?>" aria-labelledby="headingOne" data-parent="#page_accordion">
                    <div class="card-body">
                            <p>
                                    You can use this page to Edit one of your site's pages. You can also copy the page, view the page's SEO information, delete the page, and edit the page's Metadata. To Add a New Page click the Add New Page button. This will pop-up a dialog box where you can add a new page from an existing template by choosing the template name in the dropdown menu.
                                  </p>
                                  <p>
                                    To edit the page click Edit. This will take you to an editable version of the page. To copy an existing page click the copy button. You can rename the page by clicking the Metadata button. You can also edit the URL of the page and the canonical URL, and add a Meta Description. To manage where this page shows up in your Navigation, click the Navigation link from the left hand menu. You can preview your page by clicking the Preview Button and to Publish a Page - hit the Publish button from the Edit Page.
                                  </p>
                                  <p>Roll over the question mark in a circle for instructions on how to use a feature.<!-- More information and instructions can be found in the Knowledgebase.--></p>
                                  <p class="text-muted">This feature works best on laptop or desktop computers.</p>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end custom accordions-->
    </div>

    <div class="row justify-content">
        <div class="col-7 ml-3 mt-2">
            <button id="" type="button" class="btn btn-outline-info newpagemodal" data-toggle="modal" data-target="#newpage-modal" ><i class="dripicons dripicons-to-do mr-1"></i> <span>Add New Page</span> </button>
        </div>
        <div class="col-4 text-right mb-3">
              <div class="app-search">
                  <form><!--this is the page title search form should search page titles only-->
                      <div class="input-group">
                          <input name="keyword" type="text" class="form-control" placeholder="Page Title Search" value="<?=$keyword?>">
                          <span class="mdi mdi-magnify"></span>
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="submit">Search</button>
                          </div>
                      </div>
                  </form>
              </div>
        </div>
      <!--end pages search col-->
    </div>

  </div><!--end card-->
</div><!--end col-->
