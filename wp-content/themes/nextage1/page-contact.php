<?php get_header() ?>
	<article class="article bg">
		<div class="container section">
			<h1 class="title">
				<picture>
					<source srcset="<?php echo get_bloginfo('template_directory') ?>/images/ttl_contact_sp.png" media="(max-width: 750)"/>
					<img src="<?php echo get_bloginfo('template_directory') ?>/images/ttl_contact_pc.png" alt="CONTACT"/>
				</picture>
			</h1>
			<form method="post" action="<?php echo get_bloginfo('template_directory') ?>/mail.php">
				<dl class="form-list">
					<div class="form-item">
						<dt>貴社名</dt>
						<dd>
							<input type="text" name="貴社名"/>
						</dd>
					</div>
					<div class="form-item">
						<dt>お名前<span class="tag required">※必須</span></dt>
						<dd>
							<input size="20" type="text" name="お名前" required="required"/>
						</dd>
					</div>
					<div class="form-item">
						<dt>E-mail（半角）<span class="tag required">※必須</span></dt>
						<dd>
							<input size="30" type="email" name="E-mail" required="required"/>
						</dd>
					</div>
					<div class="form-item">
						<dt>確認用E-mail（半角）<span class="tag required">※必須</span></dt>
						<dd>
							<input size="30" type="email" name="確認用E-mail" required="required"/>
						</dd>
					</div>
					<div class="form-item">
						<dt>電話番号</dt>
						<dd>
							<input size="30" type="tel" name="お電話番号"/>
						</dd>
					</div>
					<div class="form-item">
						<dt>お問い合わせ内容</dt>
						<dd>
							<label>
								<input name="お問い合わせ内容" type="radio" value="お仕事のご依頼"/> お仕事のご依頼　
							</label>
							<label>
								<input name="お問い合わせ内容" type="radio" value="広報・取材・撮影関連"/> 広報・取材・撮影関連
							</label>
							<label>
								<input name="お問い合わせ内容" type="radio" value="採用について"/> 採用について
							</label>
							<label>
								<input name="お問い合わせ内容" type="radio" value="その他のお問い合わせ"/> その他のお問い合わせ
							</label>
						</dd>
					</div>
					<div class="form-item">
						<dt>内容詳細</dt>
						<dd>
							<textarea name="内容詳細" cols="50" rows="10"></textarea>
						</dd>
					</div>
				</dl>
				<button class="btn btn-primary btn-center btn-submit" type="submit">入力内容の確認</button>
			</form>
			<section class="section privacy">
				<div class="container">
					<h3 class="title">【お客様情報のお取り扱いについて】</h3>
					<p class="center">このフォームからのお問い合わせにより知り得た<br class="sp"/>情報は適切な目的以外には使用致しません。<br/>また、第三者へ開示することは一切ございません。<br/>受付が完了しますと、受付完了の確認メールがご登録<br
								class="br"/>いただきましたメールアドレス宛てに送信されます。<br/>届かない場合は、受付られていない<br class="sp"/>可能性がございますので<br
								class="sp"/>再度お問い合わせください。</p>
				</div>
			</section>
		</div>
	</article>
<?php get_footer() ?>