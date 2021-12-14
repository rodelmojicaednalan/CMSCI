<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                    <li class="breadcrumb-item"><a href="#">Widgets</a></li>
                    <li class="breadcrumb-item"><a href="#">E-commerce</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
            <h4 class="page-title">Products Widget</h4>
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
                  Products Widget
              </h3>
              <p>	Use this widget to add a product from your e-commerce shop your website. The Product Widget will display a photo of the product. You can write a brief description of the product, and you can write the link Button text. The Link button links to prouduct page in your Boomity e-commerce shop.
                </p>
                <p>To preview your widget click the Preview button. Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
      </div><!--end col-->
  </div><!--end row-->
  <!--product Modal Preview modal content -->
  <div id="product-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Products Widget</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body"><!--This will need to be dynamic information based on their bloggers.-->
                  <!--dynamic php magic needed here-->
                  <div class="col text-center">
                  <p> <img class="card-img-center img-fluid" src="https://source.unsplash.com/random/150x200" alt="*Name of Product">  </p>
                  <p>This is the Product Description</p>
                  <div class="button-list">
                      <button type="button" class="btn btn-success btn-sm">Buy Now</button>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="row mt-2">
      <div class="col-10"><!--begin middle footer area-->
        <div class="card">
          <div class="card-body">
            <h2 class="header-title">
             Products Widget
            </h2>
            <form action="#" class="needs-validation" novalidate><!--Add the PHP to make this form work-->
              <label for="product-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="product-widgetname-input" class="form-control" placeholder="Widget Name" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
               <p class="mt-2">
               <label for="product-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="product-width-input" class="form-control" placeholder="300px" required>
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
              </p>
              <p class="mt-2">
                  <label for="product-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="product-ht-input" class="form-control" placeholder="200px" required>
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="product-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="product-select" required>
                            <option selected>Choose one</option>
                            <option>Left</option>
                            <option>Middle</option>
                            <option>Right</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Position on Page.
                        </div>
                    </div>
                  </p>
                  <div class="mt-3 mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="DisplayNameCheck6">
                        <label class="custom-control-label" for="DisplayNameCheck6">Display Name?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Check the box to display the widget name on your website."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    </div>
                  </div>
                  <!--begin product specific form fields-->
                  <div class="form-group mt-3"><!--PHP needed here-->
                    <label for="product-select">Product List&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose a product from your Boomtiy e-commerce store from this dropdown menu."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <select class="form-control" id="product-select" required>
                        <option selected>Choose a product</option><!--This should be a dynamic list of the site's magento products-->
                        <option>Product 1</option>
                        <option>Product 2</option>
                        <option>Product 3</option>
                    </select>
                    <div class="invalid-feedback">
                        Please Select a product.
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="example-textarea">Product Description&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Write a description for your product in this space. If you leave this blank, no description will be included."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <textarea class="form-control" id="example-textarea" rows="5" placeholder="Write Description"></textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="link-text">Link Button Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Write the text for the button which will link to your product page. Buy Now is one suggestion."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <input type="text" id="link-text" class="form-control" placeholder="Buy Now">
                </div>
                  <!--here are the buttons-->
                      <div class="button-list text-right">
                          <button type="cancel" class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                          <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#product-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
                          <button type="submit" class="btn btn-lg btn-primary" type="submit">Create Widget</button>
                      </div><!--this form is supposed to validate. -->
                  <!--end button div-->
                </form><!--end the form-->
          </div> <!--end card body-->
        </div> <!--end card-->
      </div><!--end col-->


  </div><!--end the row-->
</div>
<!--end page content-->
