<?php get_header() ?>
	<main class="page-news section">
		<div class="container">
			<h1 class="ttl-comp02 let-8">NEWS</h1>
			<div class="page-wrap ">
				<div class="page-left">

					<div class="single-detail">
						<div class="item__info">
							<div class="item__date"><?php the_time('Y/m/d')?></div>
							<?php
							$categories = get_the_category();
							foreach ($categories as $category) {
								$color = get_term_meta($category->term_id, 'cc_color', true);
								$color=get_term_meta($category->term_id, 'cc_color', true);
								$category_link = get_category_link($category->term_id);
								$category_id=$category->term_id;
								echo '<a style="background:'.$color.'" class="item__cat item__cat--'.$category_id.'" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a> ';
							}
							?>
						</div>
						<div class="ttl"><?php the_title()?></div>
						<div class="img">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php the_content()?>
					</div>

						<?php
						$categories = get_the_category();
						if ($categories) {
							$category_ids = array_map(function ($category) {
								return $category->term_id;
							}, $categories);
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => 6,
								'category__in' => $category_ids,
								'post__not_in' => array(get_the_ID()),
							);
							query_posts($args);
							if (have_posts()) :?>
					<h2 class="ttl-comp02">最新のNEWS</h2>
					<ul class="list-news">
							<?php	while (have_posts()) :the_post(); ?>
									<li class="item item--50">
										<div class="item__inner">
											<div class="item__img">
												<a href="<?php the_permalink(); ?>">
													<?php if (has_post_thumbnail()): ?>
														<?php the_post_thumbnail(); ?>
													<?php else: ?>
														<img src="<?php bloginfo('template_url'); ?>/images/default-no-img.jpg"
														     alt="<?php the_title(); ?>">
													<?php endif; ?>
												</a>
											</div>
											<div class="item__cnt">
												<div class="item__info">
													<div class="item__date"><?php the_time('Y/m/d'); ?></div>
													<?php
													$categories = get_the_category();
													foreach ($categories as $category) {
														$color = get_term_meta($category->term_id, 'cc_color', true);
														$category_link = get_category_link($category->term_id);
														$category_id = $category->term_id;
														echo '<a style="background:' . $color . '" class="item__cat item__cat--' . $category_id . '" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a> ';
													}
													?>
												</div>
												<div class="ttl"><a
															href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</div>
												<div class="cnt">
													<?php the_excerpt(); ?>
												</div>
											</div>
										</div>
									</li>
								<?php endwhile;endif;wp_reset_query();
						}
						?>
					</ul>
					<?php wpbeginner_numeric_posts_nav() ?>
				</div>
				<div class="page-right">
					<ul class="service-list service-list--custome">
						<li class="service-item solution"><a href="/solution">
								<picture>
									<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/img_service_solution_sp.jpg"
									        media="(max-width: 750px)">
									<img src="<?php echo get_bloginfo('template_directory') ?>/images/img_service_solution_pc.jpg"
									     alt="SOLUTION - 建築ソリューション">
								</picture>
							</a></li>
						<li class="service-item design"><a href="/design_architect">
								<picture>
									<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/img_service_design_sp.jpg"
									        media="(max-width: 750px)">
									<img src="<?php echo get_bloginfo('template_directory') ?>/images/img_service_design_pc.jpg"
									     alt="DESIGN&amp;ARCHITECT - 内装工事、設計、デザイン">
								</picture>
							</a></li>
						<li class="service-item works"><a href="/works">
								<picture>
									<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/img_service_works_sp.jpg"
									        media="(max-width: 750px)">
									<img src="<?php echo get_bloginfo('template_directory') ?>/images/img_service_works_pc.jpg"
									     alt="WORKS - 施工実績">
								</picture>
							</a></li>
						<li class="service-item company"><a href="/company">
								<picture>
									<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/img_service_company_sp.jpg"
									        media="(max-width: 750px)">
									<img src="<?php echo get_bloginfo('template_directory') ?>/images/img_service_company_pc.jpg"
									     alt="COMPANY - 会社概要">
								</picture>
							</a></li>
						<li class="service-item recruit"><a href="/recruit">
								<picture>
									<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/img_service_recruit_sp.jpg"
									        media="(max-width: 750px)">
									<img src="<?php echo get_bloginfo('template_directory') ?>/images/img_service_recruit_pc.jpg"
									     alt="RECRUIT - 採用情報">
								</picture>
							</a></li>
					</ul>
				</div>
			</div>
		</div>

	</main>
<?php get_footer(); ?>