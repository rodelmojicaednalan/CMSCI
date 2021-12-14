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
                            <li class="breadcrumb-item" title="Discussions"><a href="/admin/content_discussion" title="Discussions">Discussions</a> </li>
                            <li class="breadcrumb-item active">Manage Categories</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Discussion Categories</h4>
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
        <div id="accordion" class="custom-accordion mb-4"></div>
        <div class="card mb-0">
            <div class="card-header" id="headingOne">
                    <h5 class="m-0">
                        <a class="text-dark d-block pt-2 pb-2" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Manage Discussion Categories Instructions<span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                        </a>
                    </h5>
                </div>
            <div class="card-body">
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <p>
            Use this section to create and manage your Discussion Board Categories. 
                </p>
                <p>The Discussion Board Categories can be managed on this page. You can edit your categories by clicking  the Pencil <i class="dripicons dripicons-pencil mr-1 text-primary"></i> icon, you can flag a category by clicking the flag icon <i class="mdi mdi-flag mdi-24px text-success"></i>, and you can delete a category by clicking the trashcan icon <i class="mdi mdi-delete mdi-24px text-danger" title="Delete"></i>. If you'd like to manage your discussion board topics, click the <a href="/admin/content_discussion" title="Manage Discussions">Manage Discussions</a> button below.</p>
                <p>To add a new Category, click on the <a href="/admin/discussion_newcat/0" title="Add New Category">Add New Category</a> button below.</p>
                <p class="text-muted">This page works best on a desktop or laptop computer.</p>
                </div>
        </div><!--end card body-->
        </div><!--end card-->
    </div><!--end col-->
    </div><!--end row-->
    <!-- Delete Alert Modal -->
        <div id="delete-alert-discussion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content modal-filled bg-danger">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <i class="dripicons-wrong h1"></i>
                                <h4 class="mt-2">Are you Certain?</h4>
                                <p class="mt-3">This will delete this/these Discussion Category from your site. Are you sure you want to do this?</p>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-dark my-2" id="cfrm-delete-discussion" data-dismiss="modal">Yes, I'm Sure</button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--END THE MODALS BEGIN PAGE CONTENT-->
        <!--END ROW-->
    <!--begin buttons-->
    <div class="row justify-content">
    <div class="col-3 mt-2">
        <form action="#"><!--Make this form work!-->
        <label for="postaction-select">Category Permissions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the Checkbox in the Discussion Board Category table below, then Choose the Category Permissions from the dropdown list below, and click the Apply Button. The Permissions determine which User group can see and participate in the Discussion Category."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
            <select class="form-control" id="discussion-group" name="discussion-group" required>
                <option value="" class="selected">Choose One</option>
                <option value="0">Public (Everyone)</option>
                <?php foreach($group_members as $group): ?>
                    <option value="<?= $group->groups_id?>"><?= $group->groups_name?></option>
                <?php endforeach; ?>
            </select>     
        </div>
    <div class="col-2 mt-4 py-1">
        <button  id="cfrm-discussion" type="button" class="btn btn-outline-primary">Apply</button>
    </div>
    </form>
    <!--end col-->
    <div class="col-7 mt-4 d-flex justify-content-end">
        <div class="button-list">
        <!--This should flag the discussion and they should be sortable by flagged via Javascript-->
        <!--There is a table class for these tables called datatable-buttons which allows for sortable buttons in this table. What you need to do is add the needed Javascript in the dataTables.buttons.min.js file Look for the tables-datatable.html file for examples-->
            <a href="/admin/discussion_newcat/0" class="btn btn-outline-info" title="Add a New Category"><i class="mdi mdi-plus-circle-outline"></i>Add a New Category</a>
                <!-- <button class="btn btn-outline-success" type="submit" name="flagged"><i class="mdi mdi-flag text-success"></i>&nbsp;Flagged </button> -->
                <!-- <button class="btn btn-outline-danger" type="submit" name="deleted"><i class="mdi mdi-delete text-danger" title="Delete"></i>&nbsp;Deleted</button> -->
            <a href="/admin/content_discussion" class="btn btn-outline-primary" title="Manage Discussions"><i class="mdi mdi-plus-circle-outline"></i>&nbsp;Manage Discussions</a>
        </div>
    </div>
    </div><!--end row-->
    <!--begin Discussion Board Category Table-->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Discussions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the Discussion topics. You can search Discussion topics by using the search box, and you choose how many Discussions to see on this page. Click the flag symbol to flag a Discussion topic, and click the trashcan symbol to delete a discussion topic."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                    <table id="discussion-categories" class="table dt-responsive" width="100%">
                        <thead>
                            <tr>
                                <th>Board Category Name</th>
                                <th>Permissions</th>
                                <th># Topics</th>
                                <th># Replies</th>
                                <th>Date Created</th>
                                <th>Date Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--this table has Dynamically populated information based on current discussions-->
                        <tbody>
                            <?php foreach($discussion_category_obj as $category): ?>
                            <tr>
                                <td><span class="custom-control custom-checkbox">
                                    <input type="checkbox" name="chk-discussion" data-id="<?= $category->discussion_categories_id ?>" class="custom-control-input" id="DiscussionCat1Check<?= $category->discussion_categories_id ?>">
                                    <label class="custom-control-label" for="DiscussionCat1Check<?= $category->discussion_categories_id ?>"><?= $category->discussion_categories_title ?></label>
                                    </span>
                                </td>
                                <td><?= !empty($category->permission) ? $category->permission[0]->groups_name : "Public"; ?></td>
                                <td><?= $category->topic_count !="" ? $category->topic_count : "0"  ?></td>
                                <td class="table-user"></td>
                                <td><?= date( "m/d/Y", strtotime($category->discussion_categories_created_on) )?> </td>
                                <td><?= (trim($category->discussion_categories_modified_on) != "") ? date( "m/d/Y", strtotime($category->discussion_categories_modified_on)) : "" ?></td>
                                <!--The Flag symbol should flag this discussion-->
                                <td class="table-action"><a href="/admin/discussion_newcat/<?= $category->discussion_categories_id ?>" class="action-icon" title="Edit"><i class="dripicons dripicons-pencil mr-1 text-primary"></i></a><a href="javascript: void(0);" id="flagged-discussion" data-id="<?= $category->discussion_categories_id ?>" class="action-icon" title="Flag"><i class="mdi mdi-flag mdi-24px text-success"></i></a>
                                <a href="#" id="discussion-modal" data-id="<?= $category->discussion_categories_id ?>" class="action-icon"> <i class="mdi mdi-delete mdi-24px text-danger" title="Delete"></i></a></td>
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