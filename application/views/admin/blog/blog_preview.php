<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?= ucwords($data_obj['post_title']) ?></title>
    <!--this should be dynamic and based on the Blog Title-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content="Boomity is a fully featured content management system which can be used to build e-commerce and marketing websites."
      name="description"
    />
    <META NAME="robots" CONTENT="noindex, nofollow" />
    <meta content="BOOMITY" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />

<link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
/>
<!--Put Custon Stylesheets after this line-->
<link
    rel="stylesheet"
    href="<?= GROUP_ASSETS.getSubDomain().'/' ?>assets/css/style.default.css?v=<?=ASSETS_VERSION?>"
    id="theme-stylesheet"
/>
<!-- css -->
<link rel="stylesheet" href="<?= GROUP_ASSETS.getSubDomain().'/' ?>assets/css/vendor.css?v=<?=ASSETS_VERSION?>" />
<link rel="stylesheet" href="<?= GROUP_ASSETS.getSubDomain().'/' ?>assets/css/custom.css?v=<?=ASSETS_VERSION?>" />
<link rel="stylesheet" href="<?= GROUP_ASSETS.getSubDomain().'/'?>assets/css/style.css?v=<?=ASSETS_VERSION?>" />
<!--Font Awesome CSS LINK-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

 <!-- jssocial css -->
 <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
 <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css" /> 
    <!--Insert Google Structured Data for this particular page here-->
    <!--SAMPLE JSON GOOGLE STRUCTURED DATA PLEASE REPLACE WITH DYNAMIC DATA-->
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "https://google.com/article"
        },
        "headline": "Article headline",
        "image": [
          "https://example.com/photos/1x1/photo.jpg",
          "https://example.com/photos/4x3/photo.jpg",
          "https://example.com/photos/16x9/photo.jpg"
         ],
        "datePublished": "2015-02-05T08:00:00+08:00",
        "dateModified": "2015-02-05T09:20:00+08:00",
        "author": {
          "@type": "Person",
          "name": "John Doe"
        },
         "publisher": {
          "@type": "Organization",
          "name": "Google",
          "logo": {
            "@type": "ImageObject",
            "url": "https://google.com/logo.jpg"
          }
        },
        "description": "A most wonderful article"
      }
      </script>
  </head>
  <body class="sidebar-enable" data-keep-enlarged="true">
  <?php $this->session->unset_userdata('preview_blog'); ?>
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
              <div class="container" itemprop="article">
                <div class="row">
                  <div class="col-xl-10 mx-auto">
                      <div class="hero-content pb-4 text-center">
                          <h1 class="mb-4" itemprop="name"><?= ucwords($data_obj['post_title']) ?></h1><!--inject post title-->
                          <!--make the image alt dynamic so that it is the same thing as the Caption-->
                          <p class="text-muted mb-3">
                            <?php if(!empty($data_obj['author'])): ?>
                            By<!--If there is an about us page which lists the Blog authors - this should link to it Dynamically if they want it to-->
                            <a href="#" class="text-muted font-weight-bold"
                              > <span itemprop="author"><?= $data_obj['author'][0]->user_firstname.' '.$data_obj['author'][0]->user_lastname ?> <!--dynamic Author name--></span></a
                            >
                            <?php endif; ?>
                            <!--The itemprop Microdata above must be included-->
                            <!--dynamic date the post was published-->
                            <span class="mx-1">|</span><span itemprop="datePublished"><!--dynamic Published on Date --><?= date('F d, Y') ?></span> 
                            <?php if(!empty($data_obj['category'])): ?>
                            | in
                            <!--Dynamic Post category and post URL--><a
                              href="/blog/categories/<?= $data_obj['category'][0]->url_alias_value ?>"
                              class="font-weight-bold"
                              ><?= ucwords($data_obj['category'][0]->blog_category_title) ?></a
                            >
                            <?php endif; ?>

                            <span class="mx-1">|</span><span itemprop itemtype="http://schema.org/commentCount"><!--Microdata for Comment Count-->
                            <a href="#" class="text-muted">2 comments</a></span></p>
                    <p class="text-muted mb-0">
                      <!--Alt Tag should be dynamic based on Image name-->
                      <!--Image Caption Should be dynamic-->
                      <?php if($image[0]['post_image1']['name'] != ""): ?>
                        <?php
                            $aExtraInfo1 = getimagesize($image[0]['post_image1']['tmp_name']);
                            $sImage1 = "data:" . $aExtraInfo1["mime"] . ";base64," . base64_encode(file_get_contents($image[0]['post_image1']['tmp_name']));
                        ?>
                        <a
                            href="<?= $image[0]['post_image1']['tmp_name'] ?>"
                            data-toggle="lightbox"
                            data-footer="<?= $data_obj['post_image1_caption']  ?>"
                            data-gallery="img-gallery"
                            data-height="568"
                            data-width="851"
                        >
                            <img
                            src="<?= $sImage1; ?>"
                            alt="<?= ($data_obj['post_image1_caption'] != "") ? $data_obj['post_image1_caption'] : $image[0]['post_image1']['tmp_name'] ?>"
                            class="img-fluid" itemprop="image"
                            />
                        </a>
                      <?php endif; ?>
                    </p>
                  </div>
                </div>
                <div class="row">
                
                  <div class="col-xl-8 col-lg-10 mx-auto">
                      <!-- Social Share column -->
                      <div class="col text-right mb-3">
                       <p class="text-muted">Share this post!</p>
                       <div class="jssocials-share jssocials-share-facebook icons-sm fb-ic p-2"><a href="#" class="jssocials-share-link" style="color: rgb(255, 118, 34);"><i class="fab fa-facebook-f jssocials-share-logo"></i></a></div><div class="jssocials-share jssocials-share-twitter icons-sm tw-ic p-2"><a href="#" class="jssocials-share-link" style="color: rgb(255, 118, 34);"><i class="fab fa-twitter jssocials-share-logo"></i></a></div><div class="jssocials-share jssocials-share-linkedin icons-sm li-ic p-2"><a  href="#" class="jssocials-share-link" style="color: rgb(255, 118, 34);"><i class="fab fa-linkedin-in jssocials-share-logo"></i></a></div><div class="jssocials-share jssocials-share-pinterest icons-sm li-ic p-2"><a  href="#" class="jssocials-share-link" style="color: rgb(255, 118, 34);"><i class="fab fa-pinterest-square jssocials-share-logo"></i></a></div><div class="jssocials-share jssocials-share-tumblr icons-sm fb-ic p-2"><a  href="#" class="jssocials-share-link" style="color: rgb(255, 118, 34);"><i class="fab fa-tumblr-square jssocials-share-logo"></i></a></div><div class="jssocials-share jssocials-share-googleplus icons-sm fb-ic p-2"><a  href="#" class="jssocials-share-link" style="color: rgb(255, 118, 34);"><i class="far fa-envelope jssocials-share-logo"></i></a></div>
                    </div>
                    
                    <!--end social share div-->
                    
                    <p class="lead mb-5">
                      <span itemprop="description"><!--This should be taken from the lead description of the Blog Post from the blogs-newpost form. This description also needs to be added to the JSON Google Structured data in the Head of this page-->
                        <?= htmlspecialchars_decode($data_obj['post_description']) ?>
                    </span>
                    </p>
                    <div class="text-content text-lg">
                      <span itemprop="articleBody"><!--This should appear after the article description or lead-->
                      <p>
                        <?= $data_obj['post_article1'] ?>
                      </p>
                      <p class="text-center text-muted text-sm">
                        <!--Alt Tag should be dynamic based on Image name-->
                        <!--Image Caption Should be dynamic-->
                        <?php if($image[0]['post_image2']['name'] != ""): ?>
                        <?php 
                            $aExtraInfo2 = getimagesize($image[0]['post_image2']['tmp_name']);
                            $sImage2 = "data:" . $aExtraInfo2["mime"] . ";base64," . base64_encode(file_get_contents($image[0]['post_image2']['tmp_name']));
                        ?>
                        <a
                            href="<?= $image[0]['post_image2']['tmp_name'] ?>" 
                            data-toggle="lightbox"
                            data-footer="<?= $data_obj['post_image2_caption']  ?>"
                            data-gallery="img-gallery"
                            data-height="568"
                            data-width="851"
                        >
                            <img
                            src="<?=  $sImage2 ?>"
                            alt="<?= ($data_obj['post_image2_caption'] != "") ? $data_obj['post_image2_caption'] : $image[0]['post_image2']['tmp_name'] ?>"
                            class="img-fluid" itemprop="image"
                            />
                        </a>
                          <!--make the image alt dynamic so that it is the same thing as the Caption--><br />
                      </p>
                      <?php endif; ?>
                    
                      <?php if($data_obj['post_image2_caption'] != ""): ?>

                        <p class="text-center text-muted text-sm mt-2" >
                            <span itemprop="author"><?= $data_obj['post_image2_caption'] ?></span> <span itemprop="subjectOf"></span> <!--this should be dynamic if they wish to list photo subject and Photographer-->
                        </p>
                        
                      <?php endif; ?>

                      <h2><?= $data_obj['post_header2'] ?></h2>

                      <span itemscope itemtype="https://schema.org/Quotation"><!--Microdata for Quotation-->
                      
                      <?php if($data_obj['post_blockquote1'] != ""): ?>
                        <blockquote class="blockquote blockquote-primary">
                            <?= $data_obj['post_blockquote1'] ?>
                            <footer class="blockquote-footer"> <span itemprop="Author"><?= $data_obj['post_blockquote_author1'] ?></span> <cite title="Source Title"><?= $data_obj['post_blockquote_publication1'] ?></cite></footer>
                        </blockquote>
                      <?php endif; ?>


                      </span> 
                      <p>
                        <?= $data_obj['post_article2'] ?>
                      </p>
                      <h3><?= $data_obj['post_header3'] ?></h3>
                      <p>
                        <?= $data_obj['post_article3'] ?>
                      </p>
                   
                      <p class="text-center text-muted text-sm">
                          <!--Alt Tag should be dynamic based on Image name-->
                          <!--Image Caption Should be dynamic-->
                        <?php if($image[0]['post_image3']['name'] != ""): ?>
                        <?php 
                            $aExtraInfo3 = getimagesize($image[0]['post_image3']['tmp_name']);
                            $sImage3 = "data:" . $aExtraInfo3["mime"] . ";base64," . base64_encode(file_get_contents($image[0]['post_image3']['tmp_name']));
                        ?>
                            <a
                                href="<?= $image[0]['post_image3']['tmp_name'] ?>" 
                                data-toggle="lightbox"
                                data-footer="<?= $data_obj['post_image3_caption']  ?>"
                                data-gallery="img-gallery"
                                data-height="568"
                                data-width="851"
                            >
                                <img
                                src="<?= $sImage3 ?>"
                                alt="<?= ($data_obj['post_image3_caption'] != "") ? $data_obj['post_image3_caption'] : $image[0]['post_image3']['tmp_name'] ?>"
                                class="img-fluid" itemprop="image"
                                />
                            </a><!--make the image alt dynamic so that it is the same thing as the Caption--><br />
                            </p>
                        <?php endif; ?>

                         <!--Optional Embed Video-->
                      <?php  if($data_obj['post_article5'] != ""): ?>
                      <div class="embed-responsive embed-responsive-16by9 mb-3">
                          <span itemprop="video">
                            <?= $data_obj['post_article5']  ?>
                          </span>
                      </div>
                      <?php endif; ?>
                        <!--blockquote Microdata should appear if they choose to include a blockquote-->
                        <span itemscope itemtype="https://schema.org/Quotation">

                        <?php if($data_obj['post_blockquote2'] != ""): ?>
                            <blockquote class="blockquote text-center">
                                <p class="mb-0"><?= $data_obj['post_blockquote2'] ?></p>
                                <footer class="blockquote-footer"> <span itemprop="Author"><?= $data_obj['post_blockquote_author2'] ?></span> <cite title="Source Title"><?= $data_obj['post_blockquote_publication2'] ?></cite></footer>
                            </blockquote>
                        <?php endif; ?>    
                            </span>
                        
                        <h4><?= $data_obj['post_header4'] ?></h4>
                      <p>
                            <?= $data_obj['post_article4'] ?>
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
        <!-- Footer Start -->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                &copy; <span id="year"></span>&nbsp;Boomity, Inc.
              </div>
              <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-md-block">
                  <a href="#">About</a>
                  <a href="#">Support</a>
                  <a href="#">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <!-- end Footer -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page content -->
      <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <!--THESE Social Share SCRIPTS SHOULD BE MOVED TO AN OUTSIDE JS FILE-->
    <!--Pinterest JS-->
    <script async defer src="//assets.pinterest.com/js/pinit.js"></script>
    <!--Tumblr-->
    <script id="tumblr-js" async src="https://assets.tumblr.com/share-button.js"></script>
    <!--Facebook-->
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!--Twitter-->
    <script>
      twttr.widgets.createShareButton(
      "https:\/\/dev.twitter.com\/web\/tweet-button",
      document.getElementById("tweet-container"),
        {
        size: "large",
        text: "custom share text",
        hashtags: "example,demo",
        //hashtags above should be customized per client or left off
        via: "twitterdev",
        elated: "twitterapi,twitter"
        }
           );
      </script>
      <!--end Twitter JS-->
    <!--Move this to an outside file-->
    <!--This is the Ekko Lightbox script for the Gallery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

    <!--THESE INLINE SCRIPTS SHOULD BE MOVED TO AN OUTSIDE JS FILE-->
    <!--YouTube PLAYER JS-->
    <script>
        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');
  
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  
        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
          player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: 'M7lc1UVf-VE',
            events: {
              'onReady': onPlayerReady,
              'onStateChange': onPlayerStateChange
            }
          });
        }
  
        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
          event.target.playVideo();
        }
  
        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false;
        function onPlayerStateChange(event) {
          if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
          }
        }
        function stopVideo() {
          player.stopVideo();
        }
      </script><!--end YouTube JS-->
    <!--ekko lightbox script-->
    <script>
      // Add alwaysShowClose: true, to after this ekkoLIghbox
      // Lightbox Init
      $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
      });
    </script>
    <script>
      $("#myCollapse").on("shown.bs.collapse", function(e) {
        // Action to execute once the collapsible area is expanded
      });
    </script>
    <script>
      //Get the current year for the copyright
      $("#year").text(new Date().getFullYear());
    </script>
    <!-- scripts -->
   <script src="assets/js/vendor.js"></script>
   <script src="assets/js/demo.js"></script>
   <script src="assets/js/app.js"></script>
   <!--JQuery Newest Build-->
   <script
     src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
     integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
     crossorigin="anonymous"
   ></script>
   <script
     src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
     integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
     crossorigin="anonymous"
   ></script>
   <script
     src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
     integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
     crossorigin="anonymous"
   ></script>
  </body>
</html>
