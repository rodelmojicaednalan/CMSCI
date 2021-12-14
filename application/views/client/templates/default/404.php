<?php $CI =& get_instance(); ?>

<!DOCTYPE html>
<html lang="en">
	<?=$CI->load->view(getTemplate('head'), array(), true)?>
  <body>
		<?=$CI->load->view(getTemplate('header'), array(), true)?>
    <main role="main">
			<section>
					<section class="hero hero-with-header">
						<div class="container">Page not found.</div></section>
			</section>
    </main>

		<?=$CI->load->view(getTemplate('footer'), array(), true)?>
  </body>
</html>
