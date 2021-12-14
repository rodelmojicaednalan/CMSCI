    <!--SAMPLE JSON GOOGLE STRUCTURED DATA PLEASE REPLACE WITH DYNAMIC DATA-->
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "DigitalDocument",
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "document/<?= $document_obj->url_alias_value ?>"
        },
        "headline": "<?= $document_obj->document_title ?>",
        "image": [
            <?php if($document_obj->document_preview_thumbnail != ""): ?>
                "<?= $document_obj->document_preview_thumbnail ?>"
            <?php endif; ?>
         ],
        "datePublished": "<?= $document_obj->document_published_on ?>",
        "dateModified": "<?= ($document_obj->document_modified_on != "0000-00-00 00:00:00") ? $document_obj->document_modified_on : ""?>",
        "author": {
          "@type": "Person",
          "name": "<?= (!empty($document_obj->author) ? $document_obj->author[0]->user_firstname.' '.$document_obj->author[0]->user_lastname : "") ?>"
        },
         "publisher": {
          "@type": "Organization",
          "name": "<?= getSubDomain(); ?>",
          "logo": {
            "@type": "ImageObject",
            "url": "<?= base_url()?>assets/images/boomity-logo-new150x23.gif'"
          }
        },
        "description": "<?= strip_tags($document_obj->document_description) ?>"
      }
      </script>
  </head>
  <body>
    <main role="main">
      <section itemscope itemtype="http://schema.org/DigitalDocument">
          <div class="container" itemprop="article">
            <div class="row">
              <div class="col col-xl-10 mx-auto">
                <div class="hero-content pb-4 text-center">
                <!--Insert dynamic document title in the h1 below-->
                  <h1 class="mb-3 mt-3" itemprop="name"><?= ucwords($document_obj->document_title) ?></h1>
                  <p class="text-muted mb-3">
                  <?php $published_date = (strtotime($document_obj->document_published_on) != "") ? date( 'F d,Y', strtotime($document_obj->document_published_on) ) : "" ?>
                      <!--The itemprop Microdata above must be included-->
                      <!--dynamic date the document was published-->
                      <span class="mx-1">Date Published:&nbsp;</span><span itemprop="datePublished"><!--dynamic Published on Date --><?= $published_date ?></span> | in
                      <!--Dynamic category name and category URL-->
                      
                     <?php if(!empty($document_obj->category)): ?>
                      <a
                        href="/document/categories/<?=  $document_obj->category[0]->url_alias_value ?>"
                        class="font-weight-bold"
                        ><span itemprop="category"><?= ucwords($document_obj->category[0]->document_category_title) ?></span></a> 
                      <?php endif; ?>&nbsp;|&nbsp;
                        File Size: <!--Insert Dynamic data with Document Size--><?= getReadableFileSize($document_obj->file_upload_size) ?>
                      </p>
                    <!--dynamically insert the Document here depending upon what it is. Alt tag should also be dynamic-->
                     <!--Itemscope and itemtype should be dynamic depending upon what the User entered for this media object-->
                        <?= getReaderHTML($document_obj->file_upload_path) ?>
                      </div><!--end hero-->

                    <!--This src above should = the Existing Document.--><!--Remove the example document.-->
                      <?php if($document_obj->document_downloadable == 1): ?>
                        <a href="/documents/download/<?= $document_obj->custom_url ?>" type="button" class="btn btn-outline-primary mb-3"><i class="fas fa-file-download"></i><span>Download</span> </a><!--This allows Download of this document file-->  
                      <?php endif; ?>
                      </span>
                      <h2>Description:</h2>
                      <p class="lead mb-5">
                          <span itemprop="description"><!--This should be taken from the description of the Document from the document-new.html form. This description also needs to be added to the JSON Google Structured data in the Head of this page-->
                         <?= $document_obj->document_description ?></span>
                        </p>
                </div><!--end col-->
            </div><!--end Row-->
          </div><!--end container-->
        </section><!--end section-->
   
        <!--end container-->
    </main>
