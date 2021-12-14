      <section
          class="position-relative py-6 mb-30px"
          itemscope
          itemtype="https://schema.org/BlogPosting"
        >

          <!--This is the same microdata for all Blog Postings - NOT DYNAMIC-->
          <?php if(!empty($data)): ?>
            <?php if(array_key_exists("featured_blog", $data)): ?>
            <div class="jumbotron jumbotron-fluid">
              <img
                src="<?= ($data['featured_blog']->blog_images[0]->file_upload_name != "") ? $data['featured_blog']->blog_images[0]->file_upload_path : "/assets/images/image-file.png" ?>"
                itemprop="image"
                alt="<?= ($data['featured_blog']->blog_images[0]->caption != "") ? $data['featured_blog']->blog_images[0]->caption : $data['featured_blog']->blog_images[0]->file_upload_name  ?>"
                class="bg-image"
                height="400"
              />
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="bg-white p-5">
                      <strong
                        class="text-uppercase text-muted d-inline-block mb-2 text-sm"
                        >Featured</strong
                      >
                      <h2 class="mb-3" itemprop="name"><?= $data['featured_blog']->blog_title ?></h2>
                      <p class="text-muted" itemprop="description">
                        <?= $data['featured_blog']->blog_preview_text ?>
                      </p>
                      <a href="<?= $data['featured_blog']->url_alias_type .'/'.  $data['featured_blog']->url_alias_value ?>" class="btn btn-link text-dark p-0"
                        >Continue reading
                        <i class="fas fa-long-arrow-alt-right"></i
                      ></a>
                    </div>
                  </div>
                </div>
                <!--end row-->
              </div>
              <!--end container-->
            </div>
            <?php endif; ?>
            <!--end Jumbotron-->
        </section>
        <div class="container">
                      <!-- <div class="row">
                        <div class="col">
                        <s!--this should be dynamic data based on the User's existing Document Categories - Dynamic Data should go in the data-filter and the Category title which should then link to the Category page.--s>
                          <div class="navbar navbar-expand-lg navbar-light">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                  <?php if(!empty($blog_category)): ?>
                                      <?php foreach($blog_category as $category): ?>
                                        <li class="nav-item">
                                          <a class="nav-item nav-link" href="/blog/categories/<?= $category->url_alias_value ?>" data-filter="category1"
                                          ><?= ucwords($category->blog_category_title) ?></a>
                                        </li>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                          </div>
                      </div>
                    </div> -->
                    <section>
          <!--begin blog category dropdown -->
            <div class="container">
              <div class="row justify-content-end mb-3">
                <div class="col-12 align-self-end">
                  <div class="dropdown">
                    <button
                      class="btn btn-outline-primary dropdown-toggle"
                      type="button"
                      id="dropdownMenuButton"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      Blog Categories</button
                    ><!--this should be a dropdown menu that works-->
                    <div
                      class="dropdown-menu"
                      aria-labelledby="dropdownMenuButton"
                    >
                      <?php if(!empty($blog_category)): ?>
                            <?php foreach($blog_category as $category): ?>
                                      <a class="dropdown-item" href="/blog/categories/<?= $category->url_alias_value ?>"
                                      ><?= ucwords($category->blog_category_title) ?></a>
                              <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  <!--end dropdown-->
                </div>
                <!--end col-->
              </div>
              <!--end Row-->
            </div>
            <!--end container-->
          </section>
          <!--end blog category dropdown-->
        <section>
          <div
            class="container"
            itemscope
            itemtype="https://schema.org/BlogPosting"
          >
            <div class="row">
              <!-- post-->

              <?php

              if(array_key_exists("featured_blog", $data)){
                  unset($data['featured_blog']);
              }

              foreach($data as $blog): ?>

              <div class="col-lg-4 col-6">

                <div class="mb-30px">
                <?php //if($blog->blog_images[0]->file_upload_name != ""): ?>
                  <a href="/blog/<?= $blog->url_alias_value ?>"
                    ><img
                      src="<?= ($blog->blog_images[0]->file_upload_name != "") ? $blog->blog_images[0]->file_upload_path : "assets/images/image-file.png" ?>"
                      alt="<?= ($blog->blog_images[0]->caption != "") ? $blog->blog_images[0]->caption : $blog->blog_images[0]->file_upload_name ?>"
                      class="img-fluid"
                      width="350"
                  /></a>
                  <?php //endif; ?>
                  <div class="mt-3">
                  <?php if(!empty($blog->blog_category)): ?>

                    <small class="text-uppercase text-muted">
                      <a href="/blog/categories/<?= $blog->blog_category[0]->url_alias_value ?>" title="Category Title"
                        ><span itemprop="about"><?= $blog->blog_category[0]->blog_category_title ?></span>
                      </a>
                    </small>

                  <?php endif; ?>

                    <h5 class="my-2" itemprop="name">
                      <a href="<?= $blog->url_alias_type .'/'.  $blog->url_alias_value ?>" class="text-dark"
                        ><?= $blog->blog_title ?>
                      </a>
                    </h5>
                    <p class="text-gray-500 text-sm my-3">
                      <i class="far fa-clock mr-2"></i
                      ><span itemprop="dateCreated"><?=  date( "F d, Y", strtotime($blog->blog_published_date) ) ?></span>
                    </p>
                    <p class="my-2 text-muted" itemprop="description">
                     <?= $blog->blog_preview_text ?>
                    </p>
                    <a
                      href="<?= $blog->url_alias_type .'/'.  $blog->url_alias_value ?>"
                      class="btn btn-link text-gray-700 pl-0"
                      >Read more<i class="fas fa-long-arrow-alt-right ml-2"></i
                    ></a>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
              <!-- /post end-->
            </div>
            <!-- Pagination -->
            <?= form_open("/blog", array('id' => "pagination-form"));?>
            <nav aria-label="Blog pagination">
              <ul class="pagination justify-content-between mb-5">

                <li class="page-item">
                  <button type="submit" name="old_post" class="page-link">
                    <i class="fas fa-chevron-left mr-1"></i>Older posts</button
                  >
                </li>
                <li class="page-item">
                  <button type="submit" name="new_post" tabindex="-1" class="page-link"
                    >Newer posts <i class="fas fa-chevron-right ml-1"> </i
                  ></button>
                </li>

              </ul>

            </nav>
            <?= form_close(); ?>
          </div>
        </section>
      </div>
      <?php endif; ?>
      <!--end row-->

      <!--end container-->
