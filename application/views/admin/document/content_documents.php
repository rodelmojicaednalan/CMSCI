                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#">Manage Content</a></li>
                                            <li class="breadcrumb-item active">Documents</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Documents</h4>
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
                              Manage Documents
                              </h3>
                              <p>
                                Use this section to create and manage your Documents.
                              </p>
                              <p>To Add a New Document, click the <a href="/admin/document_new" title="Add New Document">Add New Document</a> button below. To Edit an existing document, check the box next to the post and hit the <a href="docs-edit.html" title="Edit Document"></a> Edit Document button, to Manage your Document Categories, click the <a href="/admin/docs_manage_categories" title="Manage Categories">Manage Categories</a> button.</p>
                              <p class="text-muted">This page works best on a desktop or laptop computer.</p>
                        </div><!--end card body-->
                      </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
                    <!-- Delete Alert Modal -->
                      <div id="document-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-sm">
                                  <div class="modal-content modal-filled bg-light">
                                      <div class="modal-body p-4">
                                          <div class="text-center">
                                              <i class="dripicons-wrong h1"></i>
                                              <h4 class="mt-2">Are you Certain?</h4>
                                              <p class="mt-3">This will delete this/these Document(s) from your site. Are you sure you want to do this?</p>
                                              <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                              <button type="button" id="cfrm-delete-document" class="btn btn-danger my-2" data-dismiss="modal">Yes, Delete Document(s)</button>
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
                        <label for="postaction-select">Group Documents Actions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the Checkbox in the Document table below, then Choose the Document Action in the dropdown list below, and click the Apply Button. You can select more than one Document for group actions."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                          <select class="form-control" id="document-select">
                              <option class="selected">Choose One</option>
                              <option value="unpublish">Unpublish Document(s)</option>
                              <option value="delete" >Delete Document(s)</option><!--This should be dynamic and open the warning modal above.-->
                          </select>
                      </div>
                    <div class="col-2 mt-4">
                      <button id="document_action" type="button" class="btn btn-outline-primary">Apply</button>
                    </div>
                  </form>
                   <!--end col-->
                   <div class="col-7 mt-4">
                      <div class="button-list">
                        <a href="/admin/content_document" class="btn btn-outline-primary selected" title="Manage Posts">Manage Documents</a>
                        <a href="/admin/document_new" class="btn btn-outline-secondary" title="Add New Post">Add New Document</a>
                          <a href="/admin/docs_manage_categories" class="btn btn-outline-warning" title="Manage Categories">Manage Doc Categories</a>
                        </div>
                    </div>
                  </div><!--end row-->
                  <!--begin Documents Table-->
                  <div class="row mt-3">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="header-title mb-4">Documents&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the documents. You can search documents by using the search box, and you choose how many documents to see on this page. Click the Publish button to publish your documents."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                                  <?php if($this->session->flashdata('success_doc')): ?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success_doc') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                  <?php endif; ?>
                                  <table id="content_document" class="table table-striped dt-responsive nowrap" width="100%">
                                      <thead>
                                          <tr>
                                              <th>Title</th>
                                              <th>Downloadable</th>
                                              <th>Group</th>
                                              <th>Status</th>
                                              <th>Author</th>
                                              <th>Type</th>
                                              <th>Size</th>
                                              <th>Date Modified</th>
                                          </tr>
                                      </thead>
                                      <!--this table has Dynamically populated information based on current blog posts-->
                                      <tbody>
                                        <?php foreach($document_obj as $document): ?>
                                        <?php $modified_date = ($document->document_modified_on != "0000-00-00 00:00:00") ? date( 'm/d/Y', strtotime($document->document_modified_on) ) : "" ?>
                                          <tr>
                                              <td><span class="custom-control custom-checkbox">
                                                  <input type="checkbox" name="chk_doc_id" data-id="<?= $document->document_id ?>" class="custom-control-input" id="Document1Check<?= $document->document_id ?>">
                                                  <label class="custom-control-label" for="Document1Check<?= $document->document_id ?>"><?= $document->document_title ?></label>
                                                  </span><br>
                                                    <button id="<?= ($document->document_published == 0) ? "publish_document" : "unpublish_document" ?>" data-id="<?= $document->document_id ?>"  class="btn btn-sm btn-secondary btn-rounded" type="submit"><?= ($document->document_published == 0) ? "&nbsp Publish &nbsp" : "Unpublish" ?></button>
                                                    <!--Dynamic to go to the Edit Page for this Document-->
                                                    <button id="edit_document" data-id="<?= $document->document_id ?>" class="btn btn-sm btn-primary btn-rounded" title="Edit">Edit</button>
                                                    <button id="preview_document" data-alias="<?= $document->url_alias_value ?>" data-id="<?= $document->document_id ?>" class="btn btn-sm btn-warning btn-rounded" title="Edit">Preview</button>
                                              </td>
                                              <td>
                                                    <input class="text-right document_downloadable" type="checkbox" id="switch<?= $document->document_id ?>" data-document-id="<?= $document->document_id ?>" <?= ($document->document_downloadable ? "checked=''" : "") ?> data-switch="warning" />
                                                    <label for="switch<?= $document->document_id ?>" data-on-label="Yes" data-off-label="No" class=""></label>
                                              </td>
                                              <td>Group</td>
                                              <td><?= ($document->document_published == 1) ? "Published" : "Unpublished" ?></td>
                                              <td><?= (!empty($document->author)) ? $document->author[0]->user_firstname.' '.$document->author[0]->user_firstname : ""  ?></td>
                                              <td><?= $document->document_type ?></td>
                                              <td><?= getReadableFileSize($document->file_upload_size) ?></td>
                                              <td><?= $modified_date ?></td>
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
