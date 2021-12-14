  
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
                                            <li class="breadcrumb-item"><a href="/admin/blog_manage_categories">Manage Categories</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Blog Categories</h4>
                                </div>
                            </div>
                        </div>     
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
                              Manage Blog Categories
                              </h3>
                              <p>
                                Use this page to create and manage your blog categories. This is for blog content only. If you wish to create and manage, recipes, job or book/film/music review categories, please visit the pages for each content type from the left hand navigation. 
                              </p>
                              <p>To Add a New Category, click the <a href="/admin/blog_newcat" title="Add New Category">Add New Category</a> button below. To Edit an existing category, check the box next to the category and hit the Edit Category button.</p>
                              <p>You must check the box next to a post to publish, delete or share the post. You can also see the post's SEO statistics, share the post on social media and edit the post.</p>
                        </div><!--end card body-->
                      </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
                  <!-- Delete Alert Modal -->
                  <div id="blog-category-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-danger">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-wrong h1"></i>
                                    <h4 class="mt-2">Are you Certain?</h4>
                                    <p class="mt-3">This will delete this blog category from your site. Are you sure you want to do this?</p>
                                    <button type="button" class="btn btn-secondary my-2" data-dismiss="modal" aria-hidden="true" title="No">Cancel</button>
                                    <button type="button" id="blog_category_delete" class="btn btn-outline my-2"  title="Yes">Yes, I'm Sure</button><!--When they click this button it should delete the category that is checked in the table below.-->
                                </div>
                            </div>
                        </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                                 <!--begin buttons-->
                                 <div class="row justify-content">
                                   <!--end col-->
                                   <div class="col-10 mt-2 text-right">
                                      <div class="button-list">
                                        <a href="/admin/blog_newcat" class="btn btn-primary" title="Add New Post">Add New Category</a>
                                        </div>
                                    </div>
                                  </div><!--end row-->
                                  <!--begin Categories Table-->
                  <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Categories&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the categories. You can search categories by using the search box, and you choose how many categories to see on this page. Check the box and click delete to delete a category. Check the box and click the Edit button to Edit the Category."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                                <?php if($this->session->flashdata('success_blogCategory')): ?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success_blogCategory') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                  <?php endif; ?>
                                <table id="category-datatable" class="table table-striped dt-responsive" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>URL</th>
                                            <th>Parent Category</th>
                                            <th>Description</th>
                                            <th>Items</th>
                                        </tr>
                                    </thead>
                                    <!--this table has Dynamically populated information based on current blog posts-->
                                    <tbody>
                                        <?php foreach($blog_object as $blog_detail): ?>
                                            <tr>
                                                <td><div class="">
                                                        <!-- <input type="radio" id="customRadio<?= $blog_detail->blog_category_id ?>" name="customRadio" class="custom-control-input"> -->
                                                        <label class="" for="customRadio<?= $blog_detail->blog_category_id ?>"><?= $blog_detail->blog_category_title ?></label>
                                                    </div><!--Dynamic Data of the Category name--><br>
                                                    <span class="btn-group mb-2">
                                                    <!--Dynamic to go to the Edit Page for this Category--> <a href="/admin/blog_editcat/<?= $blog_detail->blog_category_id ?>" data-id="<?= $blog_detail->blog_category_id ?>" id="edit_blog_category" class="btn btn-sm btn-warning" title="Edit">Edit</a>
                                                    <button type="button" class="btn btn-sm btn-danger" id="delete_blog_category" title="Delete" data-toggle="" data-id="<?= $blog_detail->blog_category_id ?>" data-target="">Delete</button><!--This will Delete the Category--></span>
                                                </td>
                                                <!-- <td><a href="<?= ($blog_detail->url_alias_value != "") ? base_url().$blog_detail->url_alias_value  : base_url().$blog_detail->blog_category_title ?>"  title="Category Title"><?= ($blog_detail->url_alias_value != "") ? base_url().$blog_detail->url_alias_value  : base_url().$blog_detail->blog_category_title ?></a></td>dynamic data of this category URL -->
                                                <td><a href="/blog/categories/<?= $blog_detail->url_alias_value ?>"  title="Category Title"><?= ($blog_detail->url_alias_value != "") ? base_url().'/blog/categories/'.$blog_detail->url_alias_value  : base_url().'/blog/categories/'.$blog_detail->blog_category_title ?></a></td>
                                                <td><?= (!empty($blog_detail->blog_category_parent_category_id)) ? $blog_detail->blog_category_parent_category_id[0]->blog_category_title  : "" ?></td><!--Dynamic data of the category parent - if none then blank insert NONE-->
                                                <td><?= $blog_detail->blog_category_description?></td><!--dynamic data for the category description-->
                                                <td><?= $blog_detail->blog_count ?></td><!--dynamic data for the number of posts in this category.-->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div><!--end container-->
                <!--end page content-->