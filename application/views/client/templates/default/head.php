<head>
	<meta charset="utf-8" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1, shrink-to-fit=no"
	/>
	<meta name=”robots” content=”noindex, nofollow”>
	<meta name="description" content="<?=$page_obj->page_meta_description?>" />
	<meta name="author" content="" />
	<meta name="generator" content="" />
	<meta name="title" content="<?=$page_obj->page_title?>" />
	<meta name="keywords" content="<?=$page_obj->page_keywords?>" />
	<title><?=$page_obj->page_title?></title>
	<link rel="canonical" href="" />
	<!--Bootstrap basic css LINK-->

	<link rel="shortcut icon" href="/assets/images/favicon.ico" />

	<link
		rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
		crossorigin="anonymous"
	/>
	<!--Put Custon Stylesheets after this line-->
	<link
		rel="stylesheet"
		href="<?=$assets_dir?>assets/css/style.default.css?v=<?=ASSETS_VERSION?>"
		id="theme-stylesheet"
	/>
	<!-- css -->
	<link rel="stylesheet" href="<?=$assets_dir?>assets/css/vendor.css?v=<?=ASSETS_VERSION?>" />
	<link rel="stylesheet" href="<?=$assets_dir?>assets/css/custom.css?v=<?=ASSETS_VERSION?>" />
	<link rel="stylesheet" href="<?=$assets_dir?>assets/css/style.css?v=<?=ASSETS_VERSION?>" />
	<!--Font Awesome CSS LINK-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!--
	<link
		rel="stylesheet"
		href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
		integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
		crossorigin="anonymous"
	/>
	-->
	<script
		src="https://code.jquery.com/jquery-2.2.4.min.js"
		integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
		crossorigin="anonymous"
	></script>

<link href="/vendor/needim/noty/lib/noty.css" rel="stylesheet" type="text/css" />

<?php
if(isset($this->session->userdata['logged_in']) && ( !isset($_GET['page_id']) && !isset($_GET['event_id']) ) ){
		print '<link rel="stylesheet" href="/assets/css/loggedin.css?v='.ASSETS_VERSION.'">';
}
?>

	<!-- Include all Editor plugins CSS style. -->
<link rel="stylesheet" href="/assets/js/froala_editor_2.9.3/css/froala_editor.pkgd.min.css">
<link rel="stylesheet" href="/assets/css/vendor/froala_style.min.css" type="text/css">
<link rel="stylesheet" href="/assets/css/vendor/lightbox.min.css">

	<!-- jssocial css -->
	<!-- jssocial css -->
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css" />
</head>
