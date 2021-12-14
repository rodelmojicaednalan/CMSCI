<!-- header -->
<header class="header-sticky header-light" style="opacity:0.9; background: #ffffff;">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="/">
				<img
					class="navbar-logo"
					src="/assets/images/demo-logo.gif"
					alt="Logo"
				/>
				<img
					class="navbar-logo navbar-logo-dark"
					src="/assets/images/demo-logo.gif"
					alt="Logo"
				/>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<?php
						if (isset($nav_obj) && is_array($nav_obj)) {
							foreach ($nav_obj as $nav) {
								if($nav->navigation_menu_parent_id == 0) {
									$url_value = '#';
									if (isset($nav->custom_url) && trim($nav->custom_url) != '') {
										$url_value = $nav->custom_url;
									} else {
										$url_value = '/'.($nav->url_alias_value == '/' ? '' : $nav->url_alias_value);
									}
									$child = [];
									for ($i = 0;$i < sizeof($nav_obj); $i++) {
										if ($nav->navigation_menu_id == $nav_obj[$i]->navigation_menu_parent_id && $nav->navigation_menu_parent_id == 0)
											$child[$i] = $nav_obj[$i];
									}?>
									<li class="nav-item <?php echo(!empty($child) ? 'dropdown' : '') ?>">
										<a <?=$nav->navigation_menu_open_to_new_tab == 1 ? 'target="_blank"' : ''?>  <?php echo(!empty($child) ? 'class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : 'class="nav-link"') ?>  href="<?=$url_value?>"><?=trim($nav->navigation_menu_modified_label) == '' ? $nav->navigation_menu_default_label : $nav->navigation_menu_modified_label ?></a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a <?=$nav->navigation_menu_open_to_new_tab == 1 ? 'target="_blank"' : ''?> class="dropdown-item" href="<?=$url_value?>"><?=trim($nav->navigation_menu_modified_label) == '' ? $nav->navigation_menu_default_label : $nav->navigation_menu_modified_label ?></a>
										<?php if (!empty($child)): ?>
											<?php foreach ($child as $childnav){
												$url_value = '#';
												if (isset($childnav->custom_url) && trim($childnav->custom_url) != '') {
													$url_value = $childnav->custom_url;
												} else {
													$url_value = '/'.($childnav->url_alias_value == '/' ? '' : $childnav->url_alias_value);
												}?>
												<a <?=$childnav->navigation_menu_open_to_new_tab == 1 ? 'target="_blank"' : ''?> class="dropdown-item" href="<?=$url_value?>"><?=trim($childnav->navigation_menu_modified_label) == '' ? $childnav->navigation_menu_default_label : $childnav->navigation_menu_modified_label ?></a>
										<?php } ?>
										<?php endif ?>
										</div>
									</li> <?php
								}
							}

						}
					?>

					<!--
					<li class="nav-item">
						<a class="nav-link active" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="/blog">Insights</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="/media">Education</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="/documents">Research & Trends</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="/event/test">Institutes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="/image-gallery">Image Gallery</a>
					</li>
					-->
				</ul>

				<ul class="list-unstyled topbar-right-menu float-right mb-0">
					<li class="dropdown notification-list">
							<?php if(!isset($this->session->userdata['logged_in'])){ ?>
										<a class="nav-link nav-user mr-0" data-toggle="dropdown" href="/login" role="button" aria-haspopup="false"
												aria-expanded="false">
												<!--ADMIN USER NAME HERE-->
												<span>
														<span onclick="window.location='/login'" class="account-position">Login</span>
												</span>
										</a>
							<?php }else{ ?>
										<a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
												aria-expanded="false">
												<!--ADMIN USER NAME HERE-->
												<span>
														<span class="account-user-name"><?=isset($this->session->userdata['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_firstname. ' '.$this->session->userdata['logged_in']['user_obj']->user_lastname : ''?></span>
														<!--ADMIN USER TITLE - IF POSSIBLE-->
														<span class="account-position"></span>
												</span>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
												<!-- item-->
												<div class=" dropdown-header noti-title">
														<h6 class="text-overflow m-0">Welcome <?=isset($this->session->userdata['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_firstname : ''?>!</h6>
												</div>

												<!-- item-->
												<a href="/member-profile/<?=$this->session->userdata['logged_in']['user_obj']->user_id?>" class="dropdown-item notify-item">
														<i class="mdi mdi-account-circle"></i>
														<span>Public Profile</span>
												</a>

												<!-- item-->
												<a href="/edit-profile" class="dropdown-item notify-item">
														<i class="mdi mdi-account-settings-variant"></i>
														<span>Edit Profile</span>
												</a>

												<!-- item-->
												<a href="/messages" class="dropdown-item notify-item">
														<i class="mdi mdi-lifebuoy"></i>
														<span>Messages</span>
												</a>

												<!-- item-->
												<a href="/member/logout" class="dropdown-item notify-item">
														<i class="mdi mdi-logout"></i>
														<span>Logout</span>
												</a>

										</div>
							<?php } ?>


					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<!-- header -->
