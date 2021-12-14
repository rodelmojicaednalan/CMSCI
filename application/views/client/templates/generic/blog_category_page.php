    <!-- Begin page -->
    <div class="wrapper">
      <!-- ========== This is will the site Navigation will go ========== -->

      <!-- ============================================================== -->
      <!-- Start Page Content here -->
      <!-- ============================================================== -->
      <div class="content-page">

        <!-- content -->
        <!--Content below this comment is the dynamic content for the Blog Post - Some dynamic information should be added to the /head of every Blog/Recipe/Job/Review page such as Google Structured Data - Everything above this line will change depending upon the User's Website -->
        <!--begin post page content here-->
        <div class="container d-flex align-content-center flex-wrap">
          <div class="row">
            <section class="hero">
              <div class="container">
                  
                <!-- Hero Content-->
              <section itemscope itemtype="http://schema.org/category"><!--This is the same microdata for all All category list pages - NOT DYNAMIC-->
                <div class="col-xl-10 mx-auto">
                  <div class="hero-content pb-4">
                      <h1 class="text-center mb-4" itemprop="name"><?= ucwords($blog_details->blog_category_title) ?></h1><!--inject category title-->
                      <p><?= $blog_details->blog_category_description ?></p><!--Dynamic Category Description is above.-->
                  </div>
                  <div class="row">
                    <div class="col">
                    <!--this should be dynamic data based on the User's existing Document Categories - Dynamic Data should go in the data-filter and the Category title which should then link to the Category page.-->
                        <div class="navbar navbar-expand-lg navbar-light">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                  <li class="nav-item">
                                    <a class="nav-item nav-link" href="/blog"
                                      >Return to Blog Page</a>
                                  </li>
                                </ul>
                            </div>
                        </div>
                      </div>
                               <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
                  </div>

                  <div class="row">
                    <div class="col">
                        <nav>
                          <?= $pagination; ?>
                        </nav>
                      </div><!--end col-->
                    </div><!--end pagination row-->
             
                  <!--These are the blog posts that are attached to this category this should show a small 150x100 image from the blog post and the Blog Post title, then the Blog Post description. The Title and the Image should link to the specific Blog Post.-->
                  <ul class="list-unstyled">
                  <?php if(!empty($blog_object)): ?>
                    <?php foreach($blog_object as $blog): ?>
                      <li class="media"><a href="/blog/<?= $blog->blog_details[0]->url_alias_value ?>" title="Blog Post Title"><!--Dynamic inject the Blog Post URL and the Blog Post Title in the title field.-->
                        <img class="mr-3" src="/<?= ($blog->blog_details[0]->blog_images[0]->file_upload_name != "") ? $blog->blog_details[0]->blog_images[0]->file_upload_path : "assets/images/image-file.png" ?>" width="150px" height="100px" alt="<?= ( $blog->blog_details[0]->blog_images[0]->caption != "") ? $blog->blog_details[0]->blog_images[0]->caption  : $blog->blog_details[0]->blog_images[0]->file_upload_name ?>" itemprop="image"></a>
                        <div class="media-body" itemscope itemtype="http://schema.org/BlogPosting">
                          <h5 class="mt-0 mb-1" itemprop="headline"><a href="/blog/<?= $blog->blog_details[0]->url_alias_value ?>" title="Blog Post 1"><?= ucwords($blog->blog_details[0]->blog_title) ?></a></h5><!--This should be the actual BLog Post Title and the Actual Blog Post URL. THe Title in the link should be the actual blog post title.-->
                          <p>By: <span itemprop="author"><?= ucwords($blog->blog_details[0]->author[0]->user_firstname) .' '.  ucwords($blog->blog_details[0]->author[0]->user_lastname)  ?></span><!--This is the Dynamic Post Author-->   
                          - Date Published: <span itemprop="datePublished"><?=  date( "F d, Y", strtotime($blog->blog_details[0]->blog_published_date) ) ?></span><br> <!--this is the date the article was published-->
                          <span itemprop="exampleOfWork"><!--dynamic Description of the blog post-->
                          <?= $blog->blog_details[0]->blog_preview_text ?><!--This should be the BLog Post Description--></span></p>
                        </div>
                      </li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </ul>
                <!-- </div>  -->
                <!--end col-->
                <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
              
              <div class="row">
                <div class="col">
                    <nav>
                       <?= $pagination; ?>
                    </nav>
                  </div><!--end col-->
                </div><!--end pagination row-->
                </div>
                <!--end hero content-->
            </div>
              <!--end container-->
            </section>
            <section itemscope itemtype="https://schema.org/BlogPosting"><!--This is the same microdata for all Blog Postings - NOT DYNAMIC-->
              <div class="container" itemprop="article">
                <div class="row">
                  <div class="col-xl-10 mx-auto">
                      <div class="hero-content pb-4 text-center">
                          
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
    </div>
 
