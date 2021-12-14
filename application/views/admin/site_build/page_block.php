<div class="card-d-block" id="page_id_<?=$page->page_id?>">
      <div class="card mt-2 p-2">
          <!--Replace the Card Title with dynamic PHP of the actual name of the page.-->
          <h5 class="card-title"><?=$page->page_title?></h5>
          <!--This Image needs to be replaced with dynamic PHP for an image from the webpage. Restrict to 300 x 200 px. Alt should be the Name of the page Replace *Name of Page* with the actual name of the page-->
          <!--<img class="card-img-center img-fluid" src="https://source.unsplash.com/random/300x200" alt="*Name of Page* Image">-->

          <?php if( isset($img_str) && trim($img_str) != ''){ ?>
                    <img class="card-img-center img-fluid" style="width:354px;" src="<?=$img_str?>" alt="*Name of Page* Image">
          <?php } else{ ?>
                    <img class="card-img-center img-fluid" src="/assets/images/image-file.png" alt="*Name of Page* Image">
          <?php } ?>

          <div class="card-body">
            <p class="button-list text-center mb-1">
              <p class="card-text"> Published?</p>
              <input data-page_id="<?=$page->page_id?>" value="1" class="page-switch-active" type="checkbox" id="page-switch-<?=$page->page_id?>" <?=$page->page_is_active == 1 ? 'checked' : ''?> data-switch="success"/>
              <label for="page-switch-<?=$page->page_id?>" data-on-label="Yes" data-off-label="No"></label>

              <p class="button-list text-center mb-1">
                  <button type="button" data-page_id="<?=$page->page_id?>" class="btn btn-outline-info copy-page"><i class="dripicons dripicons-duplicate mr-1"></i><span>Copy</span> </button>
                  <button type="button" class="btn btn-outline-warning metadata-modal" data-page_id="<?=$page->page_id?>" data-toggle="modal" data-target="#metadata-modal" ><i class="mdi mdi-rocket mr-1"></i> <span>Metadata</span> </button>
                  <button type="button" data-page_id="<?=$page->page_id?>" class="btn btn-outline-secondary seo-page" data-toggle="modal" data-target="#seo-modal" ><i class="dripicons dripicons-to-do mr-1"></i> <span>SEO</span> </button>
              </p><!--end button div-->

              <p class="button-list text-center mb-1">
                      <div class="custom-control custom-checkbox">
                              <input data-page_id="<?=$page->page_id?>" <?=$page->page_is_homepage == 1 ? 'checked' : ''?> type="checkbox" class="custom-control-input chkhomepage" id="homeCheck1_<?=$page->page_id?>">
                              <label class="custom-control-label" for="homeCheck1_<?=$page->page_id?>">Make Homepage</label>
                      </div>
              </p>
                  <!--*This should be a Dynamic Link to the Page with Froala Editors-->
                   <p><a target="_blank" href="/?page_id=<?=$page->page_id?>" class="btn btn-secondary btn-block" title="preview this page"><i class="dripicons dripicons-preview mr-1" ></i>Preview</a></p>
                   <p><a target="_blank" href="/<?=$page->page_url_alias?>" class="btn btn-primary btn-block" title="edit this page"><i class="dripicons dripicons-pencil mr-1" ></i>Edit Page</a></p>
                   <p><a href="#danger-alert-modal" data-toggle="modal" data-page_id="<?=$page->page_id?>" data-target="#danger-alert-modal" class="btn btn-danger btn-block delete-page-btn" title="This will delete the page from your site."><i class="dripicons dripicons-trash mr-1"></i>Delete Page</a></p>
           </div>
       </div> <!-- end card-->
  </div><!--end card block-->
