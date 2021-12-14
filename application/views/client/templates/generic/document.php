
         <section class="hero">
              <div class="container">
                <!-- Hero Content-->
                <section itemscope itemtype="http://schema.org/DigitalDocument"><!--This is the same microdata for all All category list pages - NOT DYNAMIC-->
                <div class="col-xl-10 mx-auto">
                  <div class="hero-content pb-4">
                    <h1 class="text-center mt-4 mb-4" itemprop="name">Research & Trends</h1><!--inject category title-->
                    <!--dynamic category description-->
                    <p>View your documents by clicking on the name below. To view documents by category, click on the document category name from the Navigation below.</p><!--Dynamic Category Description is above.-->
                  </div>
                  <div class="container">
                      <div class="row">
                        <div class="col">
                        <!--this should be dynamic data based on the User's existing Document Categories - Dynamic Data should go in the data-filter and the Category title which should then link to the Category page.-->
                          <div class="navbar navbar-expand-lg navbar-light">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                  <?php if(!empty($document_category)): ?>
                                      <?php foreach($document_category as $category): ?>
                                        <li class="nav-item">
                                          <a class="nav-item nav-link" href="/documents/categories/<?= $category->url_alias_value ?>" data-filter="category1"
                                          ><?= ucwords($category->document_category_title) ?></a>
                                        </li>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- </div> -->
                                <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
                  <div class="row">
                    <div class="col">
                      <nav>
                         <?= $pagination; ?>
                      </nav>
                    </div><!--end col-->
                  </div><!--end pagination row-->
                  <!--These are the documents that are attached to this category this should show a small 150x100 image from the Document and the documents title, then the documents description. The Title should link to the specific document page.-->
                  <ul class="list-unstyled">
                    <?php if(!empty($document)): ?>
                      <?php foreach($document as $doc): ?>
                      <?php $published_date = (strtotime($doc->document_published_on) != "") ? date( 'm/d/Y', strtotime($doc->document_published_on) ) : "" ?>
                        <li class="media my-4"><a href="document-page.html" title="Document Title"><!--Dynamic inject the Document URL and the Document Title in the title field.-->
                        </a>
                          <div class="media-body" itemscope itemtype="http://schema.org/DigitalDocument">
                            <h5 class="mt-0 mb-1" itemprop="headline"><a href="/documents/<?= $doc->url_alias_value ?>" title="Document 1"><?= ucwords($doc->document_title) ?></a></h5><!--This should be the actual Document Title and the Actual Document URL. THe Title in the link should be the actual Document title.-->
                            <p class="lead">
                            Category:&nbsp;<!--dynamic document category should link to category page--><?php if(!empty($doc->category)): ?><span itemprop="category"><a href="/document/categories/<?= $doc->category[0]->url_alias_value ?>"><?= ucwords($doc->category[0]->document_category_title)  ?></a></span><?php endif; ?>&nbsp;|&nbsp; Date Published: <!--this is the dynamic date the document was published--> <span itemprop="datePublished"><?= $published_date ?></span>&nbsp;|&nbsp;File Size:<!--dynamic file size here--><?= getReadableFileSize($doc->file_upload_size) ?></p>
                            <p><span itemprop="exampleOfWork"><!--dynamic Description of the Document-->
                            <?= $doc->document_description ?></span></p>
                          </div>
                        </li>
                        <?php endforeach; ?>
                      <?php endif; ?>
                  </ul>
               <!-- </div> --> <!--end col-->
                <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
              <div class="row">
                <div class="col">
                    <nav>
                      <?= $pagination; ?>
                    </nav>
                  </div><!--end col-->
                </div><!--end pagination row-->
                <!--end hero content-->
              </div>
            </div>
              <!--end container-->
            </section>
            <section itemscope itemtype="https://schema.org/BlogPosting"><!--This is the same microdata for all Documentings - NOT DYNAMIC-->
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
  </section >
