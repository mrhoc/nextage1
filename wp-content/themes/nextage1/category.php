<?php get_header(); ?>
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

							<li href='/' class='itemcrumb' itemprop='item'
							    itemtype='http://schema.org/Thing'><span itemprop='name'>Trang chủ</span></a>
								<meta itemprop='position' content='0'>
							</li>
							<?php $current_term = get_queried_object(); ?>
							<li href='#' class='itemcrumb active' itemprop='item'
							    itemtype='http://schema.org/Thing'><span itemprop='name'><?php echo $current_term->name?></span></a>
								<meta itemprop='position' content='1'>
							</li>


						</ol>
					</div>
				</div>
			</div>
		</section>

	</div>
	<div id="ctl00_divCenter" class="middle-fullwidth">

		<div class="news-subnav">
			<div class="uk-container">
				<div class='Module Module-225'>
					<div class='ModuleContent'><a class="toggle-subnav hidden-desktop" href="#"
					                              uk-toggle="target: .subnav; animation: uk-animation-fade, uk-animation-fade"><span>Danh mục</span><em
									class="mdi mdi-chevron-down"></em></a>
						<div class="subnav" aria-hidden="false" hidden="">
							<ul>
								<li class="active"><a href="https://www.ttcenergy.vn/tin-tuc" title="">Tất cả</a></li>
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
		</div>
		<div class='Module Module-226'>
			<div class='ModuleContent'>
				<section class="news-section uk-section uk-padding-remove-top">
					<div class="uk-container">
						<div class="news-list">
							<div class="uk-grid uk-grid-match" uk-grid="">
								<?php
								global $paged;
								$curpage = $paged ? $paged : 1;
								$posts_per_page = 5;

								$current_term = get_queried_object();
								$args = array(
									'post_type' => 'post', // Thay 'post' bằng tên của custom post type nếu cần thiết
									'posts_per_page' => $posts_per_page,
									'paged' => $curpage,
									'orderby'        => 'modified',
									'order' => 'DESC',
									'tax_query' => array(
										array(
											'taxonomy' => $current_term->taxonomy,
											'field' => 'term_id',
											'terms' => $current_term->term_id,
										),
									),
								);
								wp_reset_query();
								query_posts($args);
								?>
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<div class="wrapper uk-width-1-3@l uk-width-1-2@s">
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
								<?php endwhile;wp_reset_postdata();endif; ?>

							</div>
						</div>
					</div>
				</section>
				<div id="ctl00_mainContent_ctl01_ctl00_divPager" class="pages newspager">
					<div class='modulepager'>
						<?php custom_post_type_pagination()?>
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

		</div>
	</div>
	</div>
	</div>
</main>
<?php get_footer(); ?>


