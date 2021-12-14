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
                                            <li class="breadcrumb-item"><a href="/admin/blog_manage_categories">Manage Categories</a></li>
                                            <li class="breadcrumb-item active">Add New Category</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title" id="top">Add New Category</h4>
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
                                Add New Category
                              </h3>
                              <p>
                                Use this page to create a new category for blog posts on your website. To Manage Categories use the <a href="/admin/blog_manage_categories" title="Manage Categories">Manage Categories</a> page.
                              </p>
                              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
                            </div><!--end card body div-->
                        </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
            </div>
                  <div class="row">
                      <div class="col-10">
                          <div class="card">
                            <div class="card-body">
                              <h2 class="header-title mb-3">Category Details</h2>
                             <!--Dynamic Form-->
                              <?= form_open('#', array('id' => 'frm_blog_category')); ?>
                              <div class="form-group mb-3">
                                  <label for="cattitle-input">Category Title&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use a title that describes the content of your category. The better the title, the better your SEO ranking."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <input type="text" name="blog_title" id="cattitle-input" class="form-control" placeholder="Enter a Title Here" required>
                                  <span id="err-cattitle" class="text-danger d-none"> <i> *Invalid category title </i> </span>
                                </div>
                              <div class="form-group mb-3">
                                  <label for="blogtitle-input">Custom Category URL&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you want to create a custom URL for your blog categories, enter it here. Otherwise, your post url will be taken from the post title above."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label><!--this is optional - if nothing is entered, then create the title based on the Category title above but add dashes instead of leaving spaces-->
                                  <input type="text" name="blog_custom_url" id="blogtitle-input" class="form-control" placeholder="https://yoursite.com/blog/categories/category-name">
                              </div>
                              <div class="form-group mb-3">
                                <label for="cat-descrip-textarea">Category Description&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter in a description for your blog post category. This information will be displayed on your page under the Category on the Category page. This is what search engines will crawl first to determine if your content should be displayed in search results for this subject. This description will also be used by Google to determine the page ranking. There is no length limit, but for best results, be concise and choose a lead with a hook."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                <textarea class="form-control" name="blog_description" id="cat-descrip-textarea" rows="5" placeholder="Category description here."></textarea>
                                <input type="hidden" value="<?= $this->session->userdata['logged_in']['user_obj']->user_id ?>" name="user_id">
                            </div> <!--content above needs to be injected into the JSON "description" part of the Google Structured data in the head of the category page-->
                            <span class="form-group mb-3">
                              <label for="author-select">Parent Category &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the Parent Category if any that you wish. If none - then choose none."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <select class="form-control" name="blog_parent_category" id="author-select" name="parent-category">
                                  <option class="selected" value="none">None</option><!--dynamic list of existing Categories-->
                                  <?php foreach($blog_object as $blog): ?>
                                    <option value="<?= $blog->blog_category_id ?>"><?= $blog->blog_category_title ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </span>
                            </div> <!--end card body-->
                          </div> <!--end card-->
                        </div><!--end col-->
                  </div><!--end row-->
                  <div class="col-10 mb-3">
                    <div class="button-list">
                    <div class="text-right">
                        <button onclick="window.location='/admin/blog_manage_categories'" type="button" class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                        <button type="submit" id="category_frm_save" class="btn btn-lg btn-primary">Save</button>
                        <!--after hitting Publish the User should be returned to the Manage Blog Categories Page - blogs-manage-categories.html-->
                      </div>
                    </div>
                </div>
                <?= form_close(); ?>
                </div><!--end container-->
