
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
                            <li class="breadcrumb-item active">Edit Media Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title" id="top">Edit Media Category</h4>
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
                Edit Media Category
                </h3>
                <p>
                Use this page to Edit a Media Category for your Media Items. To Manage your Media categories use the <a href="media-manage-categories.html" title="Manage Media">Manage Media Categories</a> page. You will need to click the Save button to save your changes. 
                </p>
                <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
            </div><!--end card body div-->
        </div><!--end card-->
    </div><!--end col-->
    </div><!--end row-->
    <div class="row">
    <div class="col-10 mb-3 text-right">
        <div class="button-list">
        <a href="content-media.html" class="btn btn-outline-warning title="Manage Media">Manage Media</a>
        <a href="media-new.html" class="btn btn-outline-secondary" title="Add New Media">Add New Media</a>
        <a href="media-manage-categories.html" class="btn btn-outline-info" title="Add New Category">Manage Media Category</a>
        </div>
    </div>
</div><!--end row-->
</div>
    <div class="row">
        <div class="col-10">
            <div class="card">
            <div class="card-body">
                <h2 class="header-title mb-3">Edit Media Category Details</h2>
                <form id="formEditMediaCategory" method="POST"><!--Dynamic Form-->
                <div class="form-group mb-3">
                    <label for="mediacat-input">Title:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Change the title that describes the your media category. The better the title, the better your SEO ranking."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <input type="text" name="media_category_title" class="form-control" placeholder="Media Category Title Here" value="<?php echo isset($data->media_category_title) ? $data->media_category_title : ''?>">
                    <input type="hidden" name="media_category_id" class="form-control" value="<?php echo isset($data->media_category_id) ? $data->media_category_id : ''?>">
                </div>
                <div class="form-group mb-3"><!--Please add a Froala Editor here-->
                        <label for="mediacat-textarea">Media Category Description:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Change the description for your Media Category if you wish."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <textarea class="form-control" name="media_category_description" rows="3" placeholder="Enter the media item description."><?php echo isset($data->media_category_description) ? $data->media_category_description : ''?></textarea>
                    </div>
            </div> <!--end card body-->
            </div> <!--end card-->
        </div><!--end col-->
        <div class="col-sm-5">
            <div class="card">
            <div class="card-body">
                <span class="form-group mb-2">
                    <label for="reviewauthor-select">Parent Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you want this new category to be a sub category, choose the parent category you wish from the list below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <select class="form-control" name="media_category_parent_id">
                    <option value="0">None</option>
                    <?php foreach ($media_categories as $key => $row): ?>
                        <option value="<?php echo $row->media_category_id; ?>" <?php echo (isset($data->media_category_parent_id) && $data->media_category_parent_id == $row->media_category_id ) ? 'selected=""' : '' ?>><?php echo $row->media_category_title ?></option>
                    <?php endforeach ?>
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
                            <input type="text" name="media_category_url" class="form-control" placeholder="https://" value="<?php echo isset($data->media_category_url) ? $data->media_category_url : ''?>">
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
                    <button type="button" class="btn btn-lg btn-secondary" onclick='window.location.replace("<?php echo $_SERVER['HTTP_REFERER']; ?>")'>Cancel</button>
                    <button type="button" class="btn btn-lg btn-primary" id="update-media-category-btn">Save</button>
                    </div>
                </div>
            </div>
</div><!--end row-->
</form>
    