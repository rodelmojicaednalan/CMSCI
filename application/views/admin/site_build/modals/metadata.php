<!-- Metadata content MODAL-->
<!--The Modal ID here should be dynamic based on the actual page information each page should yield a different modal here-->
<div id="metadata-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header modal-colored-header bg-warning">
              <h4 class="modal-title" id="warning-header-modalLabel">Edit Page Metadata</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
              <h4>Edit your Page's Metadata for Better SEO</h4>
              <!--You will need to add some PHP to make this form work-->
                <form id="frmmetadata">
                      <input type="hidden" name="page_id" value="" />
                      <div class="col-sm">
                          <div class="form-group">
                              <label for="nav-link-name">Page Title&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the page title that will appear in search engine results."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <input class="form-control" name="page_title" type="text" id="nav-link-name" placeholder="Type the Page Title Here, EX: Your Company: Home">
                          </div>
                      </div>
                      <div class="col-sm">
                          <label for="nav-link-name">Your Existing Page URL&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the Exisitng URL for this page. If you'd like search engines to only look for this page, you can create a Canonical URL below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                          <!--*Dynamic Content here - this should be the existing page's URL-->
                          <p class="text-muted"><!--replace with dynamic content--><?=base_url()?><span id="page_url_alias"></span></p>
                      </div>
                      <div class="col-sm">
                          <div class="form-group">
                              <label for="nav-url-alias">Canonical URL&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you have a single page accessible by multiple URLs, or different pages with similar content, a search engine sees these as duplicate versions of the same page. The search engine will choose one URL as the canonical version and crawl that, and all other URLs will be considered duplicate URLs and crawled less often. You create a canonical URL to tell search engines which page in your site should be served up first in search results for this content. This will limit the negative impact of having duplicate content on your website or other websites."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <input name="custom_url" class="form-control" type="text" id="nav-url-alias" placeholder="<?=base_url()?>canonicalpagename">
                          </div>
                      </div>
                               <div class="col-lg">
                                  <div class="form-group mb-2">
                                        <label for="example-select">Select Users Who Can See This Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you have different user or member groups for your site, you can choose which group can see this page without logging in. If you want everyone to see this page, then do nothing. That is the default settings for pages."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <select name="page_access_for_anonymous_users" class="form-control" id="nav-page-select">
                                            <option selected>&nbsp;&nbsp;Select the User Group&nbsp;&nbsp;</option>
                                            <option value="1">Public</option><!--replace me with dynamic website info-->
                                            <option value="0">Members only</option><!--replace me with dynamic website info-->
                                        </select>
                                      </div>
                                  </div>

                                  <!--
                                  <div class="col-sm mt-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="navCheck1">
                                            <label class="custom-control-label" for="navCheck1">Make available to other Communities</label>
                                        </div>
                                  </div>
                                  -->
                             <div class="col-sm mt-2">
                                    <div class="form-group mb-2">
                                            <label for="example-textarea">Keywords&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is important for the search engines that still use this feature."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                            <textarea name="page_keywords" class="form-control" id="example-textarea" rows="5" placeholder="Enter Keywords divided by Commas, enter no more than 25"></textarea>
                                        </div>
                                </div>
                        <div class="col-sm">
                                <div class="form-group mb-2">
                                        <label for="example-textarea">Meta Description&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the second most important thing that you can do to improve your site's SEO. A relevant and unique page description will be crawled by search engines and help Users to find your content."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <textarea name="page_meta_description" class="form-control" id="example-textarea" rows="5" placeholder="Enter one or two sentences here that best describe your website. This will be what displays when your site appears in an organic page search in a search engine, such as Google. For best results keep this below 150-160 characters. "></textarea>
                                    </div>
                         </div>
                      <!--end column-->
                </form>

                <div class="modal-footer">
                <div class="form-group text-center">
                    <button id="cancel" class="btn btn-lg btn-secondary mb-3" type="button" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                    <button id="save_draft" class="btn btn-lg btn-info mb-3 save-page" data-published="0" type="button">Save</button>
                    <!--<button id="publish" class="btn btn-lg btn-primary mb-3 save-page" data-published="1" type="button">&nbsp;Publish&nbsp;</button>-->
                </div>
              </div><!--end modal footer-->
       </div><!-- / .modal body-->
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
