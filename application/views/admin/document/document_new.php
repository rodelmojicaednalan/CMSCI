                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/content_document">Manage Content</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/content_document">Documents</a></li>
                                            <li class="breadcrumb-item active">Add New Document</li> 
                                            </ol>
                                    </div>
                                    <h4 class="page-title">Add New Document</h4>
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
                                      Add New Documents
                                    </h3>
                                    <p>
                                      Use this page to add a Document to your site. To Manage your Documents use the <a href="/admin/content_document" title="Manage Documents">Documents</a> page. 
                                    </p>
                                    <p>Please do not upload any documents larger than 25mb. If these are documents you wish to have downloaded from your website, the smaller the better. If you are uploading an Adobe Acrobat file, make sure to use compression within your document for the best results.</p>
                                    <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
                                    <p class="text-muted">This feature works best on laptop or desktop computers.</p>
                                  </div><!--end card body div-->
                              </div><!--end card-->
                          </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-10">
                                <div class="card">
                                  <div class="card-body">
                                    <h2 class="header-title mb-3">Document Details</h2>
                                <?php echo form_open_multipart('#', array('id' => 'frm-new-document')); ?><!--Dynamic Form-->
                                    <div class="form-group mb-3">
                                        <label for="doctitle-input">Document Display Name&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use a title that describes the content of your document and the document type. The better the title, the better your SEO ranking."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <input type="text" id="doctitle-input" name="document_name" class="form-control" placeholder="Document Title Here">
                                    </div>
                                      <div class="form-group mb-3"><!--Please add a Froala Editor here-->
                                              <label for="doc-description-textarea"> Document Description:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the description for your Document if you wish."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                              <textarea class="form-control" id="froala-editor" name="document_description" rows="3" placeholder="Enter the Document description."></textarea>
                                          </div>
                                  </div> <!--end card body-->
                                </div> <!--end card-->
                              </div><!--end col-->
                              <div class="col-sm-5">
                                <div class="card">
                                  <div class="card-body">
                                    <span class="form-group mb-3">
                                        <label for="doc-cat-select">Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the category you wish for this document."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <select class="form-control mb-2" name="document_category" id="doc-cat-select">
                                          <?php foreach($doc_categoryobj  as $document): ?>
                                            <option value="<?= $document->document_category_id ?>"><?= $document->document_category_title ?></option><!--dynamic list of Dcoument categories-->
                                          <?php endforeach; ?>
                                        </select>
                                      </span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="card">
                                <div class="card-body">
                                      <span class="form-group">
                                              <label for="docpermissions-select">Document Permissions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose which member group can view this document. The default is everyone. If you wish only registered Members to see this document and require a login, choose from the list below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                              <select class="form-control mb-2" name="document_permission" id="docpermissions-select">
                                                  <!--dynamic list of admins with blog author privledges-->
                                                  <option class="selected" value="everyone">Everyone</option><!--this should be the default if they do not make a choice-->
                                                  <?php foreach($group_members as $group): ?>
                                                    <option value="<?= $group->groups_id ?>"><?= $group->groups_name ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </span>
                                     </div>
                              </div>
                          </div>
                              <div class="col-10">
                                  <div class="card">
                                    <div class="card-body">
                                          <span class="form-group">
                                                  <label for="media1Dropzone">Upload a Document&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Upload a new document under 25mb."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                                <!--begin image dropzone-->
                                                    <!-- begin image dropzone-->
                                                      <div class="text-center border p-3 mb-3"><!--this is number 1 of potentially 3 images-->
                                                          <div method="post" class="dropzone" id="document-form" data-plugin="dropzone" >
                                                              <div class="fallback">
                                                                  <!-- <input type="file" name="media" multiple /> -->
                                                                  <input type="file" name="file"  />
                                                              </div>
                                                              <input type="hidden" id="document_upload_id">
                                                              <div class="dz-message needsclick">
                                                                  <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                                  <h3>Drop files here or click to upload.</h3>
                                                              </div>
                                                          </div>
                                                      </div><!--end dropzone -->
                                            </span>
                                            <label id="err-document-dropzone" class="text-danger d-none"><i>*Please Upload a File</i></label>
                                    </div>
                                  </div>
                              </div>
                        </div><!--end row-->
                        <div class="row">
                              <div class="col-10 mb-3">
                                      <div class="button-list">
                                      <div class="text-right">
                                          <input type="hidden" name="user_id" value="<?= $this->session->userdata['logged_in']['user_obj']->user_id; ?>">
                                          <button onclick="window.location='/admin/content_document'" type="button" class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                                          <button type="submit" class="btn btn-lg btn-primary" id="save">Save</button>
                                          <!--After Save it should go to Manage Documents page. content.documents.html-->
                                        </div>
                                      </div>
                                  </div>
                    </div><!--end row-->
                      <?php echo form_close(); ?>
                      </div><!--end container-->
                <!--end page content-->
