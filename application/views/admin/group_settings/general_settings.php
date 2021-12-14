<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Admin - Settings</li>
                    </ol>
                </div>
                <h4 class="page-title">Admin - Settings</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
</div> <!-- container -->
</div> <!-- content -->
<!--begin page content here-->
<div class="container">
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">
                    General Settings
                  </h4>
                  <div>
                      <p>
                        Use this page to determine the general Administration settings for your website. You can use the WSIWG editor to style your text. If you choose not to make any changes, the default settings will apply. To save your changes as a draft, click the Save Draft button at the bottom of the page. To apply your changes, click the Publish button at the bottom of the page.
                      </p>
                      <p>
                        Click the Question mark in the circle for further explanation on how to use a feature.
                      </p>
                  </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
<div class="row">
    <div class="col-10">
         <!--define the form action below-->
         <!--begin page form-->
         <form id="frmgeneralsettings" method="POST" action="/admin/general_settings">
            <div class="row">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Select Settings from the Checkboxes below.</h5>
                          <span class="custom-control custom-checkbox">
                                <input type="hidden" name="group_settings_enable_comments" value="0" />
                                <input <?=isset($group_settings_obj->group_settings_enable_comments) && $group_settings_obj->group_settings_enable_comments == 1 ?'checked':''?> type="checkbox" class="custom-control-input" name="group_settings_enable_comments" value="1" id="group_settings_enable_comments">
                                <label class="custom-control-label" for="group_settings_enable_comments" title="Enable Comments" >Enable Comments&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                    </label>
                            </span>
                            <span class="custom-control custom-checkbox">
                                    <input type="hidden" name="group_settings_chat_is_active" value="0" />
                                    <input <?=isset($group_settings_obj->group_settings_chat_is_active) && $group_settings_obj->group_settings_chat_is_active == 1 ?'checked':''?> type="checkbox" class="custom-control-input" name="group_settings_chat_is_active" value="1" id="group_settings_chat_is_active">
                                    <label class="custom-control-label" for="group_settings_chat_is_active" title="Enable Comments" >Enable Group Chat&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                    </label>
                                </span>
                            <span class="custom-control custom-checkbox">
                                        <input type="hidden" name="group_settings_hide_login_link" value="0" />
                                        <input <?=isset($group_settings_obj->group_settings_hide_login_link) && $group_settings_obj->group_settings_hide_login_link == 1 ?'checked':''?> type="checkbox" class="custom-control-input" name="group_settings_hide_login_link" value="1" id="group_settings_hide_login_link">
                                        <label class="custom-control-label" for="group_settings_hide_login_link" title="Enable Comments">Hide login / Signup Links&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                        </label>
                                </span>
                                <span class="custom-control custom-checkbox">
                                        <input type="hidden" name="group_settings_visibility" value="0" />
                                        <input <?=isset($group_settings_obj->group_settings_visibility) && $group_settings_obj->group_settings_visibility == 1 ?'checked':''?> type="checkbox" class="custom-control-input" name="group_settings_visibility" id="group_settings_visibility" value="1">
                                          <label class="custom-control-label" for="group_settings_visibility" title="Community Access">Require Users to request Community Access&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                          </label>
                                        </span>
                                        <span class="custom-control custom-checkbox">
                                                <input type="hidden" name="group_settings_disable_community_index" value="0" />
                                                <input <?=isset($group_settings_obj->group_settings_disable_community_index) && $group_settings_obj->group_settings_disable_community_index == 1 ?'checked':''?> type="checkbox" class="custom-control-input" name="group_settings_disable_community_index" value="1" id="group_settings_disable_community_index">
                                                  <label class="custom-control-label" for="group_settings_disable_community_index" title="Enable Comments">Disable Community Index&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                                  </label>
                                                </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card border">
                        <div class="card-body">
                                <span class="custom-control custom-checkbox">
                                        <input type="hidden" name="group_settings_join_group_box_is_active" value="0" />
                                        <input <?=isset($group_settings_obj->group_settings_join_group_box_is_active) && $group_settings_obj->group_settings_join_group_box_is_active == 1 ?'checked':''?> type="checkbox" class="custom-control-input" name="group_settings_join_group_box_is_active" value="1" id="group_settings_join_group_box_is_active">
                                          <label class="custom-control-label" for="group_settings_join_group_box_is_active" title="Enable Comments">Enable Users to Join Groups&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="mdi mdi-help-circle-outline"></i></a>
                                          </label>
                                        </span>
                                      <span class="form-group m-3">
                                            <label for="pageviews-select">Display Join Group Message After # of Page Views&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                            <select class="form-control" name="group_settings_join_group_box_access_number_of_pages" id="group_settings_join_group_box_access_number_of_pages">
                                                <option <?=isset($group_settings_obj->group_settings_join_group_box_access_number_of_pages) && $group_settings_obj->group_settings_join_group_box_access_number_of_pages == 1 ?'selected':''?>>1</option>
                                                <option <?=isset($group_settings_obj->group_settings_join_group_box_access_number_of_pages) && $group_settings_obj->group_settings_join_group_box_access_number_of_pages == 2 ?'selected':''?>>2</option>
                                                <option <?=isset($group_settings_obj->group_settings_join_group_box_access_number_of_pages) && $group_settings_obj->group_settings_join_group_box_access_number_of_pages == 3 ?'selected':''?>>3</option>
                                                <option <?=isset($group_settings_obj->group_settings_join_group_box_access_number_of_pages) && $group_settings_obj->group_settings_join_group_box_access_number_of_pages == 4 ?'selected':''?>>4</option>
                                                <option <?=isset($group_settings_obj->group_settings_join_group_box_access_number_of_pages) && $group_settings_obj->group_settings_join_group_box_access_number_of_pages == 5 ?'selected':''?>>5</option>
                                            </select>
                                        </span>
                        </div>
                      </div>
                    </div>
                  </div><!--end row-->
         <div class="row">
                <div class="card bg-primary">
                        <div class="card-body">
                          <h4 class="header-title text-white">
                            Site Image Uploads
                          </h4>
                          <p class="card-text text-white">
                              Image optimization is strongly encouraged. Images which are not optimized for the web and mobile will cause your site to load more slowly for users. This results in your site having lower organic rankings with search engines such as Google.
                          </p>
                          <p class="text-white">
                              <span class="custom-control custom-checkbox">
                                  <input type="hidden" name="group_settings_optimize_images" value="0" />
                                  <input <?=isset($group_settings_obj->group_settings_optimize_images) && $group_settings_obj->group_settings_optimize_images == 1 ?'checked':''?> type="checkbox" class="custom-control-input" name="group_settings_optimize_images" id="group_settings_optimize_images" value="1">
                                    <label class="custom-control-label" for="group_settings_optimize_images" title="Optimize Images">Optimize Images during upload.&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                    </label>
                              </span>
                            </p>
                              <span class="form-group mb-3">
                                  <label class="text-white" for="png-select">PNG Quality&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                  </label>
                                  <select name="group_settings_png_quality" class="form-control" id="png-select">
                                      <?php for ($i=0; $i < 10; $i++) { ?>
                                          <option <?=isset($group_settings_obj->group_settings_png_quality) && $group_settings_obj->group_settings_png_quality == $i ?'selected':''?>><?=$i?></option>
                                      <?php } ?>
                                  </select>
                                </span>
                              <p class="text-white">
                                  Choose an image PNG compression level from 0, (no compression) to 9.
                              </p>
                              <span class="form-group mb-3">
                                  <label class="text-white" for="jpg-select">JPG Quality&nbsp;(%)<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <select name="group_settings_jpg_quality" class="form-control" id="jpg-select">
                                    <?php for ($i=25; $i < 86; $i+=10) { ?>
                                        <option <?=isset($group_settings_obj->group_settings_jpg_quality) && $group_settings_obj->group_settings_jpg_quality == $i ?'selected':''?>><?=$i?></option>
                                    <?php } ?>
                                  </select>
                                </span>
                                <p class="text-white">
                                    Choose an image JPG compression level from 25%, (low quality) to 85%.
                                </p>
                        </div>
                      </div>
         </div><!--end row-->
         <div class="row">
             <!--BEGIN TIMEZONE CARD-->
             <div class="col-sm-6">
             <div class="card border">
                 <div class="card-body">
                    <h5 class="card-title">Website Timezone&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the master timezone for your website. This will determine the timezone for scheduled newsletters and meetings."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h5>
                    <span class="form-group mb-3">
                            <label for="example-select">This will be the default timezone for the platform's email marketing, events, online meetings and more.</label>
                            <!--INSERT THE EXISTING JQUERY TIMEZONE PICKER CODE HERE-->
                            <select name="group_settings_timezoneid" class="form-control select2" data&ndash;toggle="select2">
                            <?php
                                $current_tz = isset($group_settings_obj->group_settings_timezoneid) ? $group_settings_obj->group_settings_timezoneid : '0';

                                foreach ($timezones as $timezone) { ?>
                                    <option <?php echo $timezone->timezone_id == $current_tz ? 'selected' : ''; ?> value="<?php echo $timezone->timezone_id?>"><?php echo $timezone->timezone_string?></option>
                            <?php } ?>
                            </select>
                        </span>
                 </div>
                 </div>
             </div>
          <!--END TIMEZONE CARD   -->
             <!--begin website create account link-->
             <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Direct Link to Create an Account&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Replace Me."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h5>
                        <!--replace this with PHP for the site's create account link-->
                        <p class="card-text"><?=$_SERVER['SERVER_NAME']?>/createaccount</p>
                      </div>
                    </div>
                  </div><!--end website create account link card-->
         </div><!--END ROW-->
         <div class="row">
             <div class="col mb-3">
                   <h5 class="card-title">
                        404 - Page Not Found Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="replace Me."><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                   </h5>
                   <p class="card-text">This is what your site users will see if they try to find a link which doesn't exist in your site.</p>
                     <!--This is the JS for the Text Editor - replace with Froala if you want-->
                   <!--REPLACE WITH FROALA-->
                    <div id="summernote-basic">
                        <textarea name="group_settings_page_not_found_text" id="group_settings_page_not_found_text" cols="100" rows="10" placeholder=""><?=isset($group_settings_obj->group_settings_page_not_found_text)?$group_settings_obj->group_settings_page_not_found_text:''?></textarea>
                    </div>
                </div>
         </div><!--end row-->
        <!--begin Meta Data Card-->
         <div class="row">
            <div class="col">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Website Meta Description &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is a few sentences which best describe your website. This will appear in organic search engine results for keyword searches on search engines and social media. This should be less than 155 characters."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h5>
                            <p class="card-text">To change the title and Meta Description for individual pages choose Site Build / Pages / Metadata</p>
                            <textarea name="group_settings_meta_description" id="group_settings_meta_description" cols="100" rows="10" placeholder="If you want your site to be found by search engines, please delete this text and write something relevant in this space."><?=isset($group_settings_obj->group_settings_meta_description)?$group_settings_obj->group_settings_meta_description:''?></textarea>

                    </div>
                </div>
            </div>
        </div>
    <!--end meta data card-->
    <!--begin Social Media Meta Data Card-->
    <div class="row">
        <div class="col">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Social Media Meta Data &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Info here"></i></a></h5>
                    <p class="card-text">The Open Graph Meta Data information is important for website Social Media share buttons and Search Engine page rankings.</p>
                    <span class="form-group mb-3">
                        <label for="og-title-input">Website Title For Open Graph (Facebook/Instagram)&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Info here"></i></a></label>
                        <input type="text" value="<?=isset($group_settings_obj->group_settings_og_title)?$group_settings_obj->group_settings_og_title:''?>" name="group_settings_og_title" id="og-title-input" class="form-control">
                    </span><br>
                    <p class="form-group mb-3">
                        <label for="og-url-input">Website URL For Open Graph (Facebook/Instagram)&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Put in the URL of your website including the https://"></i></a></label>
                        <input type="text" value="<?=isset($group_settings_obj->group_settings_og_url)?$group_settings_obj->group_settings_og_url:''?>" name="group_settings_og_url" id="og-url-input" class="form-control" placeholder="https://">
                    </p>
                    <p class="form-group mb-3">
                        <label for="og-image-fileinput">Open Graph Image&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Info here"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <!--This uses a Javascript The code is in the head and before the Body end of the page--><input type="file" id="og-image-fileinput" class="form-control-file">
                        <input type="hidden" value="<?=isset($group_settings_obj->group_settings_og_image)?$group_settings_obj->group_settings_og_image:''?>" id="group_settings_og_image" name="group_settings_og_image" />
                    </p>
                    <span class="card-text"><small>Upload a web-compressed image that is 1200px Wide x 630 px High</small></span>

                </div>
            </div>
        </div>
    </div>
    <div class="row"><!--begin row-->
        <div class="col"><!--begin col-->
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Twitter Meta Data &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Info here"></i></a></h5>
                    <p class="card-text">The Twitter Meta Data information is important for website Twitter share buttons and Search Engine page rankings.</p>
                    <span class="form-group mb-3">
                        <label for="twitter-user-input">Twitter User Name&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter your company's Twitter user name"></i></a></label>
                        <input type="text" value="<?=isset($group_settings_obj->group_settings_twitter_username)?$group_settings_obj->group_settings_twitter_username:''?>" name="group_settings_twitter_username" id="twitter-user-input" class="form-control" placeholder="@">
                    </span><br>
                    <p class="form-group mb-3">
                        <label for="twitter-author-input">Twitter Author User Name&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the user name for a person who authors posts."></i></a></label>
                        <input type="text" value="<?=isset($group_settings_obj->group_settings_twitter_author_username)?$group_settings_obj->group_settings_twitter_author_username:''?>" name="group_settings_twitter_author_username" id="twitter-author-input" class="form-control" placeholder="@">
                    </p>
                    <p class="form-group mb-3">
                        <label for="twitter-image-fileinput">Twitter Image&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Info here"></i></a></label>


                        <input type="file" id="twitter-image-fileinput" class="form-control-file">
                        <input type="hidden" value="<?=isset($group_settings_obj->group_settings_twitter_image)?$group_settings_obj->group_settings_twitter_image:''?>" id="group_settings_twitter_image" name="group_settings_twitter_image" />
                    </p>
                    <span class="card-text"><small>The Twitter image must use an aspect ratio of 2:1 between 300x157 and 4096x4096 pixels. It must be under 5mb in size and should be a .jpg, .png, WEBP or GIF.</small></span>
                     <!--this adds the file upload-->
                </div><!--end card body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
            <div class="d-print-none mt-4">
                    <div class="text-right">
                        <button type="button" onclick="window.location='/admin';" class="btn btn-secondary">Cancel</button>&nbsp;&nbsp;
                        <!--<button type="submit" class="btn btn-info">Save Draft</button>&nbsp;&nbsp;-->
                        <button type="button" class="btn btn-primary save-general-settings">Publish</button>
                    </div>
                </div>
         </div>
        </form><!--end page form-->
    </div><!--end col 10 div-->
</div> <!--end row-->
</div> <!--end container-->
<!--end page content-->
