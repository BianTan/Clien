<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<title>
		<?php if ( is_home() ) { ?><?php bloginfo('name') ?> | <?php bloginfo('description'); ?><?php } ?>
		<?php if ( is_search() ) { ?>Search Results | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_author() ) { ?>Author Archives | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_single() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_page() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_category() ) { ?><?php single_cat_title(); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_month() ) { ?><?php the_time('F'); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?> | Tag Archive | <?php single_tag_title("", true); } } ?>
	</title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pjax.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/comments-ajax.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/SmoothScroll.js"></script>
</head>
<body>
	<div class="header">
		<div class="wid">
			<div class="logo"><?php bloginfo('name'); ?></div>
			<div class="menu">
				<ul>
					<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="#"><i class="fa fa-street-view"></i> About</a></li>
					<li><a href="#"><i class="fa fa-child"></i> Friends</a></li>
					<li><a href="#"><i class="fa fa-code"></i> Projects</a></li>
					<li><a href="#"><i class="fa fa-comments"></i> Guestbook</a></li>
				</ul>
			</div>
		</div>
	</div>
<div id="main">