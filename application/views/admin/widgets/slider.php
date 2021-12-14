    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                            <li class="breadcrumb-item"><a href="#">Widgets</a></li>
                            <li class="breadcrumb-item"><a href="#">Photo/Video</a></li>
                            <li class="breadcrumb-item active">Slider</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Slider Widget</h4>
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
                Slider
                </h3>
                <p>Use this widget to create an image slider / image carousel for your website.  The Slider will create a serious of images that users can cycle through on your website. You can choose to have your slider autocycle, or choose to make it so that the User must manually cycle the images.  You can determin the speed in which the slider cycles through the images, choose to have overlay text over the slider, choose to show slider thumbnails, choose to open a new window upon click, and choose to show the slider navigation. You can also choose to have your slider link to a URL and have overlay text with or without buttons. 
                </p>
                <p>For best results, all images in your slider should be the same dimensions, (width and height in pixels.) Make sure that your images are compressed for the web. To compress images online use this tool: <a href="https://squoosh.app/" title="squoosh app"> https://squoosh.app/.</a></p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-10">
    <!--here are the buttons-->
        <div class="button-list text-right mt-2 mb-2">
            <button type="cancel" onclick="window.location='/admin/widgets';"  class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
            <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#slider-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
            <button type="submit" class="btn btn-lg btn-primary" type="submit">Create Widget</button>
        </div><!--this form is supposed to validate. -->
    <!--end button div-->
    </form><!--end the form-->
