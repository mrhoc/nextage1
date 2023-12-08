<?php get_header() ?>
	<main class="page-news">
		<div class="section">
			<div class="container">
				<h1 class="ttl-comp02 let-8">NEWS</h1>
				<ul class="list-cat">
					<li><a <?php echo is_page('news') ? 'class="active"' : ''; ?> href="/news">ALL</a></li>
					<?php
					$categories = get_categories();
					foreach ($categories as $category) {
						$category_link = get_category_link($category->term_id);
						echo '<li><a ' . (is_category($category->term_id) ? 'class="active"' : '') . '   href="'. esc_url($category_link) .'">'.$category->name.'</a></li>';
					}
					?>
				</ul>
				<ul class="list-news">
					<?php
					$args=array(
						'post_type' => 'post', // You can add a custom post type if you like
						'paged' => $paged,
						'posts_per_page' => 9, // limit of posts
					);
					query_posts($args);
					?>
					<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
						<li class="item">
							<div class="item__inner">
								<div class="item__img">
									<a href="<?php the_permalink()?>">
										<?php if (has_post_thumbnail()): ?>
											<?php the_post_thumbnail() ?>
										<?php else: ?>
											<img src="<?php bloginfo('template_url') ?>/images/default-no-img.jpg"
											     alt="<?php the_title()?>">
										<?php endif; ?>
									</a>
								</div>
								<div class="item__cnt">
									<div class="item__info">
										<div class="item__date"><?php the_time('Y/m/d')?></div>
										<?php

										$categories = get_the_category();
										foreach ($categories as $category) {
											$color=get_term_meta($category->term_id, 'cc_color', true);
											$category_link = get_category_link($category->term_id);
											$category_id=$category->term_id;
											echo '<a style="background:'.$color.'" class="item__cat item__cat--'.$category_id.'" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a> ';
										}

										?>

									</div>
									<div class="ttl"><a href="<?php the_permalink()?>"><?php the_title()?></a></div>
									<div class="cnt">
										<?php  the_excerpt(); ?>

									</div>

								</div>
							</div>
						</li>
					<?php
					endwhile;
					else :

					endif;
					?>
				</ul>
				<?php wpbeginner_numeric_posts_nav()?>
			</div>
		</div>
	</main>
<?php get_footer() ?>