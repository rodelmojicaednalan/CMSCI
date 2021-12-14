<?php
$CI =& get_instance();
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                    <li class="breadcrumb-item active">Pages</li>
                </ol>
            </div>
            <h4 class="page-title">Pages</h4>
        </div>
    </div><!--end col-->
</div>   <!--end row-->
<!-- end page title -->

<div class="container-fluid">
  <div class="row" id="modals_container">
    <?=$CI->load->view('admin/site_build/page_list_heading', array('keyword'=>$keyword), true)?>

    <?=$CI->load->view('admin/site_build/modals/metadata', array(), true)?>
    <?=$CI->load->view('admin/site_build/modals/newpage', array('page_layouts'=>$page_layouts), true)?>
    <?=$CI->load->view('admin/site_build/modals/seo', array(), true)?>
    <?=$CI->load->view('admin/site_build/modals/deletepage', array(), true)?>
  </div><!--END ROW-->
        <!-- Begin row -->
<div class="row mt-2" id="page_list">
    <div class="col-12">
        <div class="row justify-content mt-3"><!--pagination row-->
            <div class="col-md-4 offset-md-8">
                <?php echo $this->pagination->create_links(); ?>
            </div><!--end col-->
        </div><!--end pagination row-->
        <div>&nbsp;</div>
        <!--This begins the Page Cards Section-->
        <!--begin card deck wrapper-->
          <div class="card-deck-wrapper">
            <div class="card-deck" id="page_block_container">

              <!--begin column one-->
              <!--These cards will need to be dynamically added based on site pages-->
              <!--YOU ONLY NEED TO COPY THIS CARD TO MAKE ALL OF THE OTHER PAGE CARDS THE REST OF THEM DO NOT HAVE THE PROPER LINKS-->
              <?php foreach ($pages as $page) {
                    $img_str = getImgStr($page->page_content);
              ?>

              <?=$CI->load->view('admin/site_build/page_block', array('page'=>$page, 'img_str'=>$img_str), true)?>
              <!--THIS CARD IS JUST FOR PAGE CONTENT PURPOSES DELETE IT AND MAKE THE ONE ABOVE DYNAMIC-->
              <?php } ?>

              <?php if(count($pages) <= 0){ ?>
                <div class="">
                      <div class="mt-2 p-2"><p>Sorry, nothing was found on your search request.</p></div>
                </div>
              <?php } ?>

            </div><!--end card-deck-->
        </div>    <!--end card deck wrapper-->

        <div>&nbsp;</div>
        <div class="row justify-content mt-3"><!--pagination row-->
            <div class="col-md-4 offset-md-8">
                <?php echo $this->pagination->create_links(); ?>
            </div><!--end col-->
        </div><!--end pagination row-->
        <div>&nbsp;</div>

  </div><!--end col -12-->
</div><!--row-->
<!--end page content-->
</div><!--end content-->
