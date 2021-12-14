<div class="container" itemprop="article">
    <div class="row">
        <div class="col col-xl-10 mx-auto">
        <div class="hero-content pb-4 text-center">
        <?php 
            $mIndex = 0;//index of media
            for($i = 0; sizeOf($data) > $i; $i++) {
                if($data[$i]->media_id == $uri) {
                    $mIndex = $i;
                }
            }
        ?>
        <!--Insert dynamic Media title in the h1 below-->
            <h1 class="mb-3 mt-3" itemprop="name"><?php echo($data[$mIndex]->media_title) ?></h1>
            <p class="text-muted mb-3">
                <span class="mx-1">Date Published:&nbsp;</span><span itemprop="datePublished"><?php echo($data[$mIndex]->media_published_on) ?></span> | in
                <a href="media-category-page.html" class="font-weight-bold"><span itemprop="category">
                    <?php 
                        for($i = 0; sizeof($data_mc) > $i ;$i++) {
                            if($data[$mIndex]->media_category_id == $data_mc[$i]->media_category_id) {
                                echo($data_mc[$i]->media_category_title);
                            }
                        }
                    ?>
                </span></a>&nbsp;|&nbsp;
                File Size: <!--Insert Dynamic data with Media Size-->2mb
                </p>
            <!--dynamically insert the Media here depending upon what it is. Alt tag should also be dynamic-->
                <!--Itemscope and itemtype should be dynamic depending upon what the User entered for this media object-->
                <img src="<?php echo($data[$mIndex]->media_preview_thumbnail) ?>" alt="dynamic" itemprop="image">
                <!--dynamic media object here -->
                </div><!--end hero-->

            <!--This src above should = the Existing Media.--><!--Remove the example Media.-->
            <button type="button" class="btn btn-outline-primary mb-3"><i class="fas fa-file-download"></i><span>Download</span> </button><!--This allows Download of this Media file-->  
                
                <h2>Description:</h2>
                <p class="lead mb-5">
                    <span itemprop="description"><!--This should be taken from the description of the Media from the Media-new.html form. This description also needs to be added to the JSON Google Structured data in the Head of this page-->
                        <?php echo($data[$mIndex]->media_description) ?>
                    </span>
                </p>
                
        </div><!--end col-->
    </div><!--end Row-->
</div>