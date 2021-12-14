
                 <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                            <li class="breadcrumb-item active">Member Privileges</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Member Privileges</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                    </div> <!-- container -->
                </div> <!-- content -->
                <!--begin page content here-->
                <?php
                        // echo '<pre>';
                        //     print_r($members_privileges_obj);
                        // echo '</pre>';
                $sessionGroup = $this->session->userdata['logged_in']['group_details'];
                ?>
                <div class="container">
                  <div class="row">
                    <div class="col-10">    
                      <p>
                          Use this page to manage the site Members privileges. Do this by selecting the Member then by selecting the Group Privilege Actions dropdown, then hit Apply.
                        </p>
                     <p>
                        Click the Question mark in the circle for further explanation on how to use a feature. 
                     </p>
   <!-- add Member modal content -->
   <!--This should trigger an email to the Member which includes the Administration Registration form-->
   <div id="addmember-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="primary-header-modalLabel">Add a Member</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <a href="/admin" class="text-success">
                        <span><img src="/assets/images/boomity-logo-new150x23.gif" alt="Boomity Logo" height="18"></span>
                    </a>
                </div>

                <!-- <form action="#" class="pl-3 pr-3"> -->
                <?= form_open('/admin/create_member', array('id' => 'member_createform', 'class' => 'pl-3 pr-3')); ?>
                    <p>Add a Name and Email address to add an Administrator Member to your site. They will receive an email invitation to set up an account after you add their email address here. If you need to change their privileges, you can do so on the Members Privileges page. </p>
                    <div class="form-group">
                            <label for="member-firstname">First Name</label>
                            <input name="user_firstname" class="form-control" type="text" required="" id="member-firstname" placeholder="Enter the Member's First Name">
                        </div>
                        <div class="form-group">
                                <label for="member-lastname">Last Name</label>
                                <input name="user_lastname" class="form-control" type="text" required="" id="member-lastname" placeholder="Enter the Member's Last Name">
                            </div>
                    <div class="form-group">
                        <label for="member-username">Username</label>
                        <input name="user_name" class="form-control" type="text" id="member-username" required="" placeholder="Enter their username">
                    </div>
                    <div class="form-group">
                        <label for="emailaddress1">Email address</label>
                        <input name="user_email" class="form-control" type="email" id="emailaddress1" required="" placeholder="Enter their email address">
                    </div>

                    <div class="form-group">
                            <p>Choose the Administrator privileges for this new Member.</p>
                            <div class="custom-control custom-checkbox">
                            <ul class="nav flex-column">
                                    <li class="nav-item">  
                                            <input type="checkbox" name="user_function_id[]" value="1" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">All Privileges</label>
                                    </li>
                                    <li class="nav-item">
                                            <input type="checkbox" name="user_function_id[]" value="2" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label"  for="customCheck2">Community, Marketing Features</label>
                                    </li>
                                    <li class="nav-item">
                                            <input type="checkbox" name="user_function_id[]" value="3" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label"  for="customCheck3">Blogs</label>
                                    </li>
                                    <li class="nav-item">
                                            <input type="checkbox" name="user_function_id[]" value="4" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">Discussions</label>
                                    </li>
                                    <li class="nav-item">
                                            <input type="checkbox" name="user_function_id[]" value="5" class="custom-control-input" id="customCheck5">
                                            <label class="custom-control-label" for="customCheck5">Events</label>
                                    </li>
                                    <li class="nav-item">
                                            <input type="checkbox" name="user_function_id[]" value="6" class="custom-control-input" id="customCheck6">
                                            <label class="custom-control-label" for="customCheck6">Media</label>
                                    </li>
                                    <li class="nav-item">
                                            <input type="checkbox" name="user_function_id[]" value="7" class="custom-control-input" id="customCheck7">
                                            <label class="custom-control-label" for="customCheck7">Documents</label>
                                    </li>
                                    <li class="nav-item">
                                            <input type="checkbox" name="user_function_id[]" value="8" class="custom-control-input" id="customCheck8">
                                            <label class="custom-control-label" for="customCheck8">Analytics</label>
                                        </li>
                                        <li class="nav-item">
                                                <input type="checkbox" name="user_function_id[]" value="9" class="custom-control-input" id="customCheck9">
                                                <label class="custom-control-label" for="customCheck9">Site Content</label>
                                        </li>
                                    </ul>
                        </div>
                    </div>
