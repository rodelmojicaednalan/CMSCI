
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
                            <li class="breadcrumb-item active">Member Requests</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Member Requests</h4>
                </div>
                </div>
            </div>     
            <!-- end page title --> 
        </div> <!-- container -->
    </div> <!-- content -->
    <!--begin page content here-->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="col col-md-4 align-self-start">
                    <div class="app-search">
                        <?= form_open('admin/member_request_list', array('id' => 'request_search')) ?>
                            <div class="input-group">
                                <input type="text" name="search_value" class="form-control" placeholder="Requests Search">
                                <span class="mdi mdi-magnify"></span>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>  
    <!--begin table-->
    <div class="row mt-3">
        <div class="col">
        <div class="table-responsive">
            <table class="table table-centered mb-0 table-striped table-bordered" id="crequest_table">
                <thead>
                <th scope="col">
                    Name
                </th>
                <th scope="col">
                    Email
                    </th>
                    <th scope="col">
                        Message 
                    </th>
                    <th scope="col">
                        Status
                        </th>
                    <th scope="col">
                        Action
                    </th>
                </thead>
                <tbody class="crequest_tbody">
                <?php foreach($c_request_obj as $c_request): ?>
                    <tr scope="row" id="c_request_row" data-id="<?= $c_request->community_request_id ?>">
                    <td>
                       <?= $c_request->community_request_name ?>
                    </td>
                    <td>
                       <?= $c_request->community_request_email ?>
                    </td>
                    <td>    
                       <?= $c_request->community_request_message ?>
                    </td>
                    <td>
                       <?= $c_request->community_request_status ?>
                    </td>
                    <td> <button id="accept_request" data-name="<?= $c_request->community_request_name ?>" data-id="<?= $c_request->community_request_id ?>" class="btn btn-sm btn-primary" type="button">&nbsp;Accept&nbsp;</button> <button id="deny_request" data-id="<?= $c_request->community_request_id ?>" data-name="<?= $c_request->community_request_name ?>" class="btn btn-sm btn-danger " type="button">&nbsp;Deny&nbsp;</button> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
                </table>
        </div>
        </div>
    </div>
    <!--end page content-->