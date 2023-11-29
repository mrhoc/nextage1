<?php get_header()?>
<main>
	<div id="ctl00_divAlt1" class="altcontent1 cmszone">
		<section class="banner-sub">
			<div class='Module Module-221'>
				<div class='ModuleContent'>
					<div uk-slider="" class=" banner-wrapper">
						<ul class="uk-slider-items uk-child-width-1-1">
							<li>
								<img src="<?php bloginfo('template_directory'); ?>/Data/Sites/1/Banner/1.jpg" alt="">
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="breadcrumb-wrapper uk-position-center uk-width-1-1">
				<div class="uk-container">
					<div class='Module Module-222'>
						<div class='ModuleContent'>
							<div class="zone-title">
								<h1>Tin tức</h1>
							</div>
						</div>
					</div>
					<div class='Module Module-223'>
						<ol class='breadcrumb' >

							<li ><a
										href='/' class='itemcrumb' itemprop='item'
										itemtype='http://schema.org/Thing'><span
											itemprop='name'>Trang chủ</span></a>
								<meta itemprop='position' content='0'>
							</li>

							<li ><a href='/tin-tuc/' class='itemcrumb'
										itemprop='item' itemtype='http://schema.org/Thing'><span
											itemprop='name'>Tin tức</span></a>
								<meta itemprop='position' content='1'>
							</li>
							<?php
							$categories = get_the_category();
							$current_category = $categories[0];
							?>
							<li><a href="<?php echo get_category_link($current_category)?>" class='itemcrumb active'><span ><?php echo $current_category->name;?></span></a>

							</li>


						</ol>
					</div>
				</div>
			</div>
		</section>

	</div>

	<div id="ctl00_divCenter" class="middle-fullwidth">


		<div class='Module Module-226'>
			<div class='ModuleContent'>
				<div id="ctl00_mainContent_ctl00_ctl00_pnlInnerWrap">


					<div class="news-detail uk-section">
						<div class="uk-container">
							<div class="uk-grid" uk-grid="">
								<div class="wrapper uk-width-2-3@l">
									<div class="news-detail-content">
										<div class="news-detail-heading">
											<div class="date">
												<span class="day"><?php echo get_the_date('d'); ?></span>
												<span class="month"><?php echo get_the_date('m-Y'); ?></span>
											</div>
											<div class="title">
												<h2><?php the_title()?></h2>
											</div>
										</div>
										<hr>

										<div class="fullcontent">
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
												<?php the_content()?>
											<?php endwhile;endif;?>
										</div>
										<div class="share">
											<strong>Chia sẻ</strong>
											<a href="#" onclick="window.open('https://facebook.com/share.php?u=<?php echo home_url($_SERVER['REQUEST_URI'])?>', '_blank', 'top=150,left=400,width=450,height=550')" data-toggle="tooltip" data-placement="top"
											   title="<?php the_title()?>"><span class="fab fa-facebook-f"></span></a>
											<a href="#" class="share-twitter" onclick="window.open('https://twitter.com/intent/tweet?url=<?php echo home_url($_SERVER['REQUEST_URI'])?>', '_blank', 'top=150,left=400,width=550,height=350')"
											   data-toggle="tooltip" data-placement="top"
											   title="<?php the_title()?>"><span class="fab fa-twitter"></span></a>
										</div>
										<div class="tags">
											<strong>Tag</strong>
											<ul>
												<?php
												$post_tags = get_the_tags();

												if ($post_tags) {
													foreach ($post_tags as $tag) {
														echo '<li><a href="' . esc_url(get_tag_link($tag)) . '">' . esc_html($tag->name) . '</a></li>';
													}
												}
												?>
											</ul>
										</div>

									</div>
								</div>
								<div class="wrapper uk-width-1-3@l" id="newsSideNav">
								</div>
							</div>
							<div class="news-other">
								<?php 	$terms = get_the_terms(get_the_ID(), 'category'); ?>
								<?php if ($terms && !is_wp_error($terms)) {?>
								<div class="section-title uk-text-center">
									<h2>Tin tức liên quan</h2>
								</div>
								<div class="news-list">

										<div class="uk-grid uk-grid-match uk-child-width-1-3@l uk-child-width-1-2@s"
										    uk-grid="">
											<?php
											$term_ids = array();
											foreach ($terms as $term) {
												$term_ids[] = $term->term_id;
											}

											$args = array(
												'post_type' => 'post',
												'posts_per_page' => 12,
												'tax_query' => array(
													array(
														'taxonomy' => 'category',
														'field' => 'term_id',
														'terms' => $term_ids,
														'operator' => 'IN',
													),
												),
												'orderby'        => 'modified',
												'order'          => 'DESC',
												'suppress_filters' => false,
												'post__not_in' => array(get_the_ID()),
											);

											$related_posts = get_posts($args);?>

											<?php
											if ($related_posts) {?>
												<?php
												foreach ($related_posts as $post) { setup_postdata($post);?>
													<div class="wrapper">
														<div class="news-item small">
															<div class="img">
																<a href="<?php the_permalink()?>"
																   title="<?php the_title()?>">
																	<?php if (has_post_thumbnail()): ?>
																		<?php the_post_thumbnail() ?>
																	<?php else: ?>
																		<img src="<?php bloginfo('template_url') ?>/images/default-no-img.jpg"
																		     alt="">
																	<?php endif; ?>
																</a>
															</div>
															<div class="content-wrapper">
																<div class="date">
																	<span class="day"><?php echo get_the_date('d'); ?></span>
																	<span class="month"><?php echo get_the_date('m-Y'); ?></span>
																</div>
																<div class="content">
																	<p class="title">
																		<a href="<?php the_permalink()?>"
																		   title="<?php the_title()?>"><?php the_title()?></a></p>
																</div>
															</div>
														</div>
													</div>
												<?php } wp_reset_postdata();?>

											<?php }?>
										</div>


								</div>
								<a href="<?php echo get_category_link(get_the_category()[0]);?>"
								   class="btn-border-blue" style="margin: 30px auto 0; max-width: 130px;">Xem
									thêm</a>
								<?php }?>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>

	</div>

	<div id="ctl00_divAltContent2" class="altcontent2 cmszone">

		<div class="news-sidenav news-sidenav-detail">
			<div class="news-sidenav-item">
				<div class='Module Module-228'>
					<div class='ModuleContent'>
						<div class="news-zonenav">
							<div class="sidenav-title">
								<h3>Danh mục</h3>
							</div>
							<ul>
								<?php
								$taxonomy = 'category'; // Replace with the actual taxonomy name
								$terms = get_terms(array(
									'taxonomy' => $taxonomy,
									'hide_empty' => false,
								));

								if (!empty($terms) && !is_wp_error($terms)) {
									foreach ($terms as $term) {
										$term_name = $term->name;
										$term_link = get_term_link($term);

										echo '<li><a href="' . esc_url($term_link) . '">' . esc_html($term_name) . '</a></li>';
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="news-sidenav-item news-latest">
				<div class='Module Module-229'>
					<div class='ModuleContent'>
						<div class="news-latest-title">
							<h3>Tin mới nhất</h3>
						</div>
						<div class="latest-news-list">
							<div class="uk-grid uk-child-width-1-1" uk-grid="">
								<?php
								$args = array(
									'post_type' => 'post', // You can add a custom post type if you like
									'posts_per_page' => 3, // limit of posts,
								);
								$primary_query = new WP_Query($args);
								wp_reset_query();
								query_posts($args);
								?>
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<div class="wrapper">
										<a class="side-news"
										   href="<?php the_permalink()?>"
										   title="<?php the_title()?>">
											<div class="date">
												<span class="day"><?php echo get_the_date('d'); ?></span>
												<span class="month"><?php echo get_the_date('m-Y'); ?></span>
											</div>
											<div class="title">
												<p><?php the_title()?></p>
											</div>
										</a>
									</div>
								<?php endwhile;endif;?>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	</div>
</main>
<?php get_footer()?>
