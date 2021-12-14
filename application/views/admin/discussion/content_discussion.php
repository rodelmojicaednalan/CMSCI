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
                            <li class="breadcrumb-item active">Discussions</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Discussions</h4>
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
                            Manage Discussions Instructions<span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                        </a>
                    </h5>
                </div>
        <div class="card-body">
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <p>
            Use this section to create and manage your Discussions. 
                </p>
                <p>View the Latest Discussions where you can flag discussions, delete discussions and select permissions. You can sort your discussions by whether or not they are flagged or deleted and also view the most active discussions on your site. To set permissions for a discussion topic, check the checkbox next to the discussion and choose the permissions from the drop down menu, then hit apply. To Manage or Add a New Discussion Board Category, hit the <a href="/admin/discussion_manage_categories">Manage Categories Button</a>. To Flag a discussion topic, hit the flag symbol <i class=" mdi mdi-flag mdi-24px"></i> in the discussion topic table row.</p>
                <p>To add a new Discussion Board topic, go to your website and make sure that you are logged in, you'll then be able to add a topic. To manage your discussion board administration and to give Members Board moderation permissions, visit the <a href="members-manage.html">Members section</a> of this website. </p>
                <p class="text-muted">This page works best on a desktop or laptop computer.</p>
                </div>
        </div><!--end card body-->
        </div><!--end card-->
    </div><!--end col-->
    </div><!--end row-->
    <!-- Delete Alert Modal -->
        <div id="delete-discussion-topic" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content modal-filled bg-danger">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <i class="dripicons-wrong h1"></i>
                                <h4 class="mt-2">Are you Certain?</h4>
                                <p class="mt-3">This will delete this/these Discussion(s) from your site. Are you sure you want to do this?</p>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="button" id="cfrm-delete-discussion-topic" class="btn btn-dark my-2" data-dismiss="modal">Yes, I'm Sure</button>
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
        <label for="postaction-select">Discussions Permissions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the Checkbox in the Discussion table below, then Choose the Discussion Permissions for the Discussion in the dropdown list below, and click the Apply Button. The Permissions determine which User group can see and participate in the Discussion. You can select more than one Discussion for group actions."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
            <select class="form-control"  id="discussion-topic-group">
                <option value="" class="selected">Choose One</option>
                <option value="0">Public (Everyone)</option>
                <?php foreach($group_members as $group): ?>
                    <option value="<?= $group->groups_id?>"><?= $group->groups_name?></option>
                <?php endforeach; ?>
            </select>     
        </div>
    <div class="col-2 mt-4 py-1">
        <button id="cfrm-discussion-topic" type="button" class="btn btn-outline-primary">Apply</button>
    </div>
    </form>
    <!--end col-->
    <div class="col-5 mt-4 text-right">
        <div class="button-list">
        <!--This should flag the discussion and they should be sortable by flagged via Javascript-->
        <!--There is a table class for these tables called datatable-buttons which allows for sortable buttons in this table. What you need to do is add the needed Javascript in the dataTables.buttons.min.js file Look for the tables-datatable.html file for examples-->
        <a href="/admin/discussion_manage_categories" title="Manage Categories" class="btn btn-outline-info"><i class="mdi mdi-plus-circle-outline"></i>&nbsp;Manage Categories</a>
        </div>
    </div>
    </div><!--end row-->
    <!--begin Blog Posts Table-->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                    <h4 class="header-title mb-4">Discussions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the Discussion topics. You can search Discussion topics by using the search box, and you choose how many Discussions to see on this page. Click the flag symbol to flag a Discussion topic, and click the trashcan symbol to delete a discussion topic."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                </div>
                    <div class="col-md-2 text-right mb-3">
                </div><!--end row-->
                    <table id="discussion-topic" class="table dt-responsive" width="100%">
                        <thead>
                            <tr>
                                <th>Discussion Topic</th>
                                <th>Category</th>
                                <th># Replies</th>
                                <th>Author</th>
                                <th>Date Posted</th>
                                <th>Date Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--this table has Dynamically populated information based on current discussions-->
                        <tbody>
                        <?php foreach($discussion_obj as $discussion): ?>
                            <tr>
                                <td><span class="custom-control custom-checkbox">
                                    <input type="checkbox" name="chk-discussion-topic" class="custom-control-input" data-id="<?= $discussion->discussion_categories_topic_id ?>" id="Discussion1Check<?= $discussion->discussion_categories_topic_id ?>">
                                    <label class="custom-control-label" for="Discussion1Check<?= $discussion->discussion_categories_topic_id ?>"><?= $discussion->discussion_categories_topic_title ?></label>
                                    </span><br>
                                    <?= $cut_string = word_limiter(trim($discussion->discussion_categories_topic_description), 25, ''); ?> 
                                    &nbsp; 
                                    <?php if(strlen(trim($discussion->discussion_categories_topic_description)) > 195) : ?>
                                        <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapse<?= $discussion->discussion_categories_topic_id ?>" aria-expanded="false" aria-controls="collapse2">
                                        More...
                                        </button>
                                    </p>
                                    <div class="collapse" id="collapse<?= $discussion->discussion_categories_topic_id ?>">
                                        <div class="card card-body">
                                            <?= trim(str_replace($cut_string, "", $discussion->discussion_categories_topic_description)); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                <td><?= (!empty($discussion->discussion_category)) ? $discussion->discussion_category[0]->discussion_categories_title : ""?></td>
                                <td><?= $discussion->comment_count != "" ? $discussion->comment_count  : "0"?></td>
                                <td class="table-user"><img src="<?= $discussion->user_picture != "" ? $discussion->user_picture : "/assets/images/users/no_picture.jpg" ?>" alt="table-user" class=" rounded-circle" /><br><a href="/member-profile/<?= $discussion->user_id ?>"><!--links to this member's profile page-->
                                <?= $discussion->user_name ?></a><br>
                                <!--dynamically insert the Users email address and the Subject should be the Name of the site-->
                                <a href="Subject=Your Discussion on NameofSite" class="action-icon" title="Send Email"><i class="mdi mdi-email mdi-24px"></i>  </td>
                                <td><?= date( "m/d/Y", strtotime($discussion->discussion_categories_topic_created_on) )?></td>
                                <td><?= ($discussion->discussion_categories_topic_modified_on != "") ? date( "m/d/Y", strtotime($discussion->discussion_categories_topic_modified_on)) : ""?></td>
                                <!--The Flag symbol should flag this discussion-->
                                <td class="table-action"><a href="#" id="flagged-discussion-topic" data-id="<?= $discussion->discussion_categories_topic_id ?>" class="action-icon" title="Flag"><i class="mdi mdi-flag mdi-24px text-success"></i></a>
                                <a href="" value="delete" id="discussion-topic-modal" data-id="<?=  $discussion->discussion_categories_topic_id ?>" class="action-icon"> <i class="mdi mdi-delete mdi-24px text-danger" title="Delete"></i></a></td>
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
