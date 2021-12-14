<div class="container d-flex align-content-center flex-wrap">
        <div class="row">
        <section class="hero">
            <div class="container">
            <!-- Hero Content-->
            <?php 
                $cIndex = 0;//index of category
                for($i = 0; sizeOf($data_mc) > $i; $i++) {
                    if($data_mc[$i]->media_category_id == $uri) {
                        $cIndex = $i;
                    }
                }
            ?>
            <section itemscope="" itemtype="http://schema.org/category"><!--This is the same microdata for all All category list pages - NOT DYNAMIC-->
            <div class="col-xl-10 mx-auto">
                <div class="hero-content pb-4">
                <h1 class="text-center mt-4 mb-4" itemprop="name"><?php echo($data_mc[$cIndex]->media_category_title) ?></h1><!--inject category title-->
                <!--dynamic category description-->
                <p><?php echo($data_mc[$cIndex]->media_category_description) ?></p><!--Dynamic Category Description is above.-->
                </div>
                <div class="container">
                    <div class="row">
                    <div class="col">
                    <!--this should be dynamic data based on the User's existing Media Categories - Dynamic Data should go in the data-filter and the Category title which should then link to the Category page.-->
                        <div class="navbar navbar-expand-lg navbar-light">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                    <a class="nav-item nav-link" href="/user/media">Return to Media Page</a>
                                    </li>
                        </ul></div>
                    </div>
                    </div>
                </div>
                </div>
                <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
                <?php
                    // print_r(sizeof($media_count));
                    $totalpages = ceil(sizeof($media_count) / 5);
                    
                    $currentActiveP = $this->uri->segment(4);
                    $currentActiveN = $this->uri->segment(4);

                    if($currentActiveP == 1)$currentActiveP = 1;else $currentActiveP--;
                    if($currentActiveN >= $totalpages)$currentActiveN = $totalpages;else $currentActiveN++;
                    if($totalpages > 1) {
                        echo ' <div class="row">
                                <div class="col">
                                <nav id="media_category_pagination">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item">
                                            <a class="page-link" href="/user/media_category/'.$data_mc[$cIndex]->media_category_id.'/'.$currentActiveP.'" aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>';
                                        
                        for($i = 0; $totalpages > $i; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="/user/media_category/'.$data_mc[$cIndex]->media_category_id.'/'.($i+1).'">'.($i+1).'</a></li>';
                        }           
                                        
                                    echo '
                                        <li class="page-item">
                                            <a class="page-link" href="/user/media_category/'.$data_mc[$cIndex]->media_category_id.'/'.$currentActiveN.'" aria-label="Next">
                                                <span aria-hidden="true">»</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            </div>';
                    }
                ?>
                <!--These are the Media that are attached to this category this should show a small 150x100 image from the Media and the Media title, then the Media description. The Title should link to the specific Media page.-->
                <ul class="list-unstyled">
                    
                    <?php 
                    // print_r($data);
                        for ($i = 0; sizeOf($data) > $i;$i++) {

                                $blog_category;
                                $published_state;
                                for($j = 0; sizeof($data_mc) > $j; $j++) {
                                    if($data[$i]->media_category_id == $data_mc[$j]->media_category_id)
                                    $blog_category = $data_mc[$j]->media_category_title;
                                }
                                echo '
                                <li class="media mb-3">
                                    <img src="'.$data[$i]->media_preview_thumbnail.'" class="mr-3" alt="..." height="150" width="150">
                                    <div class="media-body" itemscope="" itemtype="http://schema.org/MediaObject">
                                    <h5 class="mt-0 mb-1" itemprop="headline"><a href="/user/media_page/'.$data[$i]->media_id.'" title="'.$data[$i]->media_title.'">'.$data[$i]->media_title.'</a></h5>
                                    <p class="lead">
                                        Category:&nbsp;<span itemprop="category"><a href="/user/media_category/'.$data[$i]->media_category_id.'/1">'.$blog_category.'</a></span>&nbsp;|&nbsp; Date Published: <span itemprop="datePublished">'.$data[$i]->media_published_on.'</span>&nbsp;|&nbsp;File Size: 2mb </p>
                                        <p><span itemprop="exampleOfWork">'.$data[$i]->media_description.'</span></p>
                                        </div>
                                    </li>
                                        ';
                            
                        }
                    ?>
                </ul>
                </li>
            
            </div> <!--end col-->
            <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
            <?php
                    // print_r(sizeof($media_count));
                    $totalpages = ceil(sizeof($media_count) / 5);
                    
                    $currentActiveP = $this->uri->segment(4);
                    $currentActiveN = $this->uri->segment(4);

                    if($currentActiveP == 1)$currentActiveP = 1;else $currentActiveP--;
                    if($currentActiveN >= $totalpages)$currentActiveN = $totalpages;else $currentActiveN++;
                    if($totalpages > 1) {
                        echo ' <div class="row">
                                <div class="col">
                                <nav id="media_category_pagination">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item">
                                            <a class="page-link" href="/user/media_category/'.$data_mc[$cIndex]->media_category_id.'/'.$currentActiveP.'" aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>';
                                        
                        for($i = 0; $totalpages > $i; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="/user/media_category/'.$data_mc[$cIndex]->media_category_id.'/'.($i+1).'">'.($i+1).'</a></li>';
                        }           
                                        
                                    echo '
                                        <li class="page-item">
                                            <a class="page-link" href="/user/media_category/'.$data_mc[$cIndex]->media_category_id.'/'.$currentActiveN.'" aria-label="Next">
                                                <span aria-hidden="true">»</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            </div>';
                    }
                ?>
            
            <!--end hero content-->
            </section></div>
            <!--end container-->
        </section>
        <section itemscope="" itemtype="https://schema.org/BlogPosting"><!--This is the same microdata for all Mediaings - NOT DYNAMIC-->
            <div class="container" itemprop="article">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="hero-content pb-4 text-center">
                        
        </div></div></div></div></section>
        <!--end section-->
        </div>
        <!--end row-->
    </div>