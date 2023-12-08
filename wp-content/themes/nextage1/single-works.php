<?php get_header() ?>
	<main class="page-news section">
		<div class="container">
			<h1 class="ttl-comp02 let-8">WORKS</h1>
			<div class="work-detail">
				<div class="works-cnt">
					<div class="img">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="works-inner">
						<div class="list-works">
							<div class="item">
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
										<li><span>カテゴリ</span><a
													href="<?php echo $term_link ?>"><?php echo $term_name ?></a></li>
										<?php if (get_field('place')): ?>
											<li><span>場所</span><?php echo get_field('place') ?></li>
										<?php endif; ?>

										<?php if (get_field('period')): ?>
											<li><span>時期</span><?php echo get_field('period') ?></li>
										<?php endif; ?>

									</ul>
								</div>
							</div>
						</div>
						<?php the_content() ?>
						<?php
						$post_id = get_the_ID();
						$field_group_name = 'List_images';
						$list_images = get_field('List_images', $post_id);
						if (is_array($list_images) && !empty($list_images)) {
							echo '<ul class="list-works-img">';
							foreach ($list_images as $image) {
								if (is_array($image) && isset($image['url'])) {
									echo '<li><a  href="' . esc_url($image['url']) . '" data-lightbox="Works"><img  src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '"></a></li>';
								}
							}
							echo '</ul>';
						}
						?>

					</div>

				</div>
			</div>


			<?php
			$post_id = get_the_ID();
			$terms = get_the_terms($post_id, 'category_works');
			if ($terms && !is_wp_error($terms)) :?>
				<?php
				$term_ids = wp_list_pluck($terms, 'term_id');
				$args = array(
					'post_type' => 'works',
					'posts_per_page' => 6,
					'tax_query' => array(
						array(
							'taxonomy' => 'category_works',
							'field' => 'id',
							'terms' => $term_ids,
						),
					),
					'post__not_in' => array($post_id),
				);
				query_posts($args);
				?>
				<h2 class="ttl-comp02">最新の施工実績</h2>
				<ul class="list-works-related">
				<?php while (have_posts()): the_post(); ?>
					<li class="item">
							<div class="item__img">
								<a href="<?php the_permalink() ?>">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail(); ?>
									<?php else: ?>
										<img src="<?php bloginfo('template_url'); ?>/images/default-no-img.jpg"
										     alt="<?php the_title(); ?>">
									<?php endif; ?>
								</a>
							</div>
							<div class="item__cnt">
								<div class="ttl"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
								<div class="center"><a href="<?php the_permalink() ?>" class="btn-comp01 btn-comp01--sm">この施工実績の詳細を見る</a></div>
							</div>
						</li>
				<?php endwhile;?>
				</ul>

			<?php endif; ?>


		</div>

	</main>
<?php get_footer(); ?>