<?php get_header(); ?>
<style>
	@media (min-width: 768px) {
		.section{
			padding-top: 80px;
			padding-bottom: 90px;
		}
		.ttl-comp02{
			margin-bottom: 35px;
		}

	}
	.page-404{
		max-width: 790px;
		padding: 0px 10px;
		margin-left: auto;
		margin-right: auto;
	}
	.txt-nf{
		font-size: 16px;
		letter-spacing: 8px;
		margin-bottom: 35px;
		line-height: 1.875;
		text-align: center;
		font-weight: bold;
	}
	.nf-cnt{
		line-height: 2;
		font-size: 16px;
		margin-bottom: 0;
		letter-spacing: 1px;
	}
</style>
	<main class="section">
		<div class="container">
			<div class="page-404">
				<h1 class="ttl-comp02 let-8">ページが見つかりませんでした</h1>
				<p class="txt-nf centered">Not Found</p>
				<p class="nf-cnt">
					申し訳ございませんが、お探しのページが見つかりません。<br>
					Sorry The page you're searching isn't found.<br>
					該当のページはアドレス変更、削除されたか、一時的にアクセスできない状況にある可能性があります。
				</p>
			</div>
		</div>
	</main>
<?php get_footer(); ?>