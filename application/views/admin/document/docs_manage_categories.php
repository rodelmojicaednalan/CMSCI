                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/content_document">Manage Content</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/content_document">Documents</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/docs_manage_categories">Manage Categories</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Document Categories</h4>
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
                              Manage Document Categories
                              </h3>
                              <p>
                                Use this page to create and manage your Document categories.
                              </p>
                              <p>To Add a New Category, click the <a href="/admin/docs_newcat" title="Add New Category">Add New Category</a> button below. To Edit an existing category, check the button next to the category and hit the Edit Category button. To view the Documents in this category, click the button next to the category name, then click the View button in the table below. </p>
                              To manage your Documents, visit the <a href="/admin/content_document" title="Manage Document">Document page.</a> 
                        </div><!--end card body-->
                      </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
                  <!-- Delete Alert Modal -->
                  <div id="doc-category-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-danger">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-wrong h1"></i>
                                    <h4 class="mt-2">Are you Certain?</h4>
                                    <p class="mt-3">This will delete this Document Category from your site. Are you sure you want to do this?</p>
                                    <button type="button" class="btn btn-secondary my-2" data-dismiss="modal" aria-hidden="true" title="No">Cancel</button>
                                    <button type="button" id="confirm_doccategory_delete" class="btn btn-outline my-2" data-dismiss="modal" title="Yes">Yes, I'm Sure</button><!--When they click this button it should delete the category that is checked in the table below.-->
                                </div>
                            </div>
                        </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                    </div>
                      <!-- Warning Header Modal -->
                <div id="document-unpublish-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="secondary-header-modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header modal-colored-header bg-secondary">
                                    <h4 class="modal-title" id="info-header-modalLabel">Unpublish/Publish Document Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="mt-0">Unpublish Document</h5>
                                    <p>Click The Publish to show this Document Category on your site.</p>
                                    <p>Click Unpublish and the Document Category will not be visible on your site. The Document will not be deleted, but will not be visible online.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    <button type="button" id="unpublish_documentcat" data-id="" class="btn btn-danger" data-dismiss="modal">Unpublish</button>
                                    <button type="button" id="publish_documentcat" data-id="" class="btn btn-primary" data-dismiss="modal">Publish</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                
                                 <!--begin buttons-->
                                 <div class="row justify-content">
                                   <!--end col-->
                                   <div class="col-10 mt-2 text-right">
                                      <div class="button-list">
                                        <a href="/admin/content_document" class="btn btn-outline-info" title="Manage Document">Manage Documents</a>
                                        <a href="/admin/docs_newcat" class="btn btn-outline-primary" title="Add New Category">Add New Category</a>
                                        </div>
                                    </div>
                                  </div><!--end row-->
                                  <!--begin Categories Table-->
                  <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Categories&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the categories. You can search categories by using the search box, and you choose how many categories to see on this page. Check the box and click delete to delete a category. Check the box and click the Edit button to Edit the Category."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                                <?php if($this->session->flashdata('success_doc_category')): ?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success_doc_category') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                  <?php endif; ?>
                                <table id="document_category" class="table table-striped dt-responsive" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>URL</th>
                                            <th>Parent Category</th>
                                            <th>Description</th>
                                            <th>Items</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($doc_categoryobj as $doc_detail): ?>
                                            <tr>
                                                <td><div class="">
                                                        <input type="radio" id="categoryRadio<?= $doc_detail->document_category_id ?>" name="categoryRadio" class="custom-control-input">
                                                        <label class="" for="categoryRadio<?= $doc_detail->document_category_id ?>"><?= $doc_detail->document_category_title ?></label>
                                                    </div><!--Dynamic Data of the Category name--><br>
                                                    <span class="btn-group mb-1">
                                                        <button data-id="<?= $doc_detail->document_category_id ?>" data-url="/document/categories/<?= $doc_detail->url_alias_value ?>" id="viewdoc_category" class="btn btn-sm btn-info" title="View">View</button> 
                                                        <!--Filters the content-media page for this category only-->
                                                        <button type="button" class="btn btn-sm btn-danger" data-id="<?= $doc_detail->document_category_id ?>" title="Delete" id="doc_deletecategory" >Delete</button>
                                                    </span>
                                                    <span class="btn-group">
                                                            <button type="button" data-id="<?= $doc_detail->document_category_id ?>" id="editdoc_category" class="btn btn-sm btn-warning" title="Edit">Edit</button>
                                                            <!--Dynamic to go to the Edit Page for this Category-->
                                                            <button type="button" class="btn btn-sm <?= ($doc_detail->document_category_status == 1) ? "btn-primary" : "btn-secondary" ?>" data-id="<?= $doc_detail->document_category_id ?>" title="Unpublish" id="doc_categorystatus" ><?= ($doc_detail->document_category_status == 1) ? "Published" : "Unpublished" ?></button>
                                                    </span>
                                                </td>
                                                <td><a href="/document/categories/<?= $doc_detail->url_alias_value ?>" data-id="<?= $doc_detail->document_category_id ?>" title="Category Title"><?= base_url().'document/categories/'.$doc_detail->url_alias_value ?></a></td><!--dynamic data of this category URL-->
                                                <td><?= (!empty($doc_detail->category_parent)) ? $doc_detail->category_parent[0]->document_category_title : "" ?></td><!--Dynamic data of the category parent - if none then blank insert NONE-->
                                                <td><?= $doc_detail->document_category_description ?></td><!--dynamic data for the category description-->
                                                <td><?= $doc_detail->document_count ?></td><!--dynamic data for the number of documents in this category.-->
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