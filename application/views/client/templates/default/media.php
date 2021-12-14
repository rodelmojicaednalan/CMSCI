<!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">

<!--begin post page content here-->
      <div class="container d-flex align-content-center flex-wrap">
        <div class="row">
          <section class="hero">
            <div class="container">
              <!-- Hero Content-->
              <section itemscope itemtype="http://schema.org/MediaObject"><!--This is the same microdata for all All category list pages - NOT DYNAMIC-->
              <div class="col-xl-10 mx-auto">
                <div class="hero-content pb-4">
                  <h1 class="text-center mt-4 mb-4" itemprop="name">Educational Media</h1><!--inject category title-->
                  <!--dynamic category description-->
                  <p>View your Media by clicking on the name below. To view Media by category, click on the Media category name from the Navigation below.</p><!--Dynamic Category Description is above.-->
                </div>
                <div class="container">
                    <div class="row">
                      <div class="col">
                      <!--this should be dynamic data based on the User's existing Media Categories - Dynamic Data should go in the data-filter and the Category title which should then link to the Category page.-->
                          <div class="navbar navbar-expand-lg navbar-light">
                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                  <ul class="navbar-nav mr-auto">
                                       <?php foreach ($media_category as $key => $row): ?>
                                          <li class="nav-item">
                                              <a class="nav-item nav-link" href="/media/categories/<?php echo $row->media_category_id ?>" data-filter="<?php echo $row->media_category_title?>"><?php echo $row->media_category_title ?></a>
                                          </li>
                                      <?php endforeach ?>
                                  </ul>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                              <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
            <div class="row">
                <div class="col">
                     <?php echo $this->pagination->create_links(); ?>
                  </div><!--end col-->
                </div><!--end pagination row-->
                <!--These are the Medias that are attached to this category this should show a small 150x100 image from the Media and the Medias title, then the Medias description. The Title should link to the specific Media page.-->
                   <ul class="list-unstyled">
                      <?php foreach ($media as $key => $row): ?>
                          <li class="media mb-3">

                          <?php if( $row->mediatype_id == 1 ): ?>
                              <img class="mr-3" src="<?php echo base_url('assets/images/audio300x150.png') ?>" alt="<?php echo $row->media_title ?>" width="150" height="150">
                          <?php elseif( $row->mediatype_id == 2 ): ?>
                              <img class="mr-3" src="<?php echo base_url('assets/images/audio300x150.png') ?>" alt="<?php echo $row->media_title ?>" width="150" height="150">
                          <?php elseif( $row->mediatype_id == 3 ):
                                    $matches = false;
                                    if($row->file_upload_id == 0 && trim($row->media_embed_value) != ''){
                                        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $row->media_embed_value, $matches);
                                    }
                          ?>
                          <?php if(isset($matches[1])){ ?>
                                <img class="mr-3" src="http://img.youtube.com/vi/<?=$matches[1]?>/mqdefault.jpg" alt="<?php echo $row->media_title ?>" width="200" height="">
                          <?php }else{ ?>
                                <img class="mr-3" src="<?php echo base_url('assets/images/video-file.png') ?>" alt="<?php echo $row->media_title ?>" width="200" height="">
                          <?php } ?>

                          <?php else: ?>
                              <img class="mr-3" src="<?php echo !empty($row->media_preview_thumbnail) ? $row->media_preview_thumbnail :  (!empty($row->file_upload_path) ? $row->file_upload_path : base_url('assets/images/image-file.png') ) ?>" alt="<?php echo $row->media_title ?>" width="150" height="150">
                          <?php endif ?>


                          <div class="media-body" itemscope="" itemtype="http://schema.org/MediaObject">
                              <h5 class="mt-0 mb-1" itemprop="headline"><a href="/media/<?php echo $row->media_id ?>" title="<?php echo $row->media_title ?>"><?php echo $row->media_title ?></a></h5>
                              <p class="lead">
                                  Category:&nbsp;<span itemprop="category"><a href="/media/categories/<?php echo $row->media_category_id ?>"><?php echo $row->media_category_title ?></a></span>

                                  <?php

                                      $size   = $row->file_upload_size;
                                      $units  = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                                      $power  = $size > 0 ? floor(log($size, 1024)) : 0;
                                      $file_size = number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];

                                  ?>

                                  &nbsp;|&nbsp; Date Published: <span itemprop="datePublished"><?php echo date('m/d/Y', strtotime($row->media_published_on)) ?></span>&nbsp;|&nbsp;File Size: <?php echo $file_size ?> </p>
                                  <p>
                              <span itemprop="exampleOfWork"><?php echo ($row->media_description) ?></span></p>
                          </div>
                          </li>
                      <?php endforeach ?>
                  </ul>
              </div> <!--end col-->
              <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
            <div class="row">
              <div class="col">
                   <?php echo $this->pagination->create_links(); ?>
                </div><!--end col-->
              </div><!--end pagination row-->

              <!--end hero content-->
            </div>
            <!--end container-->
          </section>
          <section itemscope itemtype="https://schema.org/BlogPosting"><!--This is the same microdata for all Documentings - NOT DYNAMIC-->
            <div class="container" itemprop="article">
              <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="hero-content pb-4 text-center">
                  </div>
                </div>
            </div>
          </section>
          <!--end section-->
        </div>
        <!--end row-->
      </div>
      <!--end container-->
      <!--end page content-->


    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
