<div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Manage Content</a></li>
                            <li class="breadcrumb-item"><a href="/admin/media">Media</a></li>
                            <li class="breadcrumb-item"><a href="/">Manage Categories</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Media Categories</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-10">
                <div class="card">
                <div class="card-body">
                    <h3 class="header-title">
                        Manage Media Categories
                        </h3>
                        <p>
                        Use this page to create and manage your media categories.
                        </p>
                        <p>To Add a New Category, click the <a href="./admin/media_new_category" title="Add New Category">Add New Category</a> button below. To Edit an existing category, check the button next to the category and hit the Edit Category button. To view the media items in this category, click the button next to the category name, then click the View button in the table below. </p>
                        To manage your Media items, visit the <a href="./admin/media_manage_categories" title="Manage Media">Media page.</a> 
                </div><!--end card body-->
                </div><!--end card-->
            </div><!--end col-->
            </div><!--end row-->
            <!-- Delete Alert Modal -->
            <div id="confirmation-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-danger">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <input type="hidden" value="" id="confirmation_id" readonly/>
                            <i class="dripicons-wrong h1"></i>
                            <h4 class="mt-2">Are you Certain?</h4>
                            <p class="mt-3">This will delete this media category from your site. Are you sure you want to do this?</p>
                            <button type="button" class="btn btn-secondary my-2" data-dismiss="modal" aria-hidden="true" title="No">Cancel</button>
                            <button type="button" id="delete-media-category-btn" class="btn btn-outline my-2" data-dismiss="modal" title="Yes">Yes, I'm Sure</button><!--When they click this button it should delete the category that is checked in the table below.-->
                        </div>
                    </div>
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div>
                <!-- Warning Header Modal -->
        <div id="unpublish-mc-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="secondary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-secondary">
                            <h4 class="modal-title" id="info-header-modalLabel">Unpublish/Publish Media</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <h5 class="mt-0">Unpublish/Publish your media</h5>
                            <p>Click The Publish to show this media category on your site.</p>
                            <p>Click Unpublish and the media items in the category will not be visible on your site. The media items will not be deleted, but will not be visible online.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="unpublish-media-category-btn" class="btn btn-danger" data-dismiss="modal">Unpublish</button>
                            <button type="submit" id="publish-media-category-btn" class="btn btn-primary" data-dismiss="modal">Publish</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        
                            <!--begin buttons-->
                            <div class="row justify-content">
                            <!--end col-->
                            <div class="col-10 mt-2 text-right">
                                <div class="button-list">
                                <a href="./media" class="btn btn-outline-info" title="Manage Media">Manage Media</a>
                                <a href="./media_new_category" class="btn btn-outline-primary" title="Add New Category">Add New Category</a>
                                </div>
                            </div>
                            </div><!--end row-->
                            <!--begin Categories Table-->
            <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Categories&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Click the arrows to sort the categories. You can search categories by using the search box, and you choose how many categories to see on this page. Check the box and click delete to delete a category. Check the box and click the Edit button to Edit the Category."><i class="dripicons mdi mdi-help-circle-outline"></i></a></h4>
                        <table id="basic-datatable" class="table table-striped dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Parent Category</th>
                                    <th>Description</th>
                                    <th>Items</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $html = '';
                                    $parentCategory = '';
                                    $itemCounter = 0;
                                    foreach($data as $key => $row) {
                                        if($row->media_category_parent_id != 0) {
                                            for($i = 0; sizeof($data) > $i; $i++){
                                                $parentCategory = $data[$i]->media_category_title;
                                            }
                                        } else {
                                            $parentCategory = 'None';
                                        }
                                        $html .= '<tr data-id="'. $row->media_category_id .'" id="'.$row->media_category_id.'">';
                                        
                                        $html .= '<td style="max-width:150px"><div class="custom-control custom-radio">';
                                        $html .= '<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">';
                                        $html .= '<label class="custom-control-label" for="customRadio2">'. $row->media_category_title .'</label>';
                                        $html .= '</div><!--Dynamic Data of the Category name--><br>';
                                        $html .= '<span class="btn-group mb-1">';
                                        $html .= '<a href="#" class="btn btn-sm btn-info" title="View">View</a> ';
                                        $html .= '<!--Filters the content-media page for this category only-->';
                                        $html .= '<button type="button" class="btn btn-sm btn-danger btn-mc-delete" title="Delete" data-toggle="modal" data-target="#confirmation-alert-modal">Delete</button>';
                                        $html .= '</span>';
                                        $html .= '<span class="btn-group">';
                                        $html .= '<a href="./media_edit_category/'.$row->media_category_id.'" class="btn btn-sm btn-warning" title="Edit">Edit</a>';
                                        $html .= '<!--Dynamic to go to the Edit Page for this Category-->';
                                                if( $row->media_category_status == 1 ) {
                                                    $html .= '<button type="button" class="btn btn-sm btn-secondary btn-upblish" title="Unpublish" data-toggle="modal" data-target="#unpublish-mc-modal">Unpublish</button>';
                                                } else {
                                                    $html .= '<button type="button" class="btn btn-sm btn-success btn-upblish" title="Publish" data-toggle="modal" data-target="#unpublish-mc-modal">Publish</button>';
                                                }
                                        
                                        $html .= '</span>';
                                        $html .= '</td>';

                                        $html .= '<td><a href="'.$row->media_category_url.'" title="Category Title">'.$row->media_category_url.'</a></td><!--dynamic data of this category URL-->';
                                        $html .= '<td>'.$parentCategory.'</td><!--Dynamic data of the category parent - if none then blank insert NONE-->';
                                        $html .= '<td>'.$row->media_category_description.'</td><!--dynamic data for the category description-->';
                                        $html .= '<td>0</td><!--dynamic data for the number of posts in this category.-->';
                                        
                                        $html .= '</tr>';

                                        
                                    }

                                    echo $html;
                                ?>
                            </tbody>
                        </table>
                         <!--begin pagination--> <!--Only show Pagination if this list is longer than 5 items-->
                    <div class="row">
                        <div class="col">
                            <?php echo $this->pagination->create_links(); ?>
                        </div><!--end col-->
                    </div><!--end pagination row-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div><!--end container-->