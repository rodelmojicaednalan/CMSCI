<footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
  <div class="container">
    <div class="row row-30">
      <div class="col-md-4 col-xl-3">
        <h5><?php echo (isset($data) && isset($data->copyrightinfo) && $data->copyrightinfo !== '') ? $data->copyrightinfo : ''; ?></h5>
          <p><?php echo (isset($data) && isset($data->leftFooterText) && $data->leftFooterText !== '') ? $data->leftFooterText : ''; ?></p>
      </div>
      <div class="col-md-3">
        <h5>About Us</h5>
        <ul class="nav-list">
            <a href="<?php echo (isset($data) && isset($data->privacy) && $data->privacy !== '') ? $data->privacy : ''; ?>">Privacy Policy</a>
        </ul>
        <ul>
            <a href="<?php echo (isset($data) && isset($data->terms) && $data->terms !== '') ? $data->terms : ''; ?>">Terms of Service</a>
        </ul>
        <ul>
            <a href="<?php echo (isset($data) && isset($data->contacus) && $data->contacus !== '') ? $data->contacus : ''; ?>">Contact Us</a>
        </ul>
        <ul>
            <a href="<?php echo (isset($data) && isset($data->customlink2) && $data->customlink2 !== '') ? $data->contacus : ''; ?>">Custom Link</a>
        </ul>
        <ul>
            <a href="<?php echo (isset($data) && isset($data->customlink4) && $data->customlink4 !== '') ? $data->customlink2 : ''; ?>">Custom Link</a>
        </ul>
      </div>
      <div class="col-md-4 col-xl-3">
        <h5>Social Media Links</h5>
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <ul class="nav-list">
                <li><a href="<?php echo (isset($data) && isset($data->facebook) && $data->facebook !== '') ? $data->facebook : ''; ?>"><span class="icon mdi mdi-facebook"></span></a></li>
                <li><a href="<?php echo (isset($data) && isset($data->twitter) && $data->twitter !== '') ? $data->twitter : ''; ?>"><span class="icon mdi mdi-twitter"></span></a></li>
                <li><a href="<?php echo (isset($data) && isset($data->instagram) && $data->instagram !== '') ? $data->instagram : ''; ?>"><span class="icon mdi mdi-instagram"></span></a></li>
                <li><a href="<?php echo (isset($data) && isset($data->pinterest) && $data->pinterest !== '') ? $data->pinterest : ''; ?>"><span class="icon mdi mdi-pinterest"></span></a></li>
              </ul>
            </div>
            <div class="col-6">
              <ul class="nav-list">
                <li><a href="<?php echo (isset($data) && isset($data->linkedin) && $data->linkedin !== '') ? $data->linkedin : ''; ?>"><span class="icon mdi mdi-linkedin"></span></a></li>
                <li><a href="<?php echo (isset($data) && isset($data->youtube) && $data->youtube !== '') ? $data->youtube : ''; ?>"><span class="icon mdi mdi-youtube"></span></a></li>
                <li><a href="<?php echo (isset($data) && isset($data->medium) && $data->medium !== '') ? $data->medium : ''; ?>"><span class="icon mdi mdi-medium"></span></a></li>
                <li><a href="<?php echo (isset($data) && isset($data->rss) && $data->rss !== '') ? $data->rss : ''; ?>"><span class="icon mdi mdi-rss"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>