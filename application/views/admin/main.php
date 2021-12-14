<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('admin/head'); ?>

  <body class="authentication-bg">
    <?php if(!empty($main_content)) echo $main_content; ?>

    <?php $this->load->view('admin/footer'); ?>

    <?php $this->load->view('admin/assets_js'); ?>
  </body>
</html>
