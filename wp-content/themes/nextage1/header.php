<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--	<meta name="robots" content="index, follow, archive">-->
	<meta name="twitter:title">
	<meta name="twitter:description" content="">
	<meta name="twitter:card" content="summary_large_image">
	<meta property="og:url" content="<?php echo get_bloginfo('url')?>">
	<meta property="og:title">
	<meta property="og:description" content="">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="ja_JP">
	<meta property="og:site_name" content="株式会社NEXTAGE">
	<meta name="twitter:image" content="<?php echo get_bloginfo('template_directory')?>/images/ogp_pc.jpg">
	<meta property="og:image" content="<?php echo get_bloginfo('template_directory')?>/images/ogp_pc.jpg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:image:secure_url" content="http://nextage1.co.jp/images/ogp_pc.jpg">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700&amp;subset=japanese" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/lightbox.min.css">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/style.css">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/custome.css?v1">
	<?php wp_head(); ?>
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v18.0&appId=1566928927110743" nonce="naVUEEPI"></script>
<body class="<?php if (is_home() || is_front_page()) { echo 'index'; } ?>">

<header class="header">
	<div class="container">
		<h1 class="title"><a href="/"><img src="<?php echo get_bloginfo('template_directory')?>/images/header_logo_pc.png" alt="NEXTAGE - 未来を繋ぐ、未来に繋ぐ - "></a></h1>
		<nav class="nav gNav">
			<button type="button" id="gNavSwitch">
				<div></div>
			</button>
			<ul class="gNav-list">
				<li class="gNav-item"><a href="/">TOP</a></li>
				<li class="gNav-item"><a href="/solution">SOLUTION</a></li>
				<li class="gNav-item"><a href="/design_architect">DESIGN&amp;ARCHITECT</a></li>
				<!--<li class="gNav-item"><a href="/construction">CONSTRUCTION</a></li>-->
				<li class="gNav-item"><a href="/works">WORKS</a></li>
				<li class="gNav-item"><a href="/company">COMPANY</a></li>
				<li class="gNav-item"><a href="/recruit">RECRUIT</a></li>
				<li class="gNav-item"><a href="/contact">CONTACT</a></li>
			</ul>
		</nav>
	</div>
</header>