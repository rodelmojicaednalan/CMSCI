
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">Edit Navigation Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>Edit Navigation Category</h4>
                    <p>To Edit the Navigation Item, fill out the form below. This will add an item to your site's main navigation. To add a new page, use Site Build &gt; Pages from the navigation menu at the left of this page. <em>You must click the Save button for your selections to be saved. </em> </p>
                    <p>To learn more about a feature, roll your mouse over the question mark in a circle.</p>
                    <form class="pl-3 pr-3" action="#"><!--**Add the form action here-->
                      <div class="col-sm">
                          <div class="form-group">
                              <label for="nav-cat-name">Navigation Category Name&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Type the Navigation Category name. What you type here is exactly how it will appear in your main site menu."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <input class="form-control" type="text" id="nav-cat-name" placeholder="Existing Category Name Here"><!--**This should be a dynamic entry. The existing Navigation Category that was checked, should appear here.-->
                          </div>
                      </div>
                      <div class="col-sm">
                          <div class="form-group">
                              <label for="nav-url">Edit URL&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Edit the URL of the page to which the Navigation Category above should point. If you do not want this to change, do not enter anything here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <input class="form-control" type="text" id="nav-url" placeholder="https://exampleurl.com"><!--**This should be a dynamic entry. The existing navigation category URL should injected here. If the User does not change this, then it will stay the same.-->
                          </div>
                      </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="nav-cat-name">Column Number&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Change the column in the navigation category where this navigation item will appear. This should be a number. Columns are numbered from left to right. Type one number only."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                <input class="form-control" type="text" id="nav-cat-name" placeholder="Type a number">
                            </div>
                        </div>
                          <div class="col mr-2 align-self-end">
                          <div class="form-group">
                              <label for="nav-cat-name">Menu Order&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Change the number from top to bottom in which this item appears. This should be one number only. If a menu has five items, it must be one number between one and five. For example: if you want it to be the third item down from the top of the menu, type 3."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                              <input class="form-control" type="text" id="nav-cat-name" placeholder="Type a number">
                          </div>
                          </div>
                      <!--end column-->
                      <div class="col-sm mt-2 mb-2"><!--**Replace this with dynamic information from the website webpages-->
                        <label>Parent Navigation&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Change the navigation category to exist under a parent navigation category, or be its own parent navigation category by selecting from the menu below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                          <select class="custom-select">
                              <option selected="">Select Parent Navigation</option>
                              <option value="1">Shop</option><!--replace me with dynamic website info-->
                              <option value="2">Services</option><!--replace me with dynamic website info-->
                              <option value="3">About Us</option><!--replace me with dynamic website info-->
                          </select>
                      </div>
                      <div class="row">
                      <div class="col m-3"><!--**This menu needs dynamic information. Should be filled existing website webpages.-->
                        <label>Navigation Items&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="To change the pages included in this navigation cateogry, select the checkbox next to the page name in this dropdown menu."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Navigation Items
                            </button>
                            <div class="dropdown-menu px-2 py-2" aria-labelledby="dropdownMenu3">
                                <div class="form-check py-2">
                                    <input type="checkbox" class="form-check-input" id="webpage1Check">
                                    <label class="form-check-label" for="dropdownCheck"><!--replace me with dynamic website info-->
                                      Webpage1
                                    </label>
                                </div>
                                <div class="form-check py-2">
                                    <input type="checkbox" class="form-check-input" id="webpage2Check">
                                    <label class="form-check-label" for="dropdownCheck"><!--replace me with dynamic website info-->
                                      Webpage2
                                    </label>
                                </div>
                                <div class="form-check py-2">
                                    <input type="checkbox" class="form-check-input" id="webpage3Check">
                                    <label class="form-check-label" for="dropdownCheck"><!--replace me with dynamic website info-->
                                      Webpage3
                                    </label>
                                </div>
                                  <div class="form-check py-2">
                                  <input type="checkbox" class="form-check-input" id="webpage4Check">
                                  <label class="form-check-label" for="dropdownCheck"><!--replace me with dynamic website info-->
                                    Webpage4
                                  </label>
                                </div>
                            </div>
                          </div>
                        </div><!--end navigation items-->
                      <div class="col mb-3 align-self-end">
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                              <label class="custom-control-label" for="customCheck1">Is Active?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="You must check the Is Active? checkbox for the item to be Active. If you do not check this box, but click save, the item is saved, but will not appear in your navigation menu. If you check Is Active, you must click save for your changes to be saved and the category to be added to your site. "><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                          </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                      <div class="form-group text-center">
                          <button id="cancel" class="btn btn-lg btn-secondary mb-3" type="reset">Cancel</button>&nbsp;&nbsp;
                          <button id="submit" class="btn btn-lg btn-primary mb-3" type="submit">&nbsp;Save&nbsp;</button>
                      </div>
                    </div><!--end modal footer-->
                    </form><!--end the form-->
                </div>