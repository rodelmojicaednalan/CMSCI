<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                    <li class="breadcrumb-item"><a href="#">Widgets</a></li>
                    <li class="breadcrumb-item"><a href="#">Social Media</a></li>
                    <li class="breadcrumb-item active">Facebook Like</li>
                </ol>
            </div>
            <h4 class="page-title">Facebook Like Widget</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="container-fluid">
  <div class="row">
      <div class="col-10">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">
               Add a Facebook Like/Share Button
              </h3>
              <p>
                A single click on the Like button will 'like' pieces of content on the web and share them on Facebook. You can also display a Share button next to the Like button to let people add a personal message and customize who they share your content with.
              </p>
              <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
              <!-- FB Like Modal Preview modal content -->
              <div id="fb-like-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Facebook Like Widget</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          </div>
                          <div class="modal-body"><!--This will need to be dynamic information based on their events.-->
                              <!--dynamic php magic needed here-->
                              <div class="col-sm">
                                <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
                            </div> <!-- end col-->
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->


  <div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
              <h2 class="header-title">
                  Facebook Like/Share Button Widget
              </h2>
              <form action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
                <label for="fblike-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" id="fblike-widgetname-input" class="form-control" placeholder="Widget Name" required>
                  <div class="valid-feedback">
                      Looks good!
                  </div>
                  <div class="invalid-feedback">
                      Please provide Widget Name.
                  </div>
                 <p class="mt-2">
                 <label for="fblike-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" id="fblike-width-input" class="form-control" placeholder="300px" required>
                  <div class="valid-feedback">
                      Looks good!
                  </div>
                  <div class="invalid-feedback">
                      Please provide Widget Width.
                  </div>
                </p>
                <p class="mt-2">
                    <label for="fblike-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <!--PHP HERE--> <input type="text" id="fblike-ht-input" class="form-control" placeholder="200px" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                      <span class="invalid-feedback">
                          Please provide Widget Height.
                      </span>
                  </p>
                  <p class="mt-2">
                      <div class="form-group"><!--PHP needed here-->
                          <label for="fblike-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                          <select class="form-control" id="fblike-select">
                              <option selected>Choose one</option>
                              <option id="left">Left</option>
                              <option id="middle">Middle</option>
                              <option id="right">Right</option>
                          </select>
                      </div>
                    </p>
                    <div class="mt-3 mb-3">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="DisplayNameCheck12">
                          <label class="custom-control-label" for="DisplayNameCheck12">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      </div>
                    </div>
                    <!--end button div-->

            </div> <!--end card body-->
          </div> <!--end card-->
    </div><!--end col-->
    <div class="col-10">
        <div class="card">
            <div class="card-body">
              <h2 class="header-title">
                  Facebook Account Info
              </h2>
              <p>You can choose to create your own Facebook like button and inserting the code here, or we can do this for you. To create your own button, visit <a href="https://developers.facebook.com/docs/plugins/like-button" title="Facebook Developers account">https://developers.facebook.com/docs/plugins/like-button</a> and insert the code you generate in the text area below. You must be logged into your Facebook account first. If you generate your code from the Facebook site, then you do not need to fill out the rest of this form. If you do not generate your code from your Facebook account, Please fill out the rest of this form.</p>
              <!--Add the PHP to make this form work-->
              <div class="form-group mb-3">
                  <label for="fb-code-textarea">Paste your Facebook Code Below</label>
                  <textarea class="form-control" id="fb-code-textarea" rows="10"></textarea>
              </div>
              <p>Fill out the rest of this page if you do not generate your own Facebook code.</p>
                <label for="fblike-username-input">Facebook Account UserName&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the username you use for your businesses Facebook account. This is either the email address associated with your Facebook account or a Username."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="text" id="fblike-username-input" class="form-control" placeholder="My Facebook User Name">

                 <p class="mt-2">
                 <label for="fblike-account-input">Facebook Account Password&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the password you use for your Businesses Facebook account."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                  <!--PHP HERE--> <input type="password" id="fblike-account-input" class="form-control" placeholder="Password">
                </p>
            </div> <!--end card body-->
          </div> <!--end card-->
    </div><!--end col-->
    <div class="col-5"><!--FB Like cards-->
        <div class="card">
          <div class="card-body">
              <div class="form-group mb-3">
                  <label for="layout-select">Layout</label>
                  <select class="form-control" id="layout-select">
                      <option selected>Choose One</option>
                      <option id="standard">Standard</option>
                      <option id="boxcount">Box Count</option>
                      <option id="buttoncount">Button Count</option>
                      <option id="button">Button</option>
                  </select>
              </div><!--end form group-->
          </div>
        </div>  <!--end card-->
    </div><!--end col-->
    <div class="col-5">
        <div class="card">
          <div class="card-body">
              <div class="form-group mb-3">
                  <label for="actiontype-select">Action Type</label>
                  <select class="form-control" id="actiontype-select">
                      <option selected>Choose One</option>
                      <option id="like">Like</option>
                      <option id="recommend">Recommend</option>
                  </select>
              </div><!--end form group-->
          </div>
        </div><!--end card-->
      </div><!--end col-->
      <div class="col-5"><!--copyright cards-->
        <div class="card">
          <div class="card-body">
              <div class="form-group mb-3">
                  <label for="button-size-select">Button Size</label>
                  <select class="form-control" id="button-size-select">
                      <option selected>Choose One</option>
                      <option id="small">Small</option>
                      <option id="large">Large</option>
                  </select>
              </div><!--end form group-->
          </div>
        </div>  <!--end card-->
    </div><!--end col-->
    <div class="col-5">
        <div class="card">
          <div class="card-body">
              <div class="form-group mb-3">
                  <label for="colorscheme-select">Color Scheme</label>
                  <select class="form-control" id="colorschem-select">
                      <option selected>Choose One</option>
                      <option id="light">Light</option>
                      <option id="dark">Dark</option>
                  </select>
              </div><!--end form group-->
          </div>
        </div><!--end card-->
      </div><!--end col-->
      <div class="col-10"><!--begin middle footer area-->
          <div class="card">
            <div class="card-body">
                <div class="row justify-content-right mt-3">
                    <div class="col-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="fbShareCheck">
                            <label class="custom-control-label" for="fbShareCheck">Inclue Share Button?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Specifies whether to include a share button beside the Like button."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="fbFriendsCheck">
                            <label class="custom-control-label" for="fbFriendsCheck">Show Friends Faces?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Specifies whether to display profile photos below the button (standard layout only). You must not enable this on child-directed sites."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="COPPACheck">
                            <label class="custom-control-label" for="COPPACheck">Page Directed at Children Under 13?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If your web site or online service, or a portion of your service, is directed to children under 13 you must enable this
                              to comply with US COPPA laws."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        </div>
                    </div>
                  </div><!--end row-->
            </div> <!--end card body-->
          </div> <!--end card-->
        </div><!--end col-->
          <div class="col-10 mb-3">
            <div class="button-list">
            <div class="text-right">
                <button type="button" class="btn btn-lg btn-secondary">Cancel</button>
                <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#fb-like-modal">Preview</button>
                <button type="button" class="btn btn-lg btn-primary">Publish</button>
              </div>
            </div>
        </div>
      </form>
      <!--end row-->
  </div><!--end row-->
</div><!--end container-->
<!--end page content-->
