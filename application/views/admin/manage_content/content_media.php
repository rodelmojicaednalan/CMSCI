<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Manage Content</a></li>
                            <li class="breadcrumb-item active">Media</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Media</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>
    <!-- container -->
</div>
<!-- content -->
<!--begin page content here-->
<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h3 class="header-title">
                        Site Media
                      </h3>
                    <p>
                        Use this page to upload more images or media items to your website. You can categorize this media to optimize your site's SEO.
                    </p>
                    <p>Make sure that your images are compressed for the web. To compress images online use this tool: <a href="https://squoosh.app/" title="squoosh app"> https://squoosh.app/.</a></p>
                    <p>Roll over the question mark in a circle for instructions on how to use a feature. More information and instructions can be found in the Knowledgebase.</p>
                    <p class="text-muted">This feature works best on laptop or desktop computers.</p>
                    <div class="col-10 offset-8">
                        <div class="app-search">
                            <form action="/admin/media">
                                <!--this is the media search form should media titles only-->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Media Search" name="s">
                                    <span class="mdi mdi-magnify"></span>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end media search col-->
                </div>
                <!--end card body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- Delete Alert Modal -->
    <div id="delete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-wrong h1"></i>
                            <h4 class="mt-2">Are you Certain?</h4>
                            <p class="mt-3">This will delete this media item from your site. Are you sure you want to do this?</p>
                            <button type="button" class="btn btn-secondary my-2" data-dismiss="modal" aria-hidden="true" title="No">Cancel</button>
                            <button id="delete-media-btn" type="button" class="btn btn-outline my-2" data-dismiss="modal" title="Yes">Yes, I'm Sure</button>
                            <!--When they click this button it should delete the category that is checked in the table below.-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Warning Header Modal -->
    <div id="unpublish-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">Unpublish/Publish Media</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Unpublish/Publish your media</h5>
                    <p>Click The Publish to show this media item on your site.</p>
                    <p>Click Unpublish and the media item will not be visible on your site. It will not be deleted, but not be visible.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="unpublish-media-btn" class="btn btn-warning" data-dismiss="modal">Unpublish</button>
                    <button type="submit" id="publish-media-btn" class="btn btn-info" data-dismiss="modal">Publish</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!--end row-->
    <!--begin buttons-->
    <div class="row justify-content">
        <div class="col-3">
            <form action="#">
                <!--Make this form work!-->
                <label for="postaction-select">View by Category&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the media category from the list below to view media from this category."><i class="dripicons mdi mdi-help-circle-outline"></i></a>&nbsp;</label>
                <div class="btn-group mb-2">

                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose One</button>
                    <!--these should be dynamic based on the categories-->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/media">All</a>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="/admin/media?cat=0">General</a>
                        <?php foreach ($media_category as $key => $cat): ?>
                             <a class="dropdown-item" href="/admin/media?cat=<?php echo $cat->media_category_id ?>" data-catid="<?php echo $cat->media_category_id ?>"><?php echo $cat->media_category_title ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
                <!-- /btn-group -->
            </form>
        </div>
        <!--end col-->
        <div class="col-3">
            <form action="#">
                <!--Make this form work!-->
                <label for="postaction-select">View by Media type&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the media Type from the list below to view media from this category."><i class="dripicons mdi mdi-help-circle-outline"></i></a>&nbsp;</label>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose One</button>
                    <!--these should be dynamic based on the categories-->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/media">All</a>
                        <?php foreach ($media_type as $key => $type): ?>
                             <a class="dropdown-item" href="/admin/media?type=<?php echo $type->mediatype_id ?>" data-typeid="<?php echo $type->mediatype_id ?>"><?php echo $type->mediatype_name ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
                <!-- /btn-group -->
            </form>
        </div>
        <!--end col-->
        <!--end col-->
        <div class="col-4 text-right">
            <div class="button-list">
                <a href="./add_media" class="btn btn-outline-secondary" title="Add New Media">Add New Media</a>
                <a href="./media_manage_categories" class="btn btn-outline-info" title="Manage Categories">Manage Media Categories</a>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row m-2">
        <div class="col-12">
            <div class="card-deck-wrapper">
                <div class="card-deck">


                <?php foreach ($media as $key => $row): ?>
                    <?php
                        $matches = false;
                        if($row->mediatype_id == 3 && $row->file_upload_id == 0 && trim($row->media_embed_value) != ''){
                            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $row->media_embed_value, $matches);
                        }
                    ?>
                    <div class="card-d-block">
                        <div class="card m-2 p-2">
                            <h5 class="card-title"><?php echo $row->media_title ?></h5>

                            <?php if(isset($matches[1])){ ?>
                                  <img class="card-img-center" src="http://img.youtube.com/vi/<?=$matches[1]?>/mqdefault.jpg" alt="<?php echo $row->media_title ?>" style="max-width: 300px; max-height: 200px">
                            <?php }else{ ?>
                                
                                    <?php if( $row->mediatype_id == 3 ) : ?>
                                        <img class="card-img-center" src="<?php echo base_url('assets/images/video-file.png') ?>" alt="<?php echo $row->media_title ?>" style="width: 300px; height: 200px">
                                    <?php else: ?>
                                        <img class="card-img-center" src="<?php echo !empty($row->media_preview_thumbnail) ? base_url($row->media_preview_thumbnail) :  (!empty($row->file_upload_path) ? base_url($row->file_upload_path) : base_url('assets/images/video-file.png') ) ?>" alt="<?php echo $row->media_title ?>" style="max-width: 300px; max-height: 200px">
                                    <?php endif ?>
                                  
                            <?php } ?>

                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <span class="header-title">Downloadable:</span>&nbsp; <span class="downloadable-text" data-downloadable="<?php echo $row->media_id ?>"><?php echo ($row->media_downloadable ? "Yes" : "No") ?></span>
                                    </li>
                                    <li>
                                        <span class="header-title">Status:</span>&nbsp;  <span data-published-status="<?php echo $row->media_id ?>"><?php echo ($row->media_published ? "Published" : "Not Published") ?>
                                    </li>
                                    <li>
                                        <span class="header-title">Category:</span> &nbsp; <?php echo $row->media_category_title ?>
                                    </li>
                                    <li>
                                        <span class="header-title">Group:</span>&nbsp;
                                        <!--Dynamic Data--><?php echo ($row->media_permissions == 0 ? "Everyone" : (isset($row->groups_name) ? $row->groups_name : "") ) ?>
                                    </li>
                                    </ul>
                                    <p><span class="align-top">Allow Download?</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="text-right allow_downloabale" type="checkbox" id="switch<?php echo $row->media_id ?>" data-media-id="<?php echo $row->media_id ?>" <?php echo ($row->media_downloadable ? "checked=''" : "") ?> data-switch="warning" />
                                        <label for="switch<?php echo $row->media_id ?>" data-on-label="Yes" data-off-label="No" class=""></label>
                                    </p>
                                    <p class="button-list text-center mb-1">

                                        <button id="unpublish-media-<?php echo $row->media_id ?>" type="submit" class="btn btn-outline-info" data-toggle="modal" data-target="#unpublish-modal">
                                            <?php if( $row->media_published == 1 ): ?>
                                                 <i class="mdi mdi mdi-block-helper mr-1"></i>
                                                <span data-publish="<?php echo $row->media_id ?>">Unpublish</span>
                                            <?php else: ?>
                                                 <i class="mdi mdi mdi-block-helper mr-1"></i>
                                                <span data-publish="<?php echo $row->media_id ?>">Publish</span>
                                            <?php endif ?>
                                            </button>
                                        <button id="delete-media-<?php echo $row->media_id ?>" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-alert-modal"><i class="dripicons dripicons-trash mr-1"></i> <span>Delete</span> </button>
                                    </p>
                                    <p><a href="./media_edit_media/<?php echo $row->media_id ?>" class="btn btn-primary btn-block" title="edit this media"><i class="dripicons dripicons-pencil mr-1" ></i>Edit Media</a></p>
                                    <p><a target="_blank" href="/media/<?php echo $row->media_id ?>?preview=true" class="btn btn-warning btn-block" title="preview this media"><i class="dripicons dripicons-preview mr-1" ></i>Preview</a></p>
                                </div>
                            </div>
                        </div>
                <?php endforeach ?>


                <?php
                    /*for ($i = 0; sizeOf($data) > $i;$i++) {
                        $blog_category;
                        $published_state;
                        for($j = 0; sizeof($data_mc) > $j; $j++) {
                            if($data[$i]->media_category_id == $data_mc[$j]->media_category_id)
                            $blog_category = $data_mc[$j]->media_category_title;
                        }

                      echo '
                      <div class="card-d-block">
                        <div class="card m-2 p-2">
                            <h5 class="card-title">'.$data[$i]->media_title.
                            '</h5>
                            <img class="card-img-center" src="'.$data[$i]->media_preview_thumbnail.'" alt="*Name of Page* Image">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <span class="header-title">Downloadable:</span>&nbsp;'.($data[$i]->media_downloadable ? "Yes" : "No").'
                                    </li>
                                    <li>
                                        <span class="header-title">Status:</span>&nbsp;'.($data[$i]->media_published ? "Published" : "Not Published").'
                                    </li>
                                    <li>
                                        <span class="header-title">Category:</span> &nbsp;'.$blog_category.'
                                    </li>
                                    <li>
                                        <span class="header-title">Group:</span>&nbsp;
                                        <!--Dynamic Data-->Everyone
                                    </li>
                                    </ul>
                                    <p><span class="align-top">Allow Download?</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="text-right" type="checkbox" id="switch1" checked data-switch="warning" />
                                        <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                                    </p>
                                    <p class="button-list text-center mb-1">
                                        <button id="unpublish-media-'.$data[$i]->media_id.'" type="submit" class="btn btn-outline-info" data-toggle="modal" data-target="#unpublish-modal"><i class="mdi mdi mdi-block-helper mr-1"></i><span>Unpublish</span> </button>
                                        <button id="delete-media-'.$data[$i]->media_id.'" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-alert-modal"><i class="dripicons dripicons-trash mr-1"></i> <span>Delete</span> </button>
                                    </p>
                                    <p><a href="./media_edit_media/'.$data[$i]->media_id.'" class="btn btn-primary btn-block" title="edit this media"><i class="dripicons dripicons-pencil mr-1" ></i>Edit Media</a></p>
                                </div>
                            </div>
                          </div>';
                    }*/
                 ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
</div>
<!--end container-->
<!--end page content-->
