                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="content-documents.html" title="Documents">Documents</a></li>
                                            <li class="breadcrumb-item active">Edit Documents</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title" id="top">Edit Documents</h4>
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
                                Edit a Document
                              </h3>
                              <p>
                                Use this page to edit a Document. To Manage your Documents use the <a href="/admin/content_document" title="Manage Documents">Documents</a> page. We've included many features in this form that will optimize the SEO for your Document. You will need to click the Save button to save your changes.
                              </p>
                              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
                              <p class="text-muted">This feature works best on laptop or desktop computers.</p>
                            </div><!--end card body div-->
                        </div><!--end card-->
                    </div><!--end col-->
                  </div><!--end row-->
            </div>
                  <div class="row">
                      <div class="col-10">
                          <div class="card">
                            <div class="card-body">
                              <h2 class="header-title mb-3">Documents Details</h2>
                              <?php echo form_open_multipart('/admin/edit_document', array('id' => 'frm-edit-document')); ?><!--Dynamic Form-->
                              <div class="form-group mb-3">
                                  <label for="doctitle-input">Display Name:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use a Name that describes the content of your Document and Document category. The better the title, the better your SEO ranking."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <input type="text" name="document_name" value="<?= $document_details[0]->document_title ?>" id="doctitle-input" class="form-control" placeholder="Exisiting Title Here" required>
                              </div>
                                <!--dynamically generated Document item description should be here-->
                                <div class="form-group mb-3"><!--Please add a Froala Editor here-->
                                        <label for="doc-description-textarea">Document Description:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Change the description for your Media item if you wish."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <textarea class="form-control" name="document_description" id="froala-editor" rows="3"><?= $document_details[0]->document_description ?></textarea>
                                </div>
                            </div> <!--end card body-->
                          </div> <!--end card-->
                        </div><!--end col-->
                        <div class="col-sm-5">
                          <div class="card">
                            <div class="card-body">
                              <span class="form-group mb-3">
                                  <label for="doc-select">Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the category you wish for this Document."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <select class="form-control" id="doc-select" name="document_category">
                                    <?php foreach($doc_categoryobj as $category): ?>
                                        <option value="<?= $category->document_category_id ?>" <?= ($document_details[0]->document_category_id == $category->document_category_id) ? 'selected="selected"' : '' ?>" ><?= $category->document_category_title?></option>
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
                                  <label for="docpermissions-select">Document Permissions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose which member group can view this Document. The default is everyone. If you wish only registered Members to see this Document and require a login, choose from the list below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                  <select class="form-control" id="docpermissions-select" name="document_permission">
                                      <!--dynamic list of admins with blog author privledges-->
                                      <option class="selected" value="everyone">Everyone</option><!--this should be the default if they do not make a choice-->
                                      <?php foreach($group_members as $group): ?>
                                          <option value="<?= $group->groups_id ?>"><?= $group->groups_name ?></option><!--dynamic list from the site's member groups-->
                                      <?php endforeach; ?>
                                  </select>
                              </span>
                            </div>
                          </div>
                        </div><!--end cards-->
                        <div class="col-sm-5">
                            <div class="card">
                              <div class="card-body">
                                    <span class="form-group">
                                            <label for="doc1Dropzone">Replace Document?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Upload a new Document to replace the existing one."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                          <!--begin  dropzone-->
                                          <div class="text-center border p-3 mb-2">
                                            <div method="post" class="dropzone" id="document-editform" data-plugin="dropzone" >
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
                                          </div><!--end dropzone-->
                                      </span>
                                      <div class="form-group mb-3">
                                            <label for="doc1caption-input">Document Caption&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you'd like to add a caption to your Document, add it here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                            <input type="text" name="document_caption" value="<?= $document_details[0]->document_caption ?>" id="doc1caption-input" class="form-control" placeholder="Existing Document Caption"><!--the existing Document caption should appear here.-->
                                      </div>
                                      <div class="form-group mb-3">
                                            <label for="file-display">File Name:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the File name of your Document."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <p><?= $document_details[0]->file_upload_name ?></p><!--dynamic data media object file name.-->
                                    </div>
                                    <div class="form-group mb-3">
                                            <label for="doc1link-input">Link to View:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the link to view your Document."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                            <input type="text" name="document_linkview" id="doc1link-input" value="<?= $document_details[0]->url_alias_value ?>" class="form-control" placeholder="https://yoursite.com/documents/123456789.document.pdf" required><!--the existing Document Link to View appears here.-->
                                    </div>
                                    <div class="form-group mb-2">
                                            <label for="doc1download-input">Link to Download:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the link to download your Document."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                            <input type="text" name="document_downloadlink" id="doc1download-input" value="<?= ($document_details[0]->custom_url != "") ? $document_details[0]->custom_url  : $document_details[0]->url_alias_value ?>" class="form-control" placeholder="https://yoursite.com/documents/123456789.document.pdf"><!--the existing Document Link to Download appears here.-->
                                    </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card pb-2">
                              <div class="card-body">
                                <span class="form-group mb-2">
                                   <h3 class="header-title">Existing Document</h3>
                                   <!--dynamically insert the Document thumbnail here depending upon what it is. Alt tag should also be dynamic-->
                                   <!--Itemscope and itemtype should be dynamic depending upon what the User entered for this media object-->
                                   <?= getReaderHTML($document_details[0]->file_upload_path) ?>
                                   <!--This src above should = the Existing Document they are editing.--><!--Remove the example document.-->
                                   <a  href="/documents/download/<?= $document_details[0]->custom_url  ?>" class="btn btn-warning"> <i class="mdi mdi-file-document mr-1"></i> <span>Download</span> </a><!--This allows Download of this document file-->
                                </span>
                                    <!--Dynamic - Radio button should be selected if the Item is Published or Unpublished. -->
                                   <?php
                                    $checkPublished = ($document_details[0]->document_published) ? 'checked="checked"' : "";
                                    $checkUnpublished = (!$document_details[0]->document_published) ? 'checked="checked"' : "";
                                   ?>
                                    <div class="mt-3">
                                            <h3 class="header-title">Status:</h3>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="document_status" value="1" class="custom-control-input" <?= $checkPublished ?>>
                                                <label class="custom-control-label"  for="customRadio1">Published</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="document_status" value="0" class="custom-control-input" <?= $checkUnpublished ?>>
                                                <label class="custom-control-label" for="customRadio2">Unpublished</label>
                                            </div>

                                    </div>
                              </div>
                            </div>
                          </div><!--end cards-->
                  </div><!--end row-->
                  <div class="row">
                        <div class="col-10 mb-3">
                                <div class="text-right">
                                    <input type="hidden" name="document_id" value=<?=$document_details[0]->document_id ?>>
                                    <button onclick="window.location='/admin/content_document'" type="button" class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                                    <button type="submit" class="btn btn-lg btn-primary" id="save">Save</button>
                                </div>
                          </div>
              </div><!--end row-->
                <?php form_close(); ?>
                </div><!--end container-->
                <!--end page content-->
