<?php
$CI =& get_instance();
?>
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
                                            <li class="breadcrumb-item active">Blog Posts</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Blog Posts</h4>
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
                              Manage Blog Posts
                              </h3>
                              <p>
                                Use this section to create and manage your blog posts. This is for blog content only. If you wish to create and manage, recipes, job postings or book/film/music reviews, please visit the pages for each content type from the left hand navigation.
                              </p>
                              <p>To Add a New Post, click the <a href="/admin/blog_newpost" title="Add New Post">Add New Post</a> button below. To Edit an existing post, check the box next to the post and hit the Edit Post button, to Manage your Blog Categories, click the <a href="/admin/blog_manage_categories" title="Manage Categories">Manage Categories</a> button.</p>
                              <p>You must check the box next to a post to publish, delete or share the post. You can also see the post's SEO statistics, share the post on social media and edit the post.</p>
                        </div><!--end card body-->
                      </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
                    <!-- place of seo old modal -->
                    <?=$CI->load->view('admin/blog/modal/seo', array(), true)?>
                    <!-- share post modal -->
                    <?=$CI->load->view('admin/blog/modal/share', array(), true)?>
                    <!-- Delete Alert Modal -->
                      <div id="blog-delete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-sm">
                                  <div class="modal-content modal-filled bg-light">
                                      <div class="modal-body p-4">
                                          <div class="text-center">
                                              <i class="dripicons-wrong h1"></i>
                                              <h4 class="mt-2">Are you Certain?</h4>
                                              <p class="mt-3">This will delete this/these post(s) from your site. Are you sure you want to do this?</p>
                                              <button type="button" class="btn btn-danger my-2" id="blog-delete" data-dismiss="modal">Yes, Delete Post(s)</button>
                                          </div>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

                           <!--END THE MODALS BEGIN PAGE CONTENT-->
                      <!--END ROW-->
                  <!--begin buttons-->
                  <div class="row justify-content">
                    <div class="col-3">
                      <form action="#"><!--Make this form work!-->
                        <label for="postaction-select">Group Post Actions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the Checkbox in the posts table below, then Choose the post Action in the dropdown list below, and click the Apply Button. You can select more than one post for group actions."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                          <select class="form-control" id="postaction-select">
                              <option class="selected">Choose One</option>
                              <option value="unpublish">Unpublish Post(s)</option>
                              <option value="delete" >Delete Post(s)</option><!--This should be dynamic and open the warning modal above.-->
                          </select>
                      </div>
                    <div class="col-2 mt-4">
                      <button id="apply_action" type="button" class="btn btn-outline-primary">Apply</button>
                    </div>
                  </form>
                   <!--end col-->
                   <div class="col-7 mt-4">
                      <div class="button-list">
                        <a href="/admin/content_blogs" class="btn btn-outline-primary selected" title="Manage Posts">Manage Posts</a>
                        <a href="/admin/blog_newpost" class="btn btn-outline-secondary" title="Add New Post">Add New Post</a>
                          <a href="/admin/blog_manage_categories" class="btn btn-outline-warning" title="Manage Categories">Manage Categories</a>
                        </div>
                    </div>
                  </div><!--end row-->
                  <!--begin Blog Posts Table-->
                  <div class="row mt-3">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="header-title mb-4">Blog Posts&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the posts. You can search posts by using the search box, and you choose how many posts to see on this page. Check the box and click SEO to see the SEO report, click the Publish button to publish your post, and click Share to share it."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                                  <?php if($this->session->flashdata('success_blog')): ?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success_blog') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                  <?php endif; ?>
                                  <table id="blog-list-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                                      <thead>
                                          <tr>
                                              <th>Title</th>
                                              <th>Group</th>
                                              <th>Author</th>
                                              <th>Status</th>
                                              <th>Comments</th>
                                              <th>Categories</th>
                                              <th>Modified</th>
                                          </tr>
                                      </thead>
                                      <!--this table has Dynamically populated information based on current blog posts-->
                                      <tbody>

                                          <?php foreach($blog_posts as $blog_post): ?>
                                          <?php
                                            $featured = (!empty($featured_item)) ? $featured_item[0]->featured_item_content_id : "";
                                            $selected = ($blog_post->blog_status == 0 || $blog_post->blog_id == $featured) ? 'disabled' : '';
                                          ?>
                                          <tr>
                                              <td><span class="custom-control custom-checkbox">
                                                  <input type="checkbox" name="chk_blog_id" class="custom-control-input" data-id="<?= $blog_post->blog_id?>" id="Blog1Check<?=$blog_post->blog_id?>">
                                                  <label class="custom-control-label" for="Blog1Check<?=$blog_post->blog_id?>"><?=$blog_post->blog_title?></label>
                                                  </span><br>
                                                    <button id="btn_edit_post"  data-id="<?= $blog_post->blog_id ?>" class="btn btn-sm btn-warning btn-rounded" title="Edit">Edit</button>
                                                    <button id="<?= ($blog_post->blog_status == 0 || $blog_post->blog_published_date == "0000-00-00 00:00:00") ? "publish_post" : "unpublish_post" ?>" data-id="<?= $blog_post->blog_id ?>" class="btn btn-sm btn-primary btn-rounded" type="submit"><?= ($blog_post->blog_status == 0 || $blog_post->blog_published_date == "0000-00-00 00:00:00") ? "&nbsp Publish &nbsp" : "Unpublish" ?></button> <!--Dynamic to go to the Edit Page for this Post-->
                                                    <button id="seo_post" data-id="<?= $blog_post->blog_id ?>" type="button" class="btn btn-sm btn-secondary btn-rounded" >SEO</button>
                                                    <button type="button" id="share_post" data-url="<?= base_url().'/blog/'.$blog_post->url_alias_value ?>" data-id="<?= $blog_post->blog_id ?>" class="btn btn-sm btn-info btn-rounded">Share</button>
                                                    <button type="button" id="feature_post" data-id="<?= $blog_post->blog_id ?>" class="btn btn-sm btn-danger btn-rounded" <?= $selected ?>>Feature</button>
                                                    <button type="button" id="preview_post" data-alias="<?= $blog_post->url_alias_value ?>" data-id="<?= $blog_post->blog_id ?>" class="btn btn-sm btn-warning btn-rounded">Preview</button>
                                              </td>
                                              <td><?= (!empty($blog_post->blog_groups)) ? $blog_post->blog_groups[0]->groups_name : "Everyone" ?></td>
                                              <td><?= $blog_post->author[0]->user_firstname ?></td>
                                              <?php
                                                $published_date     = "";
                                                $published_status   = "";

                                                if($blog_post->blog_published_date == "0000-00-00 00:00:00"){
                                                    $published_date     =  date( "m/d/Y h:i:a", strtotime($blog_post->blog_created_on) );
                                                    $published_status   = "DRAFT";

                                                }elseif($blog_post->blog_published_date != "0000-00-00 00:00:00" && $blog_post->blog_status == 1){
                                                    $published_date     =  date( "m/d/Y h:i:a", strtotime($blog_post->blog_published_date) );
                                                    $published_status   = "PUBLISHED";

                                                }elseif($blog_post->blog_published_date != "0000-00-00 00:00:00" && $blog_post->blog_status == 0){
                                                    $published_date     =  date( "m/d/Y h:i:a", strtotime($blog_post->blog_published_date) );
                                                    $published_status   = "UNPUBLISHED";
                                                }
                                              ?>
                                              <td><?= $published_date ?><br><?= $published_status ?></td>
                                              <td>0 Comments</td>
                                              <td><?= (!empty($blog_post->blog_category)) ? $blog_post->blog_category[0]->blog_category_title : "" ?></td>
                                              <td><?= ($blog_post->blog_modified_on != "0000-00-00 00:00:00") ? date( "m/d/Y", strtotime($blog_post->blog_modified_on) ) : ""; ?></td>
                                          </tr>

                                          <?php endforeach; ?>
                                      </tbody>
                                  </table>
                              </div> <!-- end card body-->
                          </div> <!-- end card -->
                      </div><!-- end col-->
                  </div>
                  <!-- end row-->
                  <!--end button div-->
                </div><!--end container-->
        <!--end page content-->