<!--Admin prviliges are here-->
                    <div class="form-group text-center">
                       
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                <?=  form_close(); ?>
                <!-- </form> -->

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                   <div class="button-list mb-2">
                      <!-- Custom width modal -->
                      <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#addmember-modal">Add a Member</button>
                      <!-- Full width modal -->
                  </div>
                <!--define the form action here-->
                    <?= form_open('admin/assign_privileges', array('id' => 'action-privileges-form')); ?>
                        <div class="row p-3 mb-2 justify-content-between">
                            <div class="col">
                    
                                    <label for="member-privilege-select">Group Privilege Actions&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the Checkbox in the Member table below, then Choose the Member Action in the dropdown list below, and click the Apply Button."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                                        <select class="form-control" name="user_function_id" id="member-privilege-select">
                                            <option value="0">Revoke all Privileges</option>
                                            <option value="1">Grant All Privileges</option>
                                            <option value="2">Manage Marketing, Community Features</option>
                                            <option value="3">Write Blogs</option>
                                            <option value="4">Discussions</option>
                                            <option value="5">Events</option>
                                            <option value="6">Media</option>
                                            <option value="7">Edit Documents</option>
                                            <option value="8">View Analytics</option>
                                            <option value="9">Edit Site Content</option>
                                        </select>     
                            </div>
                            <div class="col py-3">
                                <button id="apply_privilege" type="button" class="btn btn-outline-primary">Apply</button>
                            </div>
                       <?= form_close(); ?><!--end form-->
                        <div class="col py-1">
                                <div class="app-search">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Member Search">
                                                <span class="mdi mdi-magnify"></span>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                            
                   </div><!--end row-->
                    <input type="hidden" id="takenseats" value="<?php echo $count_seats ?>">
                    <input type="hidden" id="purchasedseats" value="<?= $sessionGroup->groups_seats ?>">
                    <!-- <p class="text-danger"><strong>You are using <?= $count_seats + 1 ?> out of <?= ($sessionGroup->groups_seats) + 1 ?> seats purchased.</strong> -->
                   <!--begin member table-->
                   <div class="table-responsive-sm">
                        <table class="table table-centered mb-0 table-striped table-bordered">
                            <thead class="thead-light">
                              <!--replace the data in this table with real member data-->
                                <tr>
                                    <th scope="col">Name Filter:&nbsp;&nbsp;<br><a href="#">First&nbsp;</a>&nbsp;<a href="#">Last</a></th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Make Admin</th>
                                    <th scope="col">Community, Marketing Features </th>
                                    <th scope="col">Blogs</th>
                                    <th scope="col">Discussions</th>
                                    <th scope="col">Events</th>
                                    <th scope="col">Media</th>
                                    <th scope="col">Documents</th>
                                    <!-- <th scope="col">Analytics</th>
                                    <th scope="col">Site Content</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php   
                              
                                $user_function_ids = array_column($functionlist, 'user_function_id');
                                $userid = $this->session->userdata['logged_in']['user_obj']->user_id;

                            ?>
                            <?php foreach($members_privileges_obj as $member_privileges): ?>
                                
                                <?php

                                    $privleges_array= array();

                                    foreach($member_privileges->member_privileges as $privilege){
                                            $privleges_array[] = $privilege->user_function_id;
                                    }

                                    $isallprivileges = 0;
                                    $ismarketingadmin = 0;
                                    $member_roleid = (!empty($member_privileges->role_id)) ? $member_privileges->role_id[0] : "";
                                ?>
                                <tr scope="row"><!--You'll have to add some PHP here to add the Member info-->
                                    <td><span class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input member-chk" data-id="<?= $member_privileges->user_id ?>" id="memberCheck_<?= $member_privileges->user_id ?>" <?= ($this->session->userdata['logged_in']['user_obj']->user_id == $member_privileges->user_id) ? "disabled" : ""?>>
                                            <label class="custom-control-label" for="memberCheck_<?= $member_privileges->user_id ?>"><?= $member_privileges->user_firstname.' '.$member_privileges->user_lastname ?></label>
                                    </span>
                                      </td>
                                    <td><?= $member_privileges->user_email?></td>
                                    
                                    <?php foreach($user_function_ids as $user_function): ?>
                                         <?php
                                            $disabled = "";
                                            $checked  = "";

                                            if(in_array($user_function, $privleges_array)){
                                                $checked = 'checked="checked"';
                                                
                                            }

                                            if($member_roleid == 1 || $userid == $member_privileges->user_id || $ismarketingadmin || $isallprivileges){
                                                $checked = 'checked="checked"';
                                                $disabled = 'DISABLED';
                                            }

                                            if( $user_function == 1 && in_array($user_function, $privleges_array) )
                                                $isallprivileges = 1;

                                            if( $user_function == 2 && in_array($user_function, $privleges_array) )
                                                $ismarketingadmin = 1;

                                         ?>

                                        <td>
                                            <span class="custom-control custom-checkbox ">
                                                <input type="checkbox" class="custom-control-input member_chk" data-member_id = "<?= $member_privileges->user_id ?>" data-function_id = "<?= $user_function ?>"  id="memberCheck_<?=$member_privileges->user_id?>_<?= $user_function ?>" <?= $checked . ' '. $disabled ?>>
                                                <label class="custom-control-label" for="memberCheck_<?=$member_privileges->user_id?>_<?= $user_function ?>"></label>
                                            </span>
                                        </td>
                                    <?php endforeach; ?>


                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
          
                </div><!--end col-->
                  </div><!--end row-->
                </div><!--end container-->
                <!--end page content-->