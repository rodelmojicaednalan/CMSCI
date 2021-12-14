<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('clients/templates/default/footer'); ?>

  <body>
    <?php if(!empty($content)) echo $content; ?>

    <?php $this->load->view('clients/templates/default/footer'); ?>
    <?php $this->load->view('clients/templates/default/assets_js'); ?>
  </body>
</html>
