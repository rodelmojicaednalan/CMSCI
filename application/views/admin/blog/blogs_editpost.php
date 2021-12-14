                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/content_blogs">Manage Content</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/blog_newpost">Create Posts</a></li>
                                            <li class="breadcrumb-item"><a href="/blog">Blog Posts</a></li>
                                            <li class="breadcrumb-item active">Add New Post</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title" id="top">Add New Blog Post</h4>
                                </div>
                            </div>
                        </div>   <!--end row-->
                        <!-- end page title -->
                    </div> <!-- container -->
                </div> <!-- content -->
                <!--begin page content here-->
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body">
                              <h3 class="header-title">
                                Add New Post
                              </h3>
                              <p>
                                Use this page to create a new blog post for your website. This post will appear on your blog page. To Manage Posts use the <a href="/admin/content_blogs" title="Manage Posts">Manage Posts</a> page. We've included many features in this form that will optimize the SEO for your blog post. You will need to click the Save as Draft or Publish button at the bottom to see your changes. If you hit the Preview button you will see a Preview of your blog post.
                              </p>
                              <p>Make sure that your images are compressed for the web. To compress images online use this tool: <a href="https://squoosh.app/" title="squoosh app"> https://squoosh.app/.</a></p>
                              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
                              <p class="text-muted">This feature works best on laptop or desktop computers.</p>
                            </div><!--end card body div-->
                        </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
                  <div class="row">
                        <div class="col-10 mb-3">
                                <div class="button-list">
                                <div class="text-right">
                                    <button onclick="window.location='/admin/content_blogs'" type="button" class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                                       <!--This should go to the real Blog Post not this dummy page-->
                                    <button type="button" id="preview_editpost" class="btn btn-lg btn-info" >Preview</button> 
                                    <button type="button" id="edit_save_draft" class="btn btn-lg btn-success">Save Draft</button>
                                    <button type="button" id="edit_publish_post" class="btn btn-lg btn-primary">Publish</button>
                                  </div>
                                </div>
                            </div>
              </div><!--end row-->
            </div>
                  <div class="row">
                      <div class="col-10">
                          <div class="card">
                            <div class="card-body">
                              <h2 class="header-title mb-3">Blog Post Details</h2>
                              <!-- <form action="#"> Dynamic Form -->
                            <?php echo form_open_multipart('/admin/edit_post', array('id' => 'edit_frm_blog_post')); ?>
                              <div class="form-group mb-3">
                                  <label for="posttitle-input">Post Title&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use a title that describes the content of your blog post. The better the title, the better your SEO ranking."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <input type="text" id="posttitle-input" name="post_title" value="<?= $blog_object->blog_title ?>" class="form-control" placeholder="Enter a Title Here">
                                  <span id="err-post-title" class="d-none"> <i class="text text-danger">*Post Title is required</i> </span>
                                </div>

                              <div class="form-group mb-3">
                                  <label for="blogtitle-input">Custom Post URL&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you want to create a custom URL for your blog post, enter it here. Otherwise, your post url will be taken from the post title above."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <input type="text" id="blogtitle-input" name="custom_post_url" value="<?= $blog_object->blog_title ?>" class="form-control" placeholder="https://yoursite.com/blog/blogpost">
                              </div>
                              <h2 class="header-title mb-3">
                               Post Description Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter in a description for your blog post. This information will be displayed on your page under the first image and under the post title. Since this is the first piece of content in your blog post, this is what search engines will crawl first to determine if your content should be displayed in search results for this subject. This description will also be used by Google to determine the page ranking. There is no length limit, but for best results, be concise and choose a lead with a hook."><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                              </h2>
                                <textarea id="froala-editor" name="post_description" class="post_description"  required>
                                  <?php if($blog_object->blog_preview_text): ?>
                                    <?= $blog_object->blog_preview_text ?>
                                  <?php else: ?>
                                    <p>Use the text editor to style your page Description.</p>
                                    <p><strong>Replace this text</strong></p>
                                    <p>Write your article's lead paragraph here. This description will be visible on the page. This is crucial for good SEO. There is no limit to how long this can be, but for best results, be concise.</p>
                                    <?php endif; ?>
                                  </textarea>
                                  <!--content above needs to be injected into the JSON "description" part of the Google Structured data in the head of the blog post-->
                            </div> <!--end card body-->
                          </div> <!--end card-->
                        </div><!--end col-->
                        <div class="col-sm-5">
                          <div class="card">
                            <div class="card-body">
                              <span class="form-group mb-3">
                                  <label for="author-select">Post Author&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the Author's name from the list below. These are Site Administrators who have blog authorship privileges."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <select class="form-control" name="post_author" id="author-select">
                                        <?php foreach($blogAuthors as $blog_author): ?>
                                            <option value="<?= $blog_author->user_id ?>" <?= ($blog_object->user_id == $blog_author->user_id) ? 'selected="selected"' : "" ?>><?= $blog_author->user_name ?></option>
                                        <?php endforeach; ?>
                                  </select>
                                </span>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-5">
                          <div class="card">
                            <div class="card-body">
                              <span class="form-group mb-3">
                                  <label for="permissions-select">Post Permissions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose which member group can view the content of this post. The default is everyone. If you wish only registered Members to see this post and require a login, choose from the list below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <select class="form-control" id="permissions-select" name="post_permission">
                                      <option value="0">Everyone</option><!--this should be the default if they do not make a choice-->
                                        <?php foreach($group_members as $group_member): ?>
                                            <option value="<?= $group_member->groups_id ?>" <?= ($group_member->groups_id == $blog_object->blog_permission) ? 'selected="selected"' : "" ?>><?= $group_member->groups_name ?></option>
                                        <?php endforeach; ?>
                                  </select>
                              </span>
                            </div>
                          </div>
                        </div><!--end cards-->
                        <div class="col-sm-5">
                            <div class="card">
                              <div class="card-body">
                                <span class="form-group mb-3">
                                    <label for="category-select">Post Cateogry&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the Category with which you want this post to appear. To add a new category or to edit your categories, click the Manage Categories Button."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                    <select class="form-control" id="category-select" name="post_blog_category">
                                        <?php foreach($blogCategories as $blog_category): ?>
                                            <option value="<?= $blog_category->blog_category_id ?>" <?= ($blog_object->blog_category_id == $blog_category->blog_category_id) ? 'selected="selected"' : "" ?>"><?= $blog_category->blog_category_title ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                  </span>
                                  <h4 class="header-title mt-3">Click Below to Add or Manage your categories</h4>
                                  <span class="button-list">
                                      <a href="blogs-manage-categories.html" class="btn btn-primary" title="Manage Categories">Manage Categories</a>
                                  </span>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card pb-2">
                              <div class="card-body">
                                <span class="form-group mb-3">
                                    <label for="keyword-textarea">Post Keywords / Tags&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Add the Keywords/Tags you wish to use with this post. Seperate your Keywords by a comma."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                    <textarea class="form-control" id="keyword-textarea" name="post_keyword" rows="5" placeholder="keyword 1, keyword 2, keyword 3"><?= $blog_object->blog_tags ?></textarea>
                                </span>
                              </div>
                            </div>
                          </div><!--end cards-->
                          <div class="col-sm-5"><!-- cards-->
                            <div class="card">
                              <div class="card-body">
                                <span class="form-group">
                                        <label for="image1Dropzone">Post Image 1&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose an image for the first image on your page. For best results, upload a web compressed image and make sure that it is no larger than 850px to 900px wide. You can also paste a video embed code here as well."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <!--this is number 1 of potentially 3 images-->
                                      <!--begin image dropzone-->
                                      <div class="text-center border p-3 mb-3 dropzone"><!--this is number 1 of potentially 3 images-->
                                           
                                              <div class="fallback">
                                                   <input name="post_image1" type="file" />
                                              </div>
                                              <div class="dz-message needsclick">
                                                  <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                  <h3>Drop files here or click to upload.</h3>
                                              </div>
                                          
                                      </div>
                                  <p class="text-danger d-none" id="err-post-img1">*Please Add first image in your post</p>
                                      <!--end dropzone-->
                                  <input type="hidden" id="blog_file_upload_id" value="<?= ($blog_object->blog_images[0]->file_upload_name != "") ? $blog_object->blog_images[0]->file_upload_id : "" ?>" data-id="<?= $blog_object->blog_images[0]->file_upload_id ?>">
                                  
                                  <div class="preview_existing_blog<?= $blog_object->blog_images[0]->file_upload_id ?>">
                                      <?php if(!empty($blog_object->blog_images)): ?>
                                              <?php if($blog_object->blog_images[0]->file_upload_name != ""): ?>
                                              <label for="">Existing Post Image 1&nbsp;</label>
                                                <div class="text-center border p-3 mb-3">
                                                  <img src="<?= base_url().$blog_object->blog_images[0]->file_upload_path ?>" height="50%" width="50%"></img>
                                                  
                                                </div>
                                                <input type="hidden" name="post_image_name1" value="<?= $blog_object->blog_images[0]->file_upload_name ?>">
                                                <input type="hidden" name="post_image_path1" value="<?= $blog_object->blog_images[0]->file_upload_path ?>">
                                                <input type="hidden" name="post_image_size1" value="<?= $blog_object->blog_images[0]->file_upload_size ?>">
                                                <input type="hidden" name="post_image_iscopy1" value="1">
                                              <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                  <div class="text-center dz-delete-preview0 mb-3" data-name="<?= $blog_object->blog_images[0]->file_upload_name ?>" data-id="<?= $blog_object->blog_images[0]->file_upload_id ?>">
                                    <button type="button" id="preview_existing_delete" class="btn btn-danger btn-icon btn-rounded" value="submit"><i class="mdi mdi-delete"></i>&nbsp;Delete Image</button> 
                                  </div>
                                  </span>
                                  <span class="form-group mb-3">
                                        <label for="image1caption-input">Post Image 1 Caption&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you'd like to add a caption to your image, add it here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <input type="text" id="image1caption-input" name="post_image1_caption" value="<?= $blog_object->blog_images[0]->caption ?>" class="form-control mb-3" placeholder="Optional Image Caption">
                                  </span>

                      

                              </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card">
                              <div class="card-body pb-8">
                                <span class="form-group">
                                  <label for="meta-textarea">Post Meta Description&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter in a description for your blog post. This information will be not be visible on the page but will be displayed by search engines when they display search results. This is very important to guarentee good SEO. Your description should concise sentences that best describe what your post is about and should be no more than 120 to 158 characters long."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <!--PHP HERE-->
                                  <textarea class="form-control mb-3" name="post_meta" id="meta-textarea" rows="10" placeholder="Your description should be no more than 120 to 158 characters. This description will not be visible on the page."><?= $blog_object->blog_meta_description ?></textarea>
                                </span>
                                <span id="err-post-meta" class="d-none"> <i class="text text-danger">*Post Meta Description is required</i> </span>
                              </div>
                            </div>
                          </div><!--end cards-->
                          <div class="col-10"><!--begin article card-->
                              <div class="card">
                                  <div class="card-body">
                                      <span class="form-group">
                                        <!--PUT A FROALA EDITOR HERE FOR TEXT ENTRY--><!--Please add the code so that the Froala editor can add H styling, links and images here. The full Froala code has not been added.-->
                                        <h2 class="header-title mb-3">
                                                Post Article Part 1&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the text for the first section of your article here. This can be styled with paragraph breaks and you can add hyperlinks to the article."><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                               </h2>
                                               <textarea id="froala-editor" name="post_article1"><?= $blog_object->blog_body[0]->content_article ?></textarea>  <!--content above needs to be added to blog page - this is the first part of the blog post content.-->
                                        </span>
                                  </div><!--end card body-->
                              </div><!--end card-->
                          </div><!--end col-->
                          <div class="col-sm-5"><!-- cards-->
                            <div class="card">
                              <div class="card-body">
                                <span class="form-group"><!--Please adjust this so that the image uploader will work this is only a placeholder-->
                                        <label for="image2Dropzone">Post Image 2&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose an image for the first image on your page. For best results, upload a web compressed image and make sure that it is no larger than 850px to 900px wide."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <!--this is number 1 of potentially 3 images-->
                                      <!--begin image dropzone-->
                                      <div class="text-center border p-3 mb-4 dropzone"><!--this is number 2 of potentially 3 images-->
                                          <!-- <form action="/" method="post" class="dropzone" id="image2Dropzone" data-plugin="dropzone" data-previews-container="#file-previews2"
                                              data-upload-preview-template="#uploadPreviewTemplate"> -->
                                              <div class="fallback">
                                                  <input name="post_image2" type="file" />
                                              </div>
                                              <div class="dz-message needsclick">
                                                  <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                  <h3>Drop files here or click to upload.</h3>
                                              </div>
                                         <!-- </form>  -->
                                      </div><!--end dropzone-->
                                  <div class="preview_existing_blog<?= $blog_object->blog_images[1]->file_upload_id ?>">
                                    <?php if(!empty($blog_object->blog_images)): ?>
                                              <?php if($blog_object->blog_images[1]->file_upload_name != ""): ?>
                                                  <label for="">Existing Post Image 2&nbsp;</label>
                                                  <div class="text-center border p-3 mb-3">
                                                    <img src="<?= base_url().$blog_object->blog_images[1]->file_upload_path ?>" height="50%" width="50%"></img>

                                                  </div>
                                                  <input type="hidden" name="post_image_name2" value="<?= $blog_object->blog_images[1]->file_upload_name ?>">
                                                  <input type="hidden" name="post_image_path2" value="<?= $blog_object->blog_images[1]->file_upload_path ?>">
                                                  <input type="hidden" name="post_image_size2" value="<?= $blog_object->blog_images[1]->file_upload_size ?>">
                                                  <input type="hidden" name="post_image_iscopy2" value="1">
                                              <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                  <div class="text-center dz-delete-preview1 mb-3" data-name="<?= $blog_object->blog_images[1]->file_upload_name ?>"  data-id="<?= $blog_object->blog_images[1]->file_upload_id ?>">
                                    <button type="button" class="btn btn-danger btn-icon btn-rounded" id="preview_existing_delete"  value="submit"><i class="mdi mdi-delete"></i>&nbsp;Delete Image</button> 
                                  </div>
                                  </span>
                                  <span class="form-group mb-3">
                                        <label for="image2caption-input">Post Image 2 Caption&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you'd like to add a caption to your image, add it here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <input type="text" id="image2caption-input" name="post_image2_caption" value="<?= $blog_object->blog_images[1]->caption ?>" class="form-control mb-3" placeholder="Optional Image 2 Caption">
                                  </span>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card">
                              <div class="card-body pb-3">
                                <span class="form-group mb-3">
                                        <h2 class="header-title mb-3">Post Large Blockquote&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add two Blockquotes to your article. This is a large blockquote text area which will stand out in your article. It's a good idea to do this to highlight a section or quote from your article or from another source."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                                  <!--add the full Froala edito here it should have image links and styling added HERE-->
                                  <div class="mb-3" ><!--This is Post Large Blockquote-->
                                        <textarea id="froala-editor" name="post_blockquote1"><?= $blog_object->blog_body[0]->blockquote ?></textarea>
                                    </div>

                                </span>
                                 <span class="form-group">
                                        <label for="blockquote-author-input">Post Small Blockquote - Author&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add an optional author to your Blockquote here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <!--This is Post Blockquote Large Author - Should be in blockquote-footer Author -->
                                        <input type="text" id="blockquote-author-input" value="<?= $blog_object->blog_body[0]->blockquote_author ?>"  name="post_blockquote_author1" class="form-control mb-2" placeholder="Optional Blockquote Author here.">
                                  </span>
                                  <span class="form-group mb-3">
                                        <label for="blockquote-cite-input">Post Large Blockquote - Publication&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add an optional Publication or source to your Blockquote here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <!--This is Post Blockquote Large Publication - CITE - Should be in blockquote-footer Publication -->
                                        <input type="text" id="blockquote-cite-input" value="<?= $blog_object->blog_body[0]->blockquote_publication ?>"  name="post_blockquote_publication1"  class="form-control" placeholder="Optional publication or source.">
                                  </span>
                              </div>
                            </div>
                          </div><!--end cards-->
                          <div class="col-10">
                              <div class="card">
                                  <div class="card-body">
                                        <span class="form-group">
                                                <label for="header2-input">Post Header 2&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add an optional Header 2 to your Post Article Part 2, add it here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                <!--This is Post Header 2 - Should be a h2 on the page -->
                                                <input type="text" id="header2-input"  name="post_header2" value="<?= $blog_object->blog_body[1]->content_header ?>"  class="form-control  mb-3" placeholder="Optional Header 2">
                                          </span>
                                          <span class="form-group mb-3">
                                                <label for="blockquote1-textarea">Post Content Block 2&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add different sections to your blog post article. This is Post Content Block 2 and will appear below the areas above."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                <!--add the full Froala edito here it should have image links and styling added HERE-->
                                                <div class="mb-3"><!--This is Post Content Blockquote #1-->
                                                        <textarea id="froala-editor" name="post_article2"><?= $blog_object->blog_body[1]->content_article ?></textarea>
                                                </div>  <!--content above needs to be added to blog page - this is the blockquote #1 - optional content.-->
                                              </span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-10"><!--begin article card-->
                            <div class="card">
                                <div class="card-body">
                                        <span class="form-group">
                                                <label for="header3-input">Post Header 3&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add an optional Header 3 to your Post Article Part 3, add it here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                <!--This is Post Header 2 - Should be a h2 on the page -->
                                                <input type="text" id="header3-input" name="post_header3" value="<?= $blog_object->blog_body[2]->content_header ?>"  class="form-control  mb-3" placeholder="Optional Header 2">
                                          </span>
                                    <span class="form-group">
                                      <!--PUT A FROALA EDITOR HERE FOR TEXT ENTRY--><!--Please add the code so that the Froala editor can add H styling, links and images here. The full Froala code has not been added.-->
                                      <h2 class="header-title mb-3">
                                              Post Article Part 3&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the text for the second section of your article here. This can be styled with paragraph breaks and you can add hyperlinks to the article."><i class="dripicons mdi mdi-help-circle-outline"></i></a>
                                             </h2>
                                             <textarea id="froala-editor" name="post_article3"><?= $blog_object->blog_body[2]->content_article ?></textarea>   <!--content above needs to be added to blog page - this is the first part of the blog post content.-->
                                      </span>
                                </div><!--end card body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        <div class="col-sm-5"><!-- cards-->
                            <div class="card">
                              <div class="card-body">
                                <span class="form-group"><!--Please adjust this so that the image uploader will work this is only a placeholder-->
                                        <label for="image2Dropzone">Post Image 3&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose an image for the third image on your page. For best results, upload a web compressed image and make sure that it is no larger than 850px to 900px wide."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <!--this is number 1 of potentially 3 images-->
                                      <!--begin image dropzone-->
                                      <div class="text-center border p-3 mb-4 dropzone"><!--this is number 3 of potentially 3 images-->
                                          <!-- <form action="/" method="post" class="dropzone" id="image3Dropzone" data-plugin="dropzone" data-previews-container="#file-previews3"
                                              data-upload-preview-template="#uploadPreviewTemplate"> -->
                                              <div class="fallback">
                                                  <input name="post_image3" type="file" />
                                              </div>
                                              <div class="dz-message needsclick">
                                                  <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                  <h3>Drop files here or click to upload.</h3>
                                              </div>
                                        <!--  </form>  -->
                                      </div><!--end dropzone-->
                                  <div class="preview_existing_blog<?= $blog_object->blog_images[2]->file_upload_id ?>">
                                  <?php if(!empty($blog_object->blog_images)): ?>
                                              <?php if($blog_object->blog_images[2]->file_upload_name != ""): ?>
                                                  <label for="">Existing Post Image 3&nbsp;</label>
                                                  <div class="text-center border p-3 mb-3">
                                                    <img src="<?= base_url().$blog_object->blog_images[2]->file_upload_path ?>" height="50%" width="50%"></img>
                                                   
                                                  </div>
                                                  <input type="hidden" name="post_image_name3" value="<?= $blog_object->blog_images[2]->file_upload_name ?>">
                                                  <input type="hidden" name="post_image_path3" value="<?= $blog_object->blog_images[2]->file_upload_path ?>">
                                                  <input type="hidden" name="post_image_size3" value="<?= $blog_object->blog_images[2]->file_upload_size ?>">
                                                  <input type="hidden" name="post_image_iscopy3" value="1">
                                              <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                  <div class="text-center dz-delete-preview2 mb-3" data-name="<?= $blog_object->blog_images[2]->file_upload_name ?>" data-id="<?= $blog_object->blog_images[2]->file_upload_id ?>">
                                    <button type="button" class="btn btn-danger btn-icon btn-rounded" id="preview_existing_delete" value="submit"><i class="mdi mdi-delete"></i>&nbsp;Delete Image</button> 
                                  </div>
                                  </span>
                                  <span class="form-group mb-3"><!--Image 3 Caption-->
                                        <label for="image3caption-input">Post Image 3 Caption&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you'd like to add a caption to your image, add it here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <input type="text" id="image3caption-input" name="post_image3_caption" value="<?= $blog_object->blog_images[2]->caption ?>" class="form-control mb-3" placeholder="Optional Image 2 Caption">
                                  </span>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card">
                              <div class="card-body pb-3">
                                <span class="form-group mb-3">
                                        <h2 class="header-title mb-3">Post Small Blockquote&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add two Blockquotes to your article. This is a smaller blockquote text area which will stand out in your article. It's a good idea to do this to highlight a section or quote from your article or from another source."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                                  <!--add the full Froala edito here it should have image links and styling added HERE-->
                                        <div class="mb-3" ><!--This is Post SmallBlockquote-->
                                                    <textarea id="froala-editor" name="post_blockquote2"><?= $blog_object->blog_body[1]->blockquote ?></textarea>
                                        </div>
                                </span>
                                 <span class="form-group">
                                        <label for="blockquotesm-author-input">Post Small Blockquote - Author&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add an optional author to your Blockquote here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <!--This is Post Blockquote Large Author - Should be in blockquote-footer Author -->
                                        <input type="text" id="blockquotesm-author-input" name="post_blockquote_author2" value="<?= $blog_object->blog_body[1]->blockquote_author ?>" class="form-control mb-2" placeholder="Optional Blockquote Author here.">
                                  </span>
                                  <span class="form-group mb-3">
                                        <label for="blockquotesm-cite-input">Post Small Blockquote - Publication&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add an optional Publication or source to your Blockquote here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <!--This is Post Blockquote Large Publication - CITE - Should be in blockquote-footer Publication -->
                                        <input type="text" id="blockquotesm-cite-input" name="post_blockquote_publication2" value="<?= $blog_object->blog_body[1]->blockquote_publication ?>" class="form-control" placeholder="Optional publication or source.">
                                  </span>
                              </div>
                            </div>
                          </div><!--end cards-->
                          <div class="col-sm-5"><!-- cards-->
                            <div class="card">
                              <div class="card-body">
                                <span class="form-group"><!--Please adjust this so that the image uploader will work this is only a placeholder-->
                                        <label for="VideoEmbed">Optional Post Video Embed&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Copy the embed code from the video site and post it here to embed your video."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <p>You can either have three images on your blog page or you can make the last image on the page be an embedded video from YouTube or Vimeo. Insert the video embed code below. This is optional.</p>
                                        <!--this is will replace the last image on the page.-->
                                      <!--begin video embed js Froala has one - so please use that-->
                                      <script src="https://cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
                                      <!--REMOVE THIS TEXT AREA AFTER THE FROALA VIDEO EMBED IS WORKING--><!--I think this is Embedly-->
                                      <p>
                                            <div class="mb-3" ><!--This is Video Embed Code-->
                                                    <textarea id="froala-editor" name="post_article5"><?= $blog_object->blog_body[4]->content_article ?></textarea>

                                            </div>
                                  </span>
                                  <span class="form-group"><!--Image 3 Caption-->
                                        <label for="videocaption-input">Post Video Caption&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you'd like to add a caption to your video, add it here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <input type="text" id="videocaption-input" name="post_header5" value="<?= $blog_object->blog_body[4]->content_header ?>" class="form-control mb-3" placeholder="Optional Video Caption">
                                  </span>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card">
                              <div class="card-body">
                                    <span class="form-group">
                                            <label for="header4-input">Post Header 4&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You can add an optional fourth header to your post here this will appear above the text you enter below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                            <!--This is Post Blockquote Large Author - Should be in blockquote-footer Author -->
                                            <input type="text" name="post_header4" value="<?= $blog_object->blog_body[3]->content_header ?>" id="header4-input" class="form-control mb-4" placeholder="Optional Blockquote Author here.">
                                      </span>

                                <span class="form-group mb-6">
                                        <h2 class="header-title">Content Block 4&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Add a fourth content block to your post or article here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                                        <p>Add an optional area of text to your post. Enter your content below.</p>
                                  <!--add the full Froala edito here it should have image links and styling added HERE-->
                                          <div class="mb-3" ><!--This is Post SmallBlockquote-->
                                                  <textarea id="froala-editor" name="post_article4"><?= $blog_object->blog_body[3]->content_article ?></textarea>
                                          </div>

                                  <input type="hidden" name="blog_id" value="<?= $blog_object->blog_id ?>">
                                  <input type="hidden" id="blog_status" value="<?= $blog_object->blog_status ?>">
                                  <input type="hidden"  id="edit_save_type">

                                </span>
                              </div>
                            </div>
                          </div><!--end cards-->
                  </div><!--end row-->
                  <div class="row">
                        <div class="col-10 mb-3">
                                <div class="button-list">
                                        <a href="#top" class="btn btn-lg btn-warning">Return to Top</a>
                                <div class="text-right">
                                    <button onclick="window.location='/admin/content_blogs'" type="button" class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                                        <!--This should go to the real Blog Post not this dummy page-->
                                    <button type="button" id="preview_editpost" class="btn btn-lg btn-info" >Preview</button> 
                                    <button type="button" id="edit_save_draft" class="btn btn-lg btn-success">Save Draft</button>
                                    <button type="button" id="edit_publish_post" class="btn btn-lg btn-primary">Publish</button>
                                  </div>
                                </div>
                            </div>
                        </div><!--end row-->
  <!--end container-->
              <?php echo form_close(); ?>
                <!-- </form> -->
                <!--end page content-->
