<?php get_header() ?>
	<main>
		<div class="section hero">
			<figure class="fluid">
				<picture>
					<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/bg_construction_sp.jpg" media="(max-width:750px)">
					<img src="<?php echo get_bloginfo('template_directory') ?>/images/bg_construction_pc.jpg" alt="">
				</picture>
			</figure>
			<div class="container">
				<figure class="figure">
					<picture>
						<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/ttl_construction_sp.png" media="(max-width: 750px)">
						<img src="<?php echo get_bloginfo('template_directory') ?>/images/ttl_construction_pc.png" alt="CONSTRUCTION">
					</picture>
				</figure>
			</div>
		</div>
		<article class="article">
			<div class="container fluid lead bg">
				<h1 class="title">電気通信工事</h1>
				<p class="lead center text-primary">当社は、益々急速に変革する<br class="sp">情報通信産業の市場動向を見極めつつ、<br>各種ソリューション・IP・モバイル系を<br
							class="sp">中心とした構築を行っております。<br>セキュリティや電力関連及びクラウドに<br class="sp">向けた技術革新にも<br>追従する等、新分野への柔軟な対応に<br
							class="sp">向け社会への貢献を目指します。</p>
			</div>
			<section class="section partner">
				<div class="container">
					<h2 class="title">
						<picture>
							<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/ttl_partner_sp.png" media="(max-width:750px)">
							<img src="<?php echo get_bloginfo('template_directory') ?>/images/ttl_partner_pc.png" alt="パートナー企業募集">
						</picture>
					</h2>
					<p class="center lead text-primary">全国で電気通信構築のパートナー<br class="sp">会社を募集しております！<br>お互いのメリットになるような積極的な<br
								class="sp">業務展開をお考えの<br class="sp">企業様からのご連絡をお待ちしております。</p><a class="btn btn-center"
					                                                                          href="tel:03-5760-6461">
						<picture>
							<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/img_partner_sp.png" media="(max-width:750px)">
							<img src="<?php echo get_bloginfo('template_directory') ?>/images/img_partner_pc.png" alt="03-5760-6461">
						</picture>
					</a>
				</div>
			</section>
		</article>
	</main>
<?php get_footer() ?>