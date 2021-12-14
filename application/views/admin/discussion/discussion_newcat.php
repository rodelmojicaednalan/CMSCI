<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/content_discussion">Manage Content</a></li>
                            <li class="breadcrumb-item"><a href="/admin/content_discussion">Discussions</a></li>
                            <li class="breadcrumb-item active">Add New Discussion Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title" id="top">Add New Discussion Category</h4>
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
        <div id="accordion" class="custom-accordion mb-4"></div>
        <div class="card mb-0">
                <div class="card-header" id="headingOne">
                        <h5 class="m-0">
                            <a class="text-dark d-block pt-2 pb-2" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Add New Discussion Category Instructions<span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                            </a>
                        </h5>
                    </div>
            <div class="card-body">
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <p>
                Use this section to create your Discussion Board Categories. 
                </p>
                <p>The Discussion Board Categories can be created on this page. Categories are the way in which the discussion boards on your website are divided up. Create relevant categories for your Users and Members here. You can edit your categories by clicking  Manage Categories Button. If you'd like to manage your discussion board topics, click the <a href="/admin/content_discussion" title="Manage Discussions">Manage Discussions</a> button below.</p>
                <p class="text-muted">This page works best on a desktop or laptop computer.</p>
                </div>
            </div><!--end card body div-->
        </div><!--end card-->
    </div><!--end col-->
    </div><!--end row-->
    <div class="row">
    <div class="col-10 mb-3 mt-3 text-right">
        <div class="button-list">
            <a href="/admin/discussion_manage_categories" class="btn btn-outline-info" title="Add a New Category"><i class="mdi mdi-plus-circle-outline"></i>&nbsp;Manage Categories</a>
            <a href="/admin/content_discussion" class="btn btn-outline-primary" title="Manage Discussions"><i class="mdi mdi-plus-circle-outline"></i>&nbsp;Manage Discussions</a>
        </div>
    </div>
</div><!--end row-->
</div>
    <div class="row">
        <div class="col-10">
            <div class="card">
            <div class="card-body">
                <h2 class="header-title mb-3">Discussion Board Category Details</h2>
                <form action="#" id="frm-discussion-cat">
                <input type="hidden" name="discussion_categories_id" value="<?= (!empty($discussion_category)) ? $discussion_category[0]->discussion_categories_id   : "0"; ?>">
                <div class="form-group mb-3">   
                    <label for="diss-cat-input">Title:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Use a title that describes the your Discussion Board category. The better the title, the better your SEO ranking."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <input type="text" id="diss-cat-input" class="form-control" name="discussion_category_title" placeholder="Discussion Board Category Title Here" value="<?= (!empty($discussion_category)) ? $discussion_category[0]->discussion_categories_title : ""; ?>" required>
                        <span id="err-category-title" class="d-none"> <i class="text text-danger">*Category title is required</i> </span>                    
                </div>
                <div class="form-group mb-3"><!--Please add a Froala Editor here-->
                        <label for="docscat-textarea" >Discussion Board Category Description:&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Enter the description for your Discussion Board Category if you wish."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <textarea class="form-control" id="froala-editor" rows="3" name="discussion_category_description" placeholder="Enter the Discussion Board description."><?= (!empty($discussion_category)) ? $discussion_category[0]->discussion_categories_description : ""; ?></textarea>
                </div>
            </div> <!--end card body-->
            </div> <!--end card-->
        </div><!--end col-->
        <?php 
            $discussion_category_parent = "0";
            $discussion_category_permission = "0";
            $discussion_category_id = "0";

            if(!empty($discussion_category)) {
                $discussion_category_parent     = $discussion_category[0]->discussion_categories_parent_categories_id;
                $discussion_category_permission = $discussion_category[0]->discussion_categories_permission;
                $discussion_category_id = $discussion_category[0]->discussion_categories_id;
            }
        ?>
        <div class="col-sm-5">
            <div class="card">
            <div class="card-body">
                <span class="form-group mb-2">
                    <label for="parentcat-select">Parent Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="If you want this new category to be a sub category, choose the parent category you wish from the list below."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <select class="form-control" id="parentcat-select" name="discussion_category_parent">
                        <option>None</option><!--dynamic list of existing Discussion Board categories-->
                        <?php foreach($discussion_categories as $category): ?>
                            <?php if($discussion_category_id != $category->discussion_categories_id): ?>
                                <option value="<?= $category->discussion_categories_id ?>" <?= ($category->discussion_categories_id == $discussion_category_parent) ? 'selected="selected"' : '' ?>><?= $category->discussion_categories_title ?></option>
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
                <span class="form-group mb-2">
                    <label for="parentcat-select">Category Permissions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Set the permissions for this category. This will determine if the Public can see your Discussion Board Category, or just a select group of Members."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                    <select class="form-control" id="parentcat-select" name="discussion_category_permission">
                        <option class="selected" value="0">Everyone / Public</option><!--dynamic list of existing Member Groups-->
                        <?php foreach($group_members as $group): ?>
                            <option value="<?= $group->groups_id ?>"  <?= ($group->groups_id == $discussion_category_permission) ? 'selected="selected"' : '' ?>><?= $group->groups_name ?></option>
                        <?php endforeach; ?>
                    </select>  
                </span>
            </div>
            </div>  
        </div>
    </div><!--end row-->
    <div class="row">
        <div class="col-10 mb-3">
                <div class="button-list">
                <div class="text-right">
                    <button type="button" onclick="window.location='/admin/discussion_manage_categories'"  on class="btn btn-lg btn-secondary" id="cancel">Cancel</button>
                    <button type="button" id="save_discussion_category" class="btn btn-lg btn-primary" >Save</button>
                    </div>
                </div>
            </div>
</div><!--end row-->
</form>
</div><!--end container-->
<!--end page content-->