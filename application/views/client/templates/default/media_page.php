<div class="container" itemprop="article">
    <div class="row">
        <div class="col col-xl-10 mx-auto">
        <div class="hero-content pb-4 text-center">

        <!--Insert dynamic Media title in the h1 below-->
            <h1 class="mb-3 mt-3" itemprop="name"><?php echo($data->media_title) ?></h1>
            <p class="text-muted mb-3">
                <?php $published_date = (strtotime($data->media_published_on) != "" && $data->media_published_on != "0000-00-00 00:00:00" ) ? date( 'F d,Y', strtotime($data->media_published_on) ) : "" ?>
                <span class="mx-1">Date Published:&nbsp;</span><span itemprop="datePublished"><?php echo $published_date; ?></span> | in
                <a href="/media/categories/<?php echo($data->media_category_id)?>" class="font-weight-bold"'><span itemprop="category">
                    <?php echo($data->media_category_title); ?>
                </span></a>&nbsp;|&nbsp;

                <?php

                    $size   = $data->file_upload_size;
                    $units  = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                    $power  = $size > 0 ? floor(log($size, 1024)) : 0;
                    $file_size = number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];

                ?>
                File Size: <!--Insert Dynamic data with Media Size--><?php echo $file_size; ?>
                </p>
            <!--dynamically insert the Media here depending upon what it is. Alt tag should also be dynamic-->
                <!--Itemscope and itemtype should be dynamic depending upon what the User entered for this media object-->

                 <?php if( $data->mediatype_id == 1 ): ?>
                    <img class="mr-3" src="<?php echo base_url('assets/images/audio300x150.png') ?>" alt="<?php echo $data->media_title ?>">
                <?php elseif( $data->mediatype_id == 2 ): ?>
                    <img class="mr-3" src="<?php echo base_url('assets/images/audio300x150.png') ?>" alt="<?php echo $data->media_title ?>">
                <?php elseif( $data->mediatype_id == 3 ): ?>
                    <video controls width="435" itemprop="video">
                        <source src="/<?php echo $data->file_upload_path ?>"
                                type="video/mp4">
                        Sorry, your browser doesn't support embedded videos.
                    </video>
                    
                <?php else: ?>
                    <a href="<?php echo !empty($data->media_preview_thumbnail) ? base_url($data->media_preview_thumbnail) :  (!empty($data->file_upload_path) ? base_url($data->file_upload_path) : base_url('assets/images/image-file.png') ) ?>" data-lightbox="image-1">
                        <img class="mr-3 media_page_img" src="<?php echo !empty($data->media_preview_thumbnail) ? base_url($data->media_preview_thumbnail) :  (!empty($data->file_upload_path) ? base_url($data->file_upload_path) : base_url('assets/images/image-file.png') ) ?>" width="100%" style="min-width: 950;" alt="<?php echo $data->media_title ?>">
                    </a>
                <?php endif ?>
                <!--dynamic media object here -->
                </div><!--end hero-->

            
            <iframe id="invisible" style="display:none;"></iframe>

            <h2>Description:</h2>
            <p class="lead mb-5">
                <span itemprop="description"><!--This should be taken from the description of the Media from the Media-new.html form. This description also needs to be added to the JSON Google Structured data in the Head of this page-->
                    <?php echo($data->media_description) ?>
                </span>
            </p>
            
            <?php if( $data->media_downloadable == 1 ): ?>
                <a  class="btn btn-outline-primary mb-3" style="float:right;" href="<?php echo base_url($data->file_upload_path) ?>" download><i class="fas fa-file-download" ></i><span>Download</span> </a>
             <!-- <button type="button" class="btn btn-outline-primary mb-3" data-src="<?php echo base_url($data->file_upload_path) ?>" onclick="download('<?php echo base_url($data->file_upload_path) ?>')"><i class="fas fa-file-download" ></i><span>Download</span> </button> --><!--This allows Download of this Media file-->
            <?php endif ?>

        </div><!--end col-->
    </div><!--end Row-->
</div>
