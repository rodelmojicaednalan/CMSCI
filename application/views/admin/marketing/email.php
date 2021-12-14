<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Marketing</li>
                    </ol>
                </div>
                <h4 class="page-title">Email Marketing</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
</div> <!-- container -->
</div> <!-- content -->
<!--begin page content here-->
<div class="container-fluid">
<div class="row">
      <div id="email-marketing" class="process-popup manage-emmpopup" style="width:100%; overflow-x: hidden;">
          <iframe frameborder="0" scrolling="auto" name="e-marketing-iframe" id="e-marketing-iframe"
            style="position: relative; overflow-x: hidden; overflow-y: scroll;" width="100%" height="1500" src="<?php echo MAUTIC_LOGIN_URL; ?>?groupid=<?php echo $groups_id;?>&timezone=<?php echo $timezone; ?>&hidelogin" onLoad="ssoLogin('<?php echo $username."|".$password; ?>');">
        </iframe>
      </div>

</div> <!--end row-->
</div> <!--end container-->
<!--end page content-->
