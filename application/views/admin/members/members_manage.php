<div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Manage Members</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Manage Members</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
        </div> <!-- container -->
    </div> <!-- content -->
    <!--begin page content here-->
    <div class="container">
        <div class="row">
        <div class="col-10">
            <p>
                Use this page to manage view site Members and decide the Group Members Actions. To change the Group Members Actions select the User with the checkbox, then choose the Group Members Actions from the dropdown menu then hit the Apply button. 
            </p>
            <p>
            Click the Question mark in the circle for further explanation on how to use a feature. 
            </p>
            <!-- Add Groups Modal -->
            <div id="addgroups-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Manage Group</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <!--<h4 class="title-text">Manage Group</h4>-->
                            <!--PHP form action Submit here-->
                            <?php echo form_open('#', array('class' => 'pl-3 pr-3', 'id' => 'manage_group')) ?>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="groupname">Group Name</label>
                                        <input class="form-control"  name="groups_name" type="text" id="groupname" placeholder="Group Name Here">
                                        <p class="text-danger d-none" id="errtext">* Insert Group Name</p>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="group-descrip">Group Description</label>
                                        <input class="form-control" name="groups_description" type="text" id="group-descrip" placeholder="Describe Your Group">
                                        <input type="hidden" name="groups_id" id="groupid" value="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <div class="form-group text-center">
                                    <button id="cancel_edit" class="d-none btn btn-lg btn-secondary mb-3" type="reset">Cancel</button>&nbsp;&nbsp;
                                    <button id="submit" class="btn btn-lg btn-primary mb-3 save-group" type="submit">&nbsp;Save Group&nbsp;</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                                <div class="table-responsive-sm">
                                    <table class="w-100 table table-centered mb-0 table-striped table-bordered " id="group_table">
                                        <thead class="thead-light">
                                        <!--replace the data in this table-->
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Users</th>
                                                <th>Content</th>
                                                <th>Make Active</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--End Modals begin Page Content-->

             <!-- Add Groups Modal -->
            <div id="assigngroup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header ">
                            <button type="button" class="close bg-primary" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <!--<h4 class="title-text">Manage Group</h4>-->
                            <!--PHP form action Submit here-->
                                <div class="container">
                                    <div class="row mb-2">
                                        <div class="col-sm-2">
                                            <img id="user-picture" src="" width="100%" height="100%"></img> 
                                        </div>
                                        <div class="col-sm-10">
                                            <h2 id="member_name"></h2>
                                            <h3 >Member Profile</h3>
                                            <div class="d-flex">
                                               <a href="#" id="member_flag" class="btn-default"><i class="fa fa-flag mr-2"></i></a> 
                                               <a href="#" id="member_message" class="btn-default"><i class="fa fa-envelope"></i></a> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive-sm">
                                        <table class="w-100 table" id="member_table" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="80">Username</td>
                                                    <td id="member_username"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td id="member_email"></td>
                                                </tr>
                                                <tr>
                                                    <td>Joined on</td>
                                                    <td id="member_jdate"></td>
                                                </tr>
                                                <tr>
                                                    <td>About user</td>
                                                    <td id="member_about"></td>
                                                </tr>
                                                <tr>
                                                    <td>Q&A</td>
                                                    <td><button id="view_question" data-id="" class="btn btn-primary">View All Questions</button></td>
                                                </tr>
                                                <tr>
                                                    <td>Groups</td>
                                                    <td>
                                                        <div id="td-group">
                                                            <select name="groups_id" id="group_assign" class="form-control">
                                                                    <option value="">Select a Group</option>
                                                                <!-- <!?php foreach($group_obj as $group): ?>
                                                                    <option value="<!?= $group->groups_id ?>"><!?= $group->groups_name ?></option>
                                                                <!?php endforeach; ?> -->
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button id="btn_assign" data-id="" class="btn btn-primary">ASSIGN</button>
                                                    </td>
                                                </tr>   
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--End Modals begin Page Content-->
        <div class="button-list mb-2">
            <!-- Custom width modal 
            <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#managegroups-modal">Manage Groups</button>
            --><!-- Full width modal -->
            <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#addgroups-modal">Manage Groups</button>
        
            
        </div>
        <!--end button list-->
        
        <div class="row p-3 mb-2 justify-content-between">
            <div class="col">
            <!--define the form action here-->
                <form action="">
                    <label for="memberaction-select">Select Member Actions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the Checkbox in the Member table below, then Choose the Member Action in the dropdown list below, and click the Apply Button."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                        <select class="form-control .memberaction-select" id="memberaction-select">
                            <option value="">Member Actions</option>
                            <option value="delete">Delete Selected Members</option>
                        </select> 
                </form>    
            </div>
            <div class="col py-3">
                <button id ="btn_member_action" type="button" class="btn btn-outline-primary">Apply</button>
            </div>
            <div class="col py-1">
                    <div class="app-search">
                            <!--<!?php echo form_open('admin/manage_members', array('class' => 'pl-3 pr-3')); ?>-->
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_value" id="search_val" placeholder="Member Search">
                                    <span class="mdi mdi-magnify"></span>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" id="btn_search" type="submit">Search</button>
                                    </div>
                                </div>
                            <!--<!?php echo form_close(); ?>-->
                        </div>
            </div>
  <!--end form-->
        </div><!--end row-->
        <!--begin member table-->
        <div class="table-responsive-sm">
            <table class="table table-centered mb-0 table-striped table-bordered" id="members_table">
                <thead class="thead-light">
                    <!--replace the data in this table with real member data-->
                    <tr>
                        <th scope="col">Name<br>Filter:&nbsp;&nbsp;<a href="#" id="fname_filter">First&nbsp;</a> &nbsp;&nbsp;<a href="#" id="lname_filter">Last</a></th>
                        <th scope="col">Group</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Last Login</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="m-tbody">
                    <?php foreach($user_obj as $user): ?>
                        <tr scope="row"><!--You'll have to add some PHP here to add the Member info -->
                            <td>
                            <span class="custom-control custom-checkbox">
                                <input type="checkbox" name="chk_name" class="custom-control-input" data-id="<?= $user->user_id ?>" id="memberCheck[<?= $user->user_id ?>]" <?= ($this->session->userdata['logged_in']['user_obj']->user_id == $user->user_id) ? "disabled" : ""?>>
                                <label class="custom-control-label" for="memberCheck[<?= $user->user_id ?>]"><?= $user->user_firstname . ' ' . $user->user_lastname  ?></label>
                            </span>
                            </td>
                            <td>
                                <?php foreach($user->group as $grp): ?>
                                    <p class="mb-0"><?= $grp->groups_name; ?></p>
                                <?php endforeach; ?>
                            </td>
                            <td><?= $user->user_name ?></td>
                            <td><?= $user->user_email ?></td>
                            <td><?= time_since($user->user_lastactivity) ?></td>

                            <td>
                                <?= ($user->user_status) ? "Active" : "Inactive"?>
                            </td>
                            <td>
                                <button id="view_member" data-id="<?= $user->user_id ?>" data-toggle="modal" data-target="#assigngroup-modal" class="btn btn-sm btn-primary" type="submit">&nbsp;View&nbsp;</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!-- end table-responsive-->
    </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!--end page content-->