
<div class="section contact bg_primary">
	<div class="container center"><a class="btn" href="/contact">
			<picture>
				<source srcset="<?php echo get_bloginfo('template_directory')?>/images/cmn_contact_sp.png" media="(max-width: 750px)">
				<img src="<?php echo get_bloginfo('template_directory')?>/images/cmn_contact_pc.png" alt="CONTACT">
			</picture>
		</a></div>
</div>
<div class="sec-social">
	<div class="container">
		<div class="list-social">
			<div class="fb">
<!--				<a href="https://facebook.com" target="_blank"><img src="--><?php //echo get_bloginfo('template_directory')?><!--/images/bnr_facebook.jpg" alt=""></a>-->
				<div class="fb-page"
				     data-href="https://www.facebook.com/facebook"
				     data-width="500"
				     data-hide-cover="false"
				     data-show-facepile="false"></div>
			</div>
			<div class="insta">
				<a href="https://www.instagram.com/nextage1.inc/" target="_blank"><img src="<?php echo get_bloginfo('template_directory')?>/images/bnr_instagram.jpg" alt=""></a>
			</div>
		</div>
	</div>
</div>
<footer class="footer">
	<div class="container">
		<figure><img src="<?php echo get_bloginfo('template_directory')?>/images/footer_logo_pc.png" alt=""></figure>
		<p class="copyright">Copyright&copy; NEXTAGE .Co.Ltd All Rights Reserved.</p>
	</div>
</footer>
<script src="<?php echo get_bloginfo('template_directory')?>/js/jquery-1.12.4.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory')?>/js/lightbox.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory')?>/js/jquery.matchHeight.js"></script>
<script src="<?php echo get_bloginfo('template_directory')?>/js/functions.js"></script>
</body>
<?php wp_head(); ?>
</html>