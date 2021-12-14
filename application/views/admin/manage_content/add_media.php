
        <div class="content">
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
                                    <li class="breadcrumb-item"><a href="content-media.html">Media</a></li>
                                    <li class="breadcrumb-item active">Add New Media</li>
                                </ol>
                            </div>
                            <h4 class="page-title" id="top">Add New Media Item</h4>
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
                        Add New  Media
                        </h3>
                        <p>
                        Use this page to add a Media object. To Manage your Media objects use the <a href="content-media.html" title="Manage Media">Media</a> page. We've included many features in this form that will optimize the SEO for your Media. You will need to click the Save button to save your changes. 
                        </p>
                        <p>Make sure that your images are compressed for the web. To compress images online use this tool: <a href="https://squoosh.app/" title="squoosh app"> https://squoosh.app/.</a></p>
                        <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
                        <p class="text-muted">This feature works best on laptop or desktop computers.</p>
                    </div><!--end card body div-->
                </div><!--end card-->
            </div><!--end col-->
            </div><!--end row-->
            <div class="row">
                <div class="col-10 mb-3">
                        <div class="button-list">
                        <div class="text-right">
                            <button type="button" class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                            <button type="button" class="btn btn-lg btn-primary" id="save">Save</button>
                            </div>
                        </div>
                    </div>
        </div><!--end row-->
        </div>
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="header-title mb-3">Media Details</h2>
                            <form method="POST" id="formAddMedia1" enctype="multipart/form-data" action="./admin/media_create"><!--Dynamic Form-->
                            <div class="form-group mb-3">
                                <label for="mediatitle-input">Title:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use a title that describes the content of your media and the media type. The better the title, the better your SEO ranking."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                <input type="text" name="media_title" id="mediatitle-input" class="form-control" placeholder="Media Title Here">
                            </div>
                            <div class="form-group mb-3">
                                <p>Your Media Item can be associated with a product in your BOOMITY e-commerce shop. If you are going to associate a product with an image or video, use the product label below and insert the URL where the product can be found online.</p>
                                <label for="productlabel-input">Product Name/Label:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If this image or item is associated with a product in your shop, put the name in here.."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                <input type="text" name="product_label" id="productlabel-input" class="form-control" placeholder="Product Name Here">
                            </div>
                            <h2 class="header-title mb-3">
                            <label for="producturl-input">Product URL:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter your Product's URL here."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label> 
                            <input type="text" name="product_url" id="producturl-input" class="form-control" placeholder="https://">
                            </h2>
                            <!--dynamically generated media item description should be here-->
                            <div class="form-group mb-3"><!--Please add a Froala Editor here-->
                                    <label for="description-textarea">Media Item Description:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the description for your Media item if you wish."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                    <textarea class="form-control" name="media_description" id="description-textarea" rows="3" placeholder="Enter the media item description."></textarea>
                                </div>
                                <h3 class="header-title">Choose the Media Type</h3>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="mediatype_id" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="mediatype_id" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">Video</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="mediatype_id" id="inlineRadio3" value="3">
                                    <label class="form-check-label" for="inlineRadio3">Audio</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="mediatype_id" id="inlineRadio4" value="4">
                                    <label class="form-check-label" for="inlineRadio4">Podcast</label>
                                </div>
                        </div> <!--end card body-->
                    </div> <!--end card-->
                </div><!--end col-->
                <div class="col-sm-5">
                    <div class="card">
                    <div class="card-body">
                        <span class="form-group mb-3">
                            <label for="reviewauthor-select">Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the category you wish for this media item."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                            <select class="form-control mb-2" id="reviewauthor-select" name="media_category_id">
                                <?php for($i = 0; sizeOf($data) > $i; $i++) echo ('<option value="'.$data[$i]->media_category_id.'"'.">".$data[$i]->media_category_title.'</option>');?>
                            </select>  
                        </span>
                    </div>
                    </div>  
                </div>
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="embedcode-input">YouTube/Vimeo Embed Code:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the YouTube or Vimeo Embed Code here. Or you can upload a web compressed video file below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                <input type="text" name="media_embed_value" id="embedcode-input" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <span class="form-group">
                                    <label for="media1Dropzone">Upload Media&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Upload a new media item here. Video and images should be compressed for the Web."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                    <!--this is number 1 of potentially 3 images-->
                                    <!-- begin image dropzone-->
                                    <div class="text-center border p-3 mb-3"><!--this is number 1 of potentially 3 images-->
                                        <div method="post" class="dropzone" id="media1Dropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                            data-upload-preview-template="#uploadPreviewTemplate">
                                            <div class="fallback">
                                                <!-- <input type="file" name="media" multiple /> -->
                                                <input type="file" name="file" />
                                            </div>
                                            <div class="dz-message needsclick">
                                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                <h3>Drop files here or click to upload.</h3>
                                            </div>
                                        </div> 
                                    </div><!--end dropzone -->
                                </span>
                                <span class="form-group mb-3">
                                    <label for="media1caption-input">Media Caption&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you'd like to add a caption to your media object, add it here. This is optional."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                    <input type="text" name="media_caption" id="media1caption-input" class="form-control" placeholder="Existing Image Caption"><!--the existing image caption should appear here.-->
                                </span>
                        </div>
                    </div>  
                </div>
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body">
                            <span class="form-group">
                                    <label for="description-textarea">Media Item SEO Meta Description:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Change the Meta description for your Media item if you wish. This will improve your site's SEO."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                    <textarea class="form-control pb-2" name="media_meta_description" id="description-textarea" rows="5" placeholder="Enter your Media Item's Meta description here."></textarea>
                            </span>
                        </div>
                    </div>
                </div>
            
                    <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body">
                            <span class="form-group">
                                    <label for="reviewpermissions-select">Media Permissions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose which member group can view this media item. The default is everyone. If you wish only registered Members to see this article and require a login, choose from the list below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                    <select class="form-control mb-3" name="media_permissions" id="reviewpermissions-select">
                                        <!--dynamic list of admins with blog author privledges-->
                                        <option class="selected" value="0">Everyone</option><!--this should be the default if they do not make a choice-->
                                        <option value="1">Member Group 1 (temp)</option><!--dynamic list from the site's member groups-->
                                        <option value="2">Member Group 2 (temp)</option>
                                        <option value="3">Member Group 3 (temp)</option>
                                    </select>  
                                </span>
                        <span class="form-group mb-1">
                            <label for="reviewtype-select">Media Itemtype&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the itemtype of media from the list below. This is the classification for this media item. This choice is crucial for your media and site SEO."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                            <select class="form-control" id="reviewatype-select" name="media_itemtype">
                                <option class="selected">Choose One</option><!--This list is not dynamic-See Requirements for instructions-->
                                <option value="game">Board or Card Game</option>
                                <option value="videogame">Video Game</option>
                                <option value="organization">Organization</option>
                                <option value="person">Person</option>
                                <option value="book">Book</option>
                                <option value="bookseries">Book Series</option>
                                <option value="comicstory">Comic Book</option>
                                <option value="comic-bookseries">Comic Book Series</option>
                                <option value="audiobook">Audio Book</option>
                                <option value="movie">Movie</option>
                                <option value="movieseries">Movie Series</option>
                                <option value="tvseries">TV Series</option>
                                <option value="tvseason">TV Season</option>
                                <option value="tvepisdoe">TV Episode</option>
                                <option value="audiorecording">Audio Recording </option>
                                <option value="podcast">Podcast</option>
                                <option value="podcastepisode">Podcast Episode</option>
                                <option value="radioepisode">Radio Episode</option>
                                <option value="musicrecording">Music Recording</option>
                                <option value="musicalbum">Music Album</option>
                                <option value="musicevent">Music Performance</option>
                                <option value="danceevent">Dance Performance</option>
                                <option value="theaterevent">Theater Performance</option>
                                <option value="video">Video</option>
                                <option value="image">Image</option>
                                <option value="painting">Painting</option>
                                <option value="photograph">Photograph</option>
                                <option value="sculpture">Sculpture</option>
                                <option value="newspaper">Newspaper</option>
                                <option value="place">Place</option>
                                <option value="exerciseplan">Exercise Plan</option>
                                <option value="softwareapplication">Software Application</option>
                                <option value="mobileapplication">Mobile App</option>
                                <option value="webapplication">Web Application</option>
                                <option value="event">Event</option>
                                <option value="childrensevent">Children's Event</option>
                                <option value="festival">Festival</option>
                                <option value="foodevent">Food Event</option>
                                <option value="sportsevent">Sports Event</option>
                                <option value="visualartsevent">Visual Arts Event</option>
                                <option value="product">Product</option>
                            </select>  
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
                            <button type="button" class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                            <button type="submit" class="btn btn-lg btn-primary" id="add-new-media-btn">Save</button>
                            </div>
                        </div>
                    </div>
            </div><!--end row-->
        </form>


