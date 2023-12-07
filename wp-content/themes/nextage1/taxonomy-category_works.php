<?php get_header() ?>
<main>
	<div class="section hero">
		<figure class="fluid">
			<picture>
				<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/bg_works1_sp.jpg"
				        media="(max-width: 750px)">
				<img src="<?php echo get_bloginfo('template_directory') ?>/images/bg_works1_pc.jpg" alt="">
			</picture>
		</figure>
		<div class="container">
			<figure class="figure">
				<picture>
					<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/ttl_works_sp.png"
					        media="(max-width: 750px)">
					<img src="<?php echo get_bloginfo('template_directory') ?>/images/ttl_works_pc.png" alt="WORKS">
				</picture>
			</figure>
		</div>
	</div>
	<div class="container">
		<div class="section">
			<ul class="list-cat list-cat--center">
				<li><a <?php echo is_post_type_archive('works') ? 'class="active"' : ''; ?> href="/works">ALL</a></li>
				<?php
				$categories = get_terms(array('taxonomy' => 'category_works', 'hide_empty' => false));
				foreach ($categories as $category) {
					$category_link = get_term_link($category);
					echo '<li><a ' . (is_tax('category_works', $category->term_id) ? 'class="active"' : '') . '   href="' . esc_url($category_link) . '">' . $category->name . '</a></li>';
				}
				?>
			</ul>
			<?php
			$post_id = get_the_ID();
			$terms = get_the_terms($post_id, 'category_works');
			$current_term_id = $terms[0]->term_id;
			$args = array(
				'post_type' => 'works', // You can add a custom post type if you like
				'paged' => $paged,
				'posts_per_page' => 6, // limit of posts
				'tax_query' => array(
					array(
						'taxonomy' => 'category_works',
						'field' => 'id',
						'terms' => $current_term_id,
					),
				),
			);
			query_posts($args);
			?>
			<ul class="list-works">
			<?php if (have_posts()) : while (have_posts()):the_post() ?>

					<li class="item">
						<div class="item__img">
							<a href="<?php the_permalink() ?>">
								<?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail() ?>
								<?php else: ?>
									<img src="<?php bloginfo('template_url') ?>/images/default-no-img.jpg"
									     alt="<?php the_title() ?>">
								<?php endif; ?>
							</a>
						</div>
						<div class="item__cnt">
							<div class="ttl"><?php the_title() ?></div>
							<?php $terms = get_the_terms(get_the_ID(), 'category_works');
							if ($terms && !is_wp_error($terms)) {
								foreach ($terms as $term) {
									$term_name = $term->name;
									$term_slug = $term->slug;
									$term_link = get_term_link($term);
								}
							}
							?>
							<ul class="works_info">
								<li><span>カテゴリ</span><a href="<?php echo $term_link ?>"><?php echo $term_name ?></a></li>
								<?php if(get_field('place')):?>
									<li><span>場所</span><?php echo get_field('place')?></li>
								<?php endif;?>

								<?php if(get_field('period')):?>
									<li><span>時期</span><?php echo get_field('period')?></li>
								<?php endif;?>

							</ul>
							<div class="cnt">
								<?php the_excerpt() ?>
							</div>
							<div class="center">
								<a href="<?php the_permalink()?>" class="btn-comp01 btn-comp01--sm">この施工実績の詳細を見る</a>
							</div>
						</div>
					</li>


			<?php endwhile;endif; ?>
			</ul>
			<?php wpbeginner_numeric_posts_nav() ?>
		</div>
	</div>
</main>
<?php get_footer() ?>


