<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('admin/main/head'); ?>

    <body class="sidebar-enable" data-keep-enlarged="true">

        <!-- Begin page -->
        <div class="wrapper">

            <?php $this->load->view('admin/main/left_sidebar'); ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <?php
                $data = array();
                $data['main_content'] = $main_content;
                $this->load->view('admin/main/main_content', $data);
                ?>

                <?php $this->load->view('admin/main/footer'); ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <?php $this->load->view('admin/main/right_sidebar'); ?>

        <?php $this->load->view('admin/main/assets_js'); ?>
        <!-- /Right-bar -->

    </body>

</html>
