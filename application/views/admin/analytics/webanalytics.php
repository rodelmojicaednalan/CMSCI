<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Analytics</li>
                    </ol>
                </div>
                <h4 class="page-title">Web Analytics</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
</div> <!-- container -->
</div> <!-- content -->
<!--begin page content here-->
<div class="container-fluid">
<div class="row">
      <?php if(isset($wa->web_analytics_id)){ ?>
                <?php
                    echo '<div style="width:100%;" id="analytics_snippet"><iframe src = "https://piwik.boomity.net/piwik-embed/index.php?module=CoreHome&action=index&idSite='.$wa->web_analytics_site_id.'&period=day&date=today" width="100%" height="1800px" frameborder=0><p>Your browser does not support iframes.</p></iframe></div>';
                ?>
      <?php }else{ ?>
                <div>Analytics tracking code not found.</div>
      <?php } ?>
</div> <!--end row-->
</div> <!--end container-->
<!--end page content-->
