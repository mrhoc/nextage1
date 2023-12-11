<?php get_header(); ?>
<?php if (have_posts()) : ?>

	<main class="section">
		<div id="ctl00_divCenter" class="middle-fullwidth">
			<div class="uk-container" style="padding-top: 120px;">
				<div class="search-page">
					<div class="search-page-top">
						<div class="page-header">
							<h1>日本語に翻訳する</h1>
						</div>

						<span id="ctl00_mainContent_lblMessage"></span>
					</div>

					<div id="">
						<div id="" class="searchresults">
							<dl class="searchresultlist">
								<?php
								global $paged;
								$curpage = $paged ? $paged : 1;
								$args = array(
									'paged' => $curpage,
									'post_type' => 'post', // You can add a custom post type if you like
									'posts_per_page' => 12, // limit of posts,
								);
								$primary_query = new WP_Query($args);
								wp_reset_query();
								query_posts($args);
								?>
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<dd class="searchresult">
										<h3>
											<a id="ctl00_mainContent_rptResults_ctl03_Hyperlink1" href="<?php the_permalink()?>"><?php the_title()?></a>
										</h3>
										<div class="searchresultdesc">
											<?php the_excerpt()?>
										</div>
										<hr>
									</dd>
								<?php endwhile;endif;?>

							</dl>

							<div class='modulepager'>
								<?php custom_post_type_pagination()?>
							</div>

						</div>

						<div>

						</div>

					</div>


				</div>
			</div>


		</div>
	</main>

<?php else : ?>
	<main class="section">
		<article id="post-0" class="post no-results not-found">
		<div class="entry-content" itemprop="mainContentOfPage">
			<p class="centered" style="text-align: center;"><?php esc_html_e('検索結果がありません。', 'blankslate'); ?></p>
		</div>
	</article>
	</main>
<?php endif; ?>
<?php get_footer(); ?>




