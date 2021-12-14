
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/content_documents">Manage Content</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/content_documents">Documents</a></li>
                                            <li class="breadcrumb-item active">Add New Document Category</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title" id="top">Add New Document Category</h4>
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
                                Add New Document Category
                              </h3>
                              <p>
                                Use this page to add a Document Category for your Documents. To Manage your Document categories use the <a href="docs-manage-categories.html" title="Manage Document Categories">Manage Document Categories</a> page. You will need to click the Save button to save your changes.
                              </p>
                              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
                            </div><!--end card body div-->
                        </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
                  <div class="row">
                    <div class="col-10 mb-3 text-right">
                      <div class="button-list">
                        <a href="/admin/content_documents" class="btn btn-outline-warning" title="Manage Document">Manage Documents</a>
                        <a href="/admin/document_new" class="btn btn-outline-secondary" title="Add New Document">Add New Document</a>
                        <a href="/admin/docs_manage_categories" class="btn btn-outline-info" title="Manage Document Category">Manage Document Category</a>
                        </div>
                    </div>
              </div><!--end row-->
            </div>
                  <div class="row">
                      <div class="col-10">
                          <div class="card">
                            <div class="card-body">
                              <h2 class="header-title mb-3">Document Category Details</h2>
                            <?php echo form_open('#', array('id' => 'frm_edit_doccat')) ?>
                              <div class="form-group mb-3">
                                  <label for="docscat-input">Title:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use a title that describes the your Document category. The better the title, the better your SEO ranking."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <input type="text" value="<?= $category_details->document_category_title ?>" id="docscat-input" name="document_category_title" class="form-control" placeholder="Document Category Title Here" required>
                              </div>
                                <div class="form-group mb-3"><!--Please add a Froala Editor here-->
                                        <label for="docscat-textarea">Document Category Description:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the description for your Document Category if you wish."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <textarea class="form-control" name="document_category_description" id="docscat-textarea" rows="3" placeholder="Enter the Document item description."><?= $category_details->document_category_description ?></textarea>
                                    </div>
                            </div> <!--end card body-->
                          </div> <!--end card-->
                        </div><!--end col-->
                        <div class="col-sm-5">
                          <div class="card">
                            <div class="card-body">
                              <span class="form-group mb-2">
                                  <label for="reviewauthor-select">Parent Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you want this new category to be a sub category, choose the parent category you wish from the list below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <select class="form-control" id="reviewauthor-select" name="document_category_parent">
                                      <?php foreach($doc_categoryobj as $doc_cat): ?>
                                        <?php if($doc_cat->document_category_id != $category_details->document_category_id): ?>
                                            <option value="<?= $doc_cat->document_category_id ?>" <?= ($doc_cat->document_category_id == $category_details->document_category_parent_id) ? "selected" : "" ?>><?= $doc_cat->document_category_title ?></option>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                  </select>
                                </span>
                            </div>
                          </div>
                      </div>
                          <div class="col-sm-5">
                            <div class="card">
                              <div class="card-body">
                                    <span class="form-group pb-3">
                                            <label for="custom-caturl-input">Custom URL&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you want to create a custom URL for this category, add it here. If nothing is added then your URL will be based on the category name. There should be no spaces in your URL."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                            <input type="text" id="custom-caturl-input" value="<?= ($category_details->custom_url != "") ? $category_details->custom_url : $category_details->document_category_title ?>" name="document_category_customurl" class="form-control" placeholder="https://">
                                        </span>
                              </div>
                            </div>
                        </div>
                  </div><!--end row-->
                  <div class="row">
                        <div class="col-10 mb-3">
                                <div class="button-list">
                                        <a href="#top" class="btn btn-lg btn-warning">Return to Top</a>
                                <div class="text-right">
                                    <input type="hidden" name="user_id" value="<?= $_SESSION['logged_in']['user_obj']->user_id ?>">
                                    <input type="hidden" name="document_category_id" value="<?= $category_details->document_category_id ?>">
                                    <button onclick="window.location='/admin/docs_manage_categories'" type="button" class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                                    <button type="submit" class="btn btn-lg btn-primary" id="save">Save</button>
                                  </div>
                                </div>
                            </div>
              </div><!--end row-->
                <?php echo form_close(); ?>
                </div><!--end container-->
               <!--end page content-->