</div>
</div>
    <!-- Slider Preview modal content -->
    <div id="slider-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Slider</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body"><!--This will need to be dynamic information based on their choices.-->
                    <!--dynamic php magic needed here-->
                    <div class="container text-center my-3">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a href="#" title="image link"><img class="d-block w-100 img-fluid" class="d-block w-100" src="https://source.unsplash.com/650x350/?nature" alt="image"></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Image Caption</h3>
                                    <p>Lorem ipsum dolor sit.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <a href="#" title="image link"><img class="d-block w-100 img-fluid" class="d-block w-100" src="https://source.unsplash.com/651x351/?nature" alt="image"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>Image Caption</h3>
                                        <p>Lorem ipsum dolor sit.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <a href="#" title="image link"><img class="d-block w-100 img-fluid" class="d-block w-100" src="https://source.unsplash.com/652x352/?nature" alt="image"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>Image Caption</h3>
                                        <p>Lorem ipsum dolor sit.</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                        <!--should dynamically generate more slides if indicated-->
                    </div><!--end carousel-->
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
                Slider Widget
            </h2>
            <form id="frmwidget" action="#" class="needs-validation frm-slider" novalidate><!--Add the PHP to make this form work-->
                <input type="hidden" name="type" value="slider" />
                <input type="hidden" name="widget_type_id" value="19" />
                <input type="hidden" name="sidebar_widget_id" value="<?=$widget_id?>" />
                <label for="slider-widgetname-input">Name Your Widget&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the name that will appear in the Widget list for adding widgets to your page. It will also appear under this name on the Edit Widget page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="slider-widgetname-input" class="form-control" placeholder="Widget Name" name="sidebar_widget_name" value="<?=$sidebar_widget?$sidebar_widget[0]->sidebar_widget_name:''?>" required>
                <div class="invalid-feedback">
                    Please provide Widget Name.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <p class="mt-2">
                <label for="slider-width-input">Width in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This will be the overall width of the widget on your webpage."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                <!--PHP HERE--> <input type="text" id="slider-width-input" class="form-control" placeholder="300px" name="Width" value="<?=$fields && isset($fields['Width']) ? $fields['Width'] : '' ?>" required>
                <div class="invalid-feedback">
                    Please provide Widget Width.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
                </p>
                <p class="mt-2">
                    <label for="slider-ht-input">Height in Pixels&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is how tall or high your widget will be on your page in pixels."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <!--PHP HERE--> <input type="text" id="slider-ht-input" class="form-control" placeholder="200px" name="Height" value="<?=$fields && isset($fields['Height']) ? $fields['Height'] : '' ?>" required>
                    <span class="invalid-feedback">
                        Please provide Widget Height.
                    </span>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </p>
                <p class="mt-2">
                    <div class="form-group"><!--PHP needed here-->
                        <label for="slider-select">Position on Page&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is roughly the position of this widget on your page."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control" id="slider-select"  name="sidebar_widget_position" required>
                        <option >Choose one</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Left' ? 'selected' : ''?> >Left</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Middle' ? 'selected' : ''?>>Middle</option>
                            <option <?=$sidebar_widget && $sidebar_widget[0]->sidebar_widget_position == 'Right' ? 'selected' : ''?>>Right</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Select the Position on Page.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    </p>
                </div> <!--end card body-->
                </div> <!--end card-->
            </div><!--end col-->
            </div><!--end the row-->
            <div class="row">
                <div class="col-10"> 
                <div class="card">
                    <div class="card-body">
                            <h4 class="header-title">Slider Details</h4>
                            <p>Select from the options below and upload your images for your slider. You can preview your slider by hitting the preview button below.</p>
                        </div><!--end card body-->
                    </div><!--end card-->
                    </div><!--end col-->
                <div class="col-5"><!--cards-->
                    <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-2"><!--PHP needed here-->
                            <label for="slider-no">Number of Slides&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the number of slides you want in your slider"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                            <select class="form-control" id="slider-no" name="Slides" required>
                                <option selected>Choose a number</option>
                                <!--these should be dynamically generated based on the existing blog categories-->
                                <option value="1" <?= $fields && isset($fields['Slides']) && $fields['Slides'] == '1'  ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= $fields && isset($fields['Slides']) && $fields['Slides'] == '2'  ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= $fields && isset($fields['Slides']) && $fields['Slides'] == '3'  ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= $fields && isset($fields['Slides']) && $fields['Slides'] == '4'  ? 'selected' : '' ?>>4</option>
                                <option value="5" <?= $fields && isset($fields['Slides']) && $fields['Slides'] == '5'  ? 'selected' : '' ?>>5</option>
                                <option value="6" <?= $fields && isset($fields['Slides']) && $fields['Slides'] == '6'  ? 'selected' : '' ?>>6</option>
                                
                            </select>
                            <div class="invalid-feedback">
                                Please Select the number of slides.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group mb-2"><!--the JQuery for this is here https://getbootstrap.com/docs/4.2/components/carousel/-->
                            <label for="interval-input">Slide Interval in Seconds&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="The slide interval is the amount of time in seconds that one slide will appear in your slider. This should be a number between 1 and 20 seconds."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                            <input type="number" id="interval-input" class="form-control" placeholder="enter a number between 1 and 20." name="Interval in seconds" value="<?=$fields && isset($fields['Interval in seconds']) ? $fields['Interval in seconds'] : '' ?>" required>
                            <div class="invalid-feedback">
                                Please enter the slide interval number.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    </div>  <!--end card-->
                </div><!--end col-->
                <div class="col-5">
                    <div class="card">
                    <div class="card-body">
                        <div class="custom-control custom-checkbox mb-4">
                            <input type="checkbox" class="custom-control-input" id="autostartCheck" name="Autostart" value="checked" <?= $fields && isset($fields['Autostart']) && $fields['Autostart'] == 'checked'  ? 'checked' : '' ?>>

                            <label class="custom-control-label" for="autostartCheck">Autostart Slider?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Should this slider start automatically?"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        </div>
                        <div class="custom-control custom-checkbox mb-4">
                            <input type="checkbox" class="custom-control-input" id="thumbCheck" name="Show thumbnails" value="checked" <?= $fields && isset($fields['Show thumbnails']) && $fields['Show thumbnails'] == 'checked' ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="thumbCheck">Show Thumbnails?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to show the image thumbnails under the slider."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="navCheck" name="Slider navigation" value="checked" <?=$fields && isset($fields['Slider navigation']) && $fields['Slider navigation'] == "checked" ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="navCheck">Show Slider Navigation?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to show slider navigation in your slider."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        </div>
                    </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
                <div class="row">
                <div class="col-10"><!--cards-->
                    <div class="card">
                    <div class="card-body">
                        <h3 class="header-title mt-2">Slider Image 1 Upload</h3>
                        <!--this is number 1 of potentially 6 images-->
                        <!--begin image dropzone-->
                        <div class="text-center border p-4 mb-3 dropzone" id="SliderDropzone"><!--this is number 1 of potentially 6 images-->
                            <!-- <form action="/" method="post" class="dropzone" id="slider1Dropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate"> -->
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                </div>
                                <input type="hidden" name="Slider Image 1" id="slider_image">
                            <!-- </form>  -->
                        </div><!--end dropzone-->
                        <div class="form-group mb-3">
                        <label for="imageURL-input">Image URL Link</label>
                        <!--PHP HERE--> <input type="text" id="imageURL-input" class="form-control" name="URL Link 1" value="<?=$fields && isset($fields['URL Link 1']) ? $fields['URL Link 1'] : '' ?>" placeholder="https://yourimageurlhere.com">
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" name="Open New Window 1" value="checked" <?=$fields && isset($fields['Open New Window 1']) && $fields['Open New Window 1'] == 'checked'  ? 'checked' : '' ?>  id="Tab1Check">
                            <label class="custom-control-label" for="Tab1Check">Open in New Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to open this link in a new browser tab or to overwrite the current browser tab."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        </div>
                        <h2 class="header-title mt-4">Slide Overlay Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Style some text here to overlay over your slider image."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                        <div class="mb-4"><!--text editor - use this or add Froala code-->
                            <!--This is another editor - you can use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
                        <textarea id="froala-editor" name="Overlay Text 1">
                        <?=$fields && isset($fields['Overlay Text 1']) ? $fields['Overlay Text 1'] : '<p>Use the editor to style your overlay text.</p>' ?>
                        </textarea><!--This isn't working now - use Froala Text Editor here-->
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="Include1Check" name="Overlay Button 1" value="checked" <?=$fields && isset($fields['Overlay Button 1']) && $fields['Overlay Button 1'] == 'checked'  ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="Include1Check">Include Button?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to include a button in your Slide Overlay Text."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        </div>
                        <div class="form-group mb-3">
                            <label for="buttontext-input">Button Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="What should your button say?"></i></a></label>
                            <input type="text" id="buttontext-input" class="form-control" name="Button Text 1" value="<?=$fields && isset($fields['Button Text 1']) ? $fields['Button Text 1'] : '' ?>" placeholder="Your Text Here">
                        </div>
                        <!--end image group-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                    </div><!--end col-->
                </div> <!--end row-->
                <div class="row">
                    <div class="col-10"><!--cards-->
                        <div class="card">
                        <div class="card-body">
                            <h3 class="header-title mt-2">Slider Image 2 Upload</h3>
                            <!--this is number 2 of potentially 6 images-->
                            <!--begin image dropzone-->
                            <div class="text-center border p-4 mb-3 dropzone" id="SliderDropzone"><!--this is number2 of potentially 6 images-->
                            <!-- I think you need to adjust the Javascript so it uploads.-->
                            <!-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                            data-upload-preview-template="#uploadPreviewTemplate"> -->
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>

                            <div class="dz-message needsclick">
                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                <h3>Drop files here or click to upload.</h3>
                                <span class="text-muted font-13">Drop your images here.</span>
                            </div>
                        <!-- </form> -->
                        <!-- Preview -->
                            <input type="hidden" name="Slider Image 2" id="slider_image">
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                            
                            </div><!--end dropzone-->
                            <div class="form-group mb-3">
                            <label for="image2URL-input">Image URL Link</label>
                            <!--PHP HERE--> <input type="text" id="image2URL-input" class="form-control" name="URL Link 2" value="<?=$fields && isset($fields['URL Link 2']) ? $fields['URL Link 2'] : '' ?>" placeholder="https://yourimageurlhere.com">
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" name="Open New Window 2" value="checked" <?=$fields && isset($fields['Open New Window 2']) && $fields['Open New Window 2'] == 'checked'  ? 'checked' : '' ?>  id="Tab2Check">
                                <label class="custom-control-label" for="Tab2Check">Open in New Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to open this link in a new browser tab or to overwrite the current browser tab."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                            </div>
                            <h2 class="header-title mt-4">Slide Overlay Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Style some text here to overlay over your slider image."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                            <div class="m-4"><!--text editor - use this or add Froala code-->
                                <!--This is another editor - you can use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
                                <textarea id="froala-editor" name="Overlay Text 2">
                                <?=$fields && isset($fields['Overlay Text 2']) ? $fields['Overlay Text 2'] : '<p>Use the editor to style your overlay text.</p>' ?>
                                </textarea><!--This isn't working now - use Froala Text Editor here-->
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" name="Overlay Button 2" value="checked" <?=$fields && isset($fields['Overlay Button 2']) && $fields['Overlay Button 2'] == 'checked'  ? 'checked' : '' ?> id="Include2Check">
                                <label class="custom-control-label" for="Include2Check">Include Button?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to include a button in your Slide Overlay Text."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="buttontext2-input">Button Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="What should your button say?"></i></a></label>
                                <input type="text" id="buttontext2-input" class="form-control" name="Button Text 2" value="<?=$fields && isset($fields['Button Text 2']) ? $fields['Button Text 2'] : '' ?>" placeholder="Your Text Here">
                            </div>
                            <!--end image group-->
                            
                            </div><!--end card-body-->
                        </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end slider 2-->
                    <div class="row"><!--begin slider 3-->
                        <div class="col-10"><!--cards-->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title mt-2">Slider Image 3 Upload</h3>
                                <!--this is number 3 of potentially 6 images-->
                            <!--begin image dropzone-->
                            <div class="text-center border p-4 mb-3 dropzone" id="SliderDropzone"><!--this is number2 of potentially 6 images-->
                                <!-- I think you need to adjust the Javascript so it uploads.-->
                                <!-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate"> -->
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>

                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">Drop your images here.</span>
                                </div>
                            <!-- </form> -->
                            <!-- Preview -->
                            <input type="hidden" name="Slider Image 3" id="slider_image">
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                            
                            </div><!--end dropzone-->
                            <div class="form-group mb-3">
                                <label for="image3URL-input">Image URL Link</label>
                                <!--PHP HERE--> <input type="text" id="image3URL-input" class="form-control" name="URL Link 3" value="<?=$fields && isset($fields['URL Link 3']) ? $fields['URL Link 3'] : '' ?>" placeholder="https://yourimageurlhere.com">
                            </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="Open New Window 3" value="checked" <?=$fields && isset($fields['Open New Window 3']) && $fields['Open New Window 3'] == 'checked'  ? 'checked' : '' ?>  id="Tab3Check">
                                    <label class="custom-control-label" for="Tab3Check">Open in New Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to open this link in a new browser tab or to overwrite the current browser tab."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                </div>
                                <h2 class="header-title mt-4">Slide Overlay Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Style some text here to overlay over your slider image."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                                <div class="m-4"><!--text editor - use this or add Froala code-->
                                <!--This is another editor - you can use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
                                <textarea id="froala-editor" name="Overlay Text 3">
                                        <?= $fields && isset($fields['Overlay Text 3']) ? $fields['Overlay Text 3'] : '<p>Use the editor to style your overlay text.</p>' ?>
                                </textarea><!--This isn't working now - use Froala Text Editor here-->
                            </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="Overlay Button 3" value="checked" <?=$fields && isset($fields['Overlay Button 3']) && $fields['Overlay Button 3'] == 'checked'  ? 'checked' : '' ?> id="Include3Check">
                                    <label class="custom-control-label" for="Include3Check">Include Button?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to include a button in your Slide Overlay Text."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="buttontext3-input">Button Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="What should your button say?"></i></a></label>
                                    <input type="text" id="buttontext3-input" class="form-control" name="Button Text 3" value="<?=$fields && isset($fields['Button Text 3']) ? $fields['Button Text 3'] : '' ?>" placeholder="Your Text Here">
                                </div>
                                <!--end image group-->
                                
                            </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div>
                    <div class="row"><!--begin slider 4-->
                        <div class="col-10"><!--cards-->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title mt-2">Slider Image 4 Upload</h3>
                                <!--this is number 3 of potentially 6 images-->
                            <!--begin image dropzone-->
                            <div class="text-center border p-4 mb-3 dropzone" id="SliderDropzone"><!--this is number2 of potentially 6 images-->
                                <!-- I think you need to adjust the Javascript so it uploads.-->
                                <!-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate"> -->
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>

                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">Drop your images here.</span>
                                </div>
                            <!-- </form> -->
                            <!-- Preview -->
                            <input type="hidden" name="Slider Image 4" id="slider_image">
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                            
                            </div><!--end dropzone-->
                            <div class="form-group mb-3">
                                <label for="image4URL-input">Image URL Link</label>
                                <!--PHP HERE--> <input type="text" id="image4URL-input" class="form-control" name="URL Link 4" value="<?=$fields && isset($fields['URL Link 4']) ? $fields['URL Link 4'] : '' ?>" placeholder="https://yourimageurlhere.com">
                            </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="Open New Window 4" value="checked" <?=$fields && isset($fields['Open New Window 4']) && $fields['Open New Window 4'] == 'checked'  ? 'checked' : '' ?> id="Tab4Check">
                                    <label class="custom-control-label" for="Tab4Check">Open in New Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to open this link in a new browser tab or to overwrite the current browser tab."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                </div>
                                <h2 class="header-title mt-4">Slide Overlay Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Style some text here to overlay over your slider image."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                                <div class="m-4"><!--text editor - use this or add Froala code-->
                                <!--This is another editor - you can use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
                                <textarea id="froala-editor" name="Overlay Text 4">
                                        <?=$fields && isset($fields['Overlay Text 4']) ? $fields['Overlay Text 4'] : '<p>Use the editor to style your overlay text.</p>' ?>
                                </textarea><!--This isn't working now - use Froala Text Editor here-->
                            </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="Overlay Button 4" value="checked" <?=$fields && isset($fields['Overlay Button 4']) && $fields['Overlay Button 4'] == 'checked'  ? 'checked' : '' ?> id="Include4Check">
                                    <label class="custom-control-label" for="Include4Check">Include Button?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to include a button in your Slide Overlay Text."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="buttontext4-input">Button Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="What should your button say?"></i></a></label>
                                    <input type="text" id="buttontext4-input" class="form-control" name="Button Text 4" value="<?=$fields && isset($fields['Button Text 4']) ? $fields['Button Text 4'] : '' ?>" placeholder="Your Text Here">
                                </div>
                                <!--end image group-->
                                
                            </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div>
                    <div class="row"><!--begin slider 3-->
                        <div class="col-10"><!--cards-->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title mt-2">Slider Image 5 Upload</h3>
                                <!--this is number 3 of potentially 6 images-->
                            <!--begin image dropzone-->
                            <div class="text-center border p-4 mb-3 dropzone" id="SliderDropzone"><!--this is number2 of potentially 6 images-->
                                <!-- I think you need to adjust the Javascript so it uploads.-->
                                <!-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate"> -->
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>

                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">Drop your images here.</span>
                                </div>
                            <!-- </form> -->
                            <!-- Preview -->
                            <input type="hidden" name="Slider Image 5" id="slider_image">
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                            
                            </div><!--end dropzone-->
                            <div class="form-group mb-3">
                                <label for="image5URL-input">Image URL Link</label>
                                <!--PHP HERE--> <input type="text" id="image5URL-input" class="form-control" name="URL Link 5" value="<?=$fields && isset($fields['URL Link 5']) ? $fields['URL Link 5'] : '' ?>" placeholder="https://yourimageurlhere.com">
                            </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="Open New Window 5" value="checked" <?=$fields && isset($fields['Open New Window 5']) && $fields['Open New Window 5'] == 'checked'  ? 'checked' : '' ?>  id="Tab5Check">
                                    <label class="custom-control-label" for="Tab5Check">Open in New Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to open this link in a new browser tab or to overwrite the current browser tab."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                </div>
                                <h2 class="header-title mt-4">Slide Overlay Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Style some text here to overlay over your slider image."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                                <div class="m-4"><!--text editor - use this or add Froala code-->
                                <!--This is another editor - you can use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
                                <textarea id="froala-editor" name="Overlay Text 5">
                                        <?= $fields && isset($fields['Overlay Text 5']) ? $fields['Overlay Text 5'] : '<p>Use the editor to style your overlay text.</p>' ?>
                                </textarea><!--This isn't working now - use Froala Text Editor here-->
                            </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="Overlay Button 5" value="checked" <?=$fields && isset($fields['Overlay Button 5']) && $fields['Overlay Button 5'] == 'checked'  ? 'checked' : '' ?> id="Include5Check">
                                    <label class="custom-control-label" for="Include5Check">Include Button?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to include a button in your Slide Overlay Text."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="buttontext5-input">Button Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="What should your button say?"></i></a></label>
                                    <input type="text" id="buttontext5-input" class="form-control" name="Button Text 5" value="<?=$fields && isset($fields['Button Text 5']) ? $fields['Button Text 5'] : '' ?>" placeholder="Your Text Here">
                                </div>
                                <!--end image group-->
                                
                            </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div>
                    <div class="row"><!--begin slider 3-->
                        <div class="col-10"><!--cards-->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title mt-2">Slider Image 6 Upload</h3>
                                <!--this is number 3 of potentially 6 images-->
                            <!--begin image dropzone-->
                            <div class="text-center border p-4 mb-3 dropzone" id="SliderDropzone"><!--this is number2 of potentially 6 images-->
                                <!-- I think you need to adjust the Javascript so it uploads.-->
                                <!-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate"> -->
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>

                                <div class="dz-message needsclick"> 
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">Drop your images here.</span>
                                </div>
                            <!-- </form> -->
                            <!-- Preview -->
                            <input type="hidden" name="Slider Image 6" id="slider_image">
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                            
                            </div><!--end dropzone-->
                            <div class="form-group mb-3">
                                <label for="image6URL-input">Image URL Link</label>
                                <!--PHP HERE--> <input type="text" id="image6URL-input" class="form-control" name="URL Link 6" value="<?=$fields && isset($fields['URL Link 6']) ? $fields['URL Link 6'] : '' ?>" placeholder="https://yourimageurlhere.com">
                            </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="Open New Window 6" value="checked" <?= $fields && isset($fields['Open New Window 6']) && $fields['Open New Window 6'] == 'checked'  ? 'checked' : '' ?> id="Tab6Check">
                                    <label class="custom-control-label" for="Tab6Check">Open in New Tab?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to open this link in a new browser tab or to overwrite the current browser tab."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                </div>
                                <h2 class="header-title mt-4">Slide Overlay Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Style some text here to overlay over your slider image."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h2>
                                <div class="m-4"><!--text editor - use this or add Froala code-->
                                <!--This is another editor - you can use Froala here instead. I added the JS for this before the /body tag. Also CSS is in the head of this page.-->
                                <textarea id="froala-editor" name="Overlay Text 6">
                                        <?=$fields && isset($fields['Overlay Text 6']) ? $fields['Overlay Text 6'] : '<p>Use the editor to style your overlay text.</p>' ?>
                                </textarea><!--This isn't working now - use Froala Text Editor here-->
                            </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="Overlay Button 6" value="checked" <?=$fields && isset($fields['Overlay Button 6']) && $fields['Overlay Button 6'] == 'checked'  ? 'checked' : '' ?> id="Include6Check">
                                    <label class="custom-control-label" for="Include6Check">Include Button?&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose whether or not to include a button in your Slide Overlay Text."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="buttontext6-input">Button Text&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="What should your button say?"></i></a></label>
                                    <input type="text" id="buttontext6-input" class="form-control" name="Button Text 6" value="<?=$fields && isset($fields['Button Text 6']) ? $fields['Button Text 6'] : '' ?>" placeholder="Your Text Here">
                                </div>
                                <!--end image group-->
                                
                            </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div>
                    <div class="row">
                        <div class="col-10">
                    <!--here are the buttons-->
                        <div class="button-list text-right mt-2 mb-2">
                            <button type="cancel" onclick="window.location='/admin/widgets';"  class="btn btn-lg btn-secondary" type="cancel">Cancel</button>
                            <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#slider-modal">Preview</button><!--This should pop up the modal with dynamic content in it based on what the user put in the form.-->
                            <button type="submit" class="btn btn-lg btn-primary" type="submit">Create Widget</button>
                        </div><!--this form is supposed to validate. -->
                    <!--end button div-->
                </form><!--end the form-->
                </div>
            </div>
</div>
<!--end page content--> 