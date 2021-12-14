    <!--Insert Google Structured Data for this particular page here-->
    <!--SAMPLE JSON GOOGLE STRUCTURED DATA PLEASE REPLACE WITH DYNAMIC DATA-->
    <?php  
      
        $imageArray = [];
        foreach($blog_object->blog_images as $image_blog) {
          if($image_blog->file_upload_name != ""){
            array_push($imageArray, '"'.base_url().$image_blog->file_upload_path.'"'.',');
          }
        }
    ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "<?= base_url() ?>blog/<?= $blog_object->url_alias_value ?>"
        },
        "headline": "<?= $blog_object->blog_title ?>",
        "image": [
            <?php 
              $count = 0;
                foreach($imageArray as $image_blog): 
              $count++;
            ?>
               <?php
                  if($count == count($imageArray)) { 
                    $image_blog =  rtrim($image_blog, ',');
                  }
                  echo $image_blog;
                ?>
          <?php endforeach; ?>
         ],
        "datePublished": "<?= ($blog_object->blog_published_date == "0000-00-00 00:00:00") ? $blog_object->blog_created_on : $blog_object->blog_published_date ?>",
        "dateModified": "<?=  ($blog_object->blog_modified_on == "0000-00-00 00:00:00") ? $blog_object->blog_created_on : $blog_object->blog_modified_on ?>",
        "author": {
          "@type": "Person",
          "name": "<?= $blog_object->author[0]->user_firstname. ' '.$blog_object->author[0]->user_lastname  ?>"
        },
         "publisher": {
          "@type": "Organization",
          "name": "<?= getSubDomain(); ?>",
          "logo": {
            "@type": "ImageObject",
            "url": "<?= base_url()?>assets/images/boomity-logo-new150x23.gif"
          }
        },
        "description": "<?= strip_tags($blog_object->blog_preview_text) ?>"
      }
      </script>
  <body class="sidebar-enable" data-keep-enlarged="true">
    <!-- Begin page -->
    <div class="wrapper">
      <!-- ========== This is will the site Navigation will go ========== -->

      <!-- ============================================================== -->
      <!-- Start Page Content here -->
      <!-- ============================================================== -->
      <div class="content-page">
        <div class="content">
          <!-- end Topbar -->
          <!-- Start Content-->
          <div class="container mt-5">

          </div>
          <!-- container -->
        </div>
        <!-- content -->
        <!--Content below this comment is the dynamic content for the Blog Post - Some dynamic information should be added to the /head of every Blog/Recipe/Job/Review page such as Google Structured Data - Everything above this line will change depending upon the User's Website -->
        <!--begin post page content here-->
        <div class="container-fluid">
          <div class="row">
            <section class="hero">
              <div class="container">
                <!-- Breadcrumbs -->

                <!-- Hero Content-->



                <!--end hero content-->
              </div>
              <!--end container-->
            </section>
          <section itemscope itemtype="https://schema.org/BlogPosting"><!--This is the same microdata for all Blog Postings - NOT DYNAMIC-->
            <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
            <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
             <meta itemprop="url" content="<?= base_url()?>assets/images/boomity-logo-new150x23.gif">
             </div>
                <meta itemprop="name" content="<?= getSubDomain(); ?>">
            </div>
              <div class="container" itemprop="articleBody">
                <div class="row">
                  <div class="col-xl-10 mx-auto">
                      <div class="hero-content pb-4 text-center">
                          <h1 class="mb-4" itemprop="headline name"><?= ucwords($blog_object->blog_title) ?></h1><!--inject post title-->
                          <!--make the image alt dynamic so that it is the same thing as the Caption-->
                          <p class="text-muted mb-3">
                            By<!--If there is an about us page which lists the Blog authors - this should link to it Dynamically if they want it to-->
                            <?php if(!empty($blog_object->author)) :?>
                              <a href="#" class="text-muted font-weight-bold"
                                > <span itemprop="author"><?= $blog_object->author[0]->user_firstname. ' '.$blog_object->author[0]->user_lastname  ?></span></a
                              >
                            <?php endif; ?>
                            <!--The itemprop Microdata above must be included-->
                            <!--dynamic date the post was published-->
                            <span class="mx-1">|</span>
                            <?php if(strtotime($blog_object->blog_published_date) != ""): ?>

                              <span itemprop="datePublished">
                                <?php $published_date = (strtotime($blog_object->blog_published_date) != "" && $blog_object->blog_published_date != "0000-00-00 00:00:00") ? date( 'F d,Y', strtotime($blog_object->blog_published_date) ) : "" ?>
                                <?=  $published_date ?>
                              </span>
                            <?php else: ?>

                              <span itemprop="datePublished">
                                <?php $published_date =  date( 'F d,Y', strtotime($blog_object->blog_created_on)); ?>
                                <?=  $published_date ?>
                              </span>

                            <?php endif; ?>

                            <!--Dynamic Post category and post URL-->
                            <?php if(!empty($blog_object->blog_category)) :?>

                              | in
                              <a
                                href="/blog/categories/<?= $blog_object->blog_category[0]->url_alias_value ?>"
                                class="font-weight-bold"
                                ><?= ucwords($blog_object->blog_category[0]->blog_category_title) ?></a
                              >

                            <?php endif; ?>

                              <span class="mx-1">|</span><span itemprop itemtype="http://schema.org/commentCount"><!--Microdata for Comment Count-->
                              <a href="#" class="text-muted">2 comments</a></span></p>
                    <p class="text-muted mb-0">
                      <!--Alt Tag should be dynamic based on Image name-->
                      <!--Image Caption Should be dynamic-->
                      <?php //if($blog_object->blog_images[0]->file_upload_name != ""): ?>
                      <a
                        href="/<?= ($blog_object->blog_images[0]->file_upload_name != "") ? $blog_object->blog_images[0]->file_upload_path : "assets/images/image-file.png"; ?>"
                        data-toggle="lightbox"
                        data-footer="<?= $blog_object->blog_images[0]->caption ?>"
                        data-gallery="img-gallery"
                        data-height="568"
                        data-width="851"
                      >
                        <img
                          src="/<?= ($blog_object->blog_images[0]->file_upload_name != "") ? $blog_object->blog_images[0]->file_upload_path : "assets/images/image-file.png"; ?>"
                          alt="<?= ($blog_object->blog_images[0]->caption != "") ? $blog_object->blog_images[0]->caption : $blog_object->blog_images[0]->file_upload_name ?>"
                          class="img-fluid" itemprop="image"
                        />
                      </a>
                      <?php //endif; ?>
                    </p>
                  </div>
                </div>
                <div class="row">

                  <div class="col-xl-8 col-lg-10 mx-auto">
                      <!-- Social Share column -->
                    <div class="col text-right mb-3">
                      <p class="text-muted">Share this post!</p>
                      <div id="share-blog">
                      </div>
                    </div>

                    <!--end social share div-->

                    <p class="lead mb-5">
                      <span itemprop="description"><!--This should be taken from the lead description of the Blog Post from the blogs-newpost form. This description also needs to be added to the JSON Google Structured data in the Head of this page-->
                        <?= $blog_object->blog_preview_text ?>
                      </span>
                    </p>
                    <div class="text-content text-lg">
                      <span itemprop="articleBody"><!--This should appear after the article description or lead-->
                      <p>
                        <?= $blog_object->blog_body[0]->content_article ?>
                      </p>
                      <p class="text-center text-muted text-sm">
                        <!--Alt Tag should be dynamic based on Image name-->
                        <!--Image Caption Should be dynamic-->
                        <?php if($blog_object->blog_images[1]->file_upload_name != ""): ?>

                            <a
                              href="/<?= $blog_object->blog_images[1]->file_upload_path?>"
                              data-footer="<?= $blog_object->blog_images[1]->caption?>"
                              data-toggle="lightbox"
                              data-gallery="img-gallery"
                              data-width="730"
                              data-height="485"
                            >
                              <img
                              src="/<?= $blog_object->blog_images[1]->file_upload_path?>"
                              alt="<?= ($blog_object->blog_images[1]->caption != "") ? $blog_object->blog_images[1]->caption : $blog_object->blog_images[1]->file_upload_name ?>"
                                class="img-fluid" itemprop="image"
                              />
                            </a><!--make the image alt dynamic so that it is the same thing as the Caption--><br />

                          <?php endif; ?>
                      </p>
                      <?php if($blog_object->blog_images[1]->caption != ""): ?>

                        <p class="text-center text-muted text-sm mt-2" >
                          <span itemprop="author"><?= $blog_object->blog_images[1]->caption ?></span> <span itemprop="subjectOf"></span> <!--this should be dynamic if they wish to list photo subject and Photographer-->
                        </p>

                      <?php endif; ?>

                      <h2><?= $blog_object->blog_body[1]->content_header ?></h2>
                      <span itemscope itemtype="https://schema.org/Quotation"><!--Microdata for Quotation-->
                      <?php if($blog_object->blog_body[0]->blockquote != ""): ?>

                        <blockquote class="blockquote blockquote-primary">
                          <?= $blog_object->blog_body[0]->blockquote ?>
                          <footer class="blockquote-footer"> <span itemprop="Author"><?= $blog_object->blog_body[0]->blockquote_author ?></span> <cite title="Source Title"><?= $blog_object->blog_body[0]->blockquote_publication ?></cite></footer>
                        </blockquote>

                      <?php endif; ?>
                    </span>
                      <p>
                        <?= $blog_object->blog_body[1]->content_article ?>
                      </p>
                      <h3><?= $blog_object->blog_body[2]->content_header ?></h3>
                      <p>
                         <?= $blog_object->blog_body[2]->content_article ?>
                      </p>

                      <!--<span itemscope itemtype="https://schema.org/Quotation">Microdata for Quotation-->

                      <!-- <blockquote class="blockquote blockquote-primary">
                        <s?= $blog_object->blog_body[2]->blockquote ?>
                        <footer class="blockquote-footer"> <span itemprop="Author"><s?= $blog_object->blog_body[1]->blockquote_author ?></span> <cite title="Source Title"><?= $blog_object->blog_body[1]->blockquote_publication ?></cite></footer>
                      </blockquote></span> -->


                      <p class="text-center text-muted text-sm">
                          <!--Alt Tag should be dynamic based on Image name-->
                          <!--Image Caption Should be dynamic-->
                          <?php if($blog_object->blog_images[2]->file_upload_name != ""): ?>
                          <a
                            href="/<?= $blog_object->blog_images[2]->file_upload_path ?>"
                            data-footer="<?= $blog_object->blog_images[2]->caption ?>"
                            data-toggle="lightbox"
                            data-gallery="img-gallery"
                            data-width="730"
                            data-height="485"
                          >
                            <img
                              src="/<?= $blog_object->blog_images[2]->file_upload_path ?>"
                              alt="<?= ($blog_object->blog_images[2]->caption != "") ? $blog_object->blog_images[2]->caption : $blog_object->blog_images[2]->file_upload_name ?>"
                              class="img-fluid" itemprop="image"
                            /> </a
                          ><!--make the image alt dynamic so that it is the same thing as the Caption--><br />
                          <?php endif; ?>
                        </p>
                         <!--Optional Embed Video-->
                          <?php
                              if(trim($blog_object->blog_body[4]->content_article) != ""):
                          ?>
                          <div class="embed-responsive embed-responsive-16by9 mb-3">
                             <span itemprop="video">
                                <?= $blog_object->blog_body[4]->content_article ?>
                            </span>
                          </div>
                      <?php endif; ?>
                        <!--blockquote Microdata should appear if they choose to include a blockquote-->
                  
                        <span itemscope itemtype="https://schema.org/Quotation">
                        <?php if($blog_object->blog_body[1]->blockquote != ""): ?>

                          <blockquote class="blockquote text-center">
                              <p class="mb-0"><?= $blog_object->blog_body[1]->blockquote ?></p>
                              <footer class="blockquote-footer"> <span itemprop="Author"><?= $blog_object->blog_body[1]->blockquote_author ?> </span> <cite title="Source Title"><?= $blog_object->blog_body[1]->blockquote_publication ?></cite></footer>
                          </blockquote>

                          <?php endif; ?>
                        </span>
                        <h4><?= $blog_object->blog_body[3]->content_header ?></h4>
                      <p>
                        <?= $blog_object->blog_body[3]->content_article ?>
                      </p>
                    </div>
                  </span><!--end article body Microdata span-->
                  </span><!--end article Microdata span-->
                    <!-- comments-->
                    <div class="comments mt-5">
                      <span itemprop itemtype="http://schema.org/commentCount"><!--Microdata for Comment Count-->
                      <h6
                        class="comments-heading text-uppercase text-muted mb-4"
                      >
                        2 comments
                      </h6></span>
                      <!-- comment-->
                      <span itemprop="comment"><!--Comment Microdata-->
                      <dl class="row">
                          <dt class="col-sm-3"><span class="mr-4">
                              &nbsp;
                            </span></dt>

                          <dd class="col-sm-9"><h5>Julie Alma</h5></dd>

                          <dt class="col-sm-3"><span class="mr-4">
                              <img
                                src="/assets/images/users/avatar-3.jpg" class="mr-2 rounded-circle"
                                alt="Commentor"
                                class="img-fluid rounded-circle">
                            </span></dt>
                          <dd class="col-sm-9">
                              <p class="text-uppercase text-sm text-muted">
                                  <i class="far fa-clock"></i> September 23, 2017 at
                                  12:00 am
                                </p>
                              <p class="text-muted">Pellentesque habitant morbi tristique senectus et
                                  netus et malesuada fames ac turpis egestas.
                                  Vestibulum tortor quam, feugiat vitae, ultricies
                                  eget, tempor sit amet, ante. Donec eu libero sit
                                  amet quam egestas semper. Aenean ultricies mi vitae
                                  est. Mauris placerat eleifend leo.</p>
                          </dd>

                          <dt class="col-sm-3">&nbsp;</dt>

                          <dd class="col-sm-9"><h5>Louise Armero</h5></dd>

                          <dt class="col-sm-3 text-truncate"><span class="mr-4">
                              <img
                                src="/assets/images/users/avatar-2.jpg" class="mr-2 rounded-circle"
                                alt="Commentor"
                                class="img-fluid rounded-circle">
                            </span> </dt>
                          <dd class="col-sm-9"><p class="text-uppercase text-sm text-muted">
                              <i class="far fa-clock"></i> June 23, 2017 at 12:35
                              pm
                            </p>
                            <p class="text-muted">
                                Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas.
                                Vestibulum tortor quam, feugiat vitae, ultricies
                                eget, tempor sit amet, ante. Donec eu libero sit
                                amet quam egestas semper. Aenean ultricies mi vitae
                                est. Mauris placerat eleifend leo.
                              </p></dd>
                            </span><!--end comment Microdata span--><!--All comments should be within this Microdata span-->
                      </dl>
                      <!-- /comment-->

                      <!-- /comment-->
                    </div>
                    <!-- /comments-->

                    <!-- comment form-->
                    <div class="comment-form my-5">
                      <h6 class="text-uppercase mb-5">Leave a comment</h6>
                      <form
                        id="comment-form"
                        method="post"
                        action="#"
                        class="form"
                      >
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name" class="form-label"
                                >Name <span class="required">*</span></label
                              >
                              <input
                                id="name"
                                type="text"
                                class="form-control form-control-underlined"
                              />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email" class="form-label"
                                >Email <span class="required">*</span></label
                              >
                              <input
                                id="email"
                                type="text"
                                class="form-control form-control-underlined"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="form-group mb-4">
                          <label for="comment" class="form-label"
                            >Comment <span class="required">*</span></label
                          >
                          <textarea
                            id="comment"
                            rows="4"
                            class="form-control form-control-underlined"
                          ></textarea>
                        </div>
                        <!--ADD GOOGLE RECAPTCHA HERE-->

                        <button type="submit" class="btn btn-outline-dark">
                          <i class="far fa-comment"></i> Comment
                        </button>
                      </form>
                    </div>
                    <!-- /comment form-->
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
