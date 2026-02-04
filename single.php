<?php get_header(); ?>

	<main>
		<section class="works-detail-hero">
			<div class="wrapper">
				<div class="inner">
					<div class="mainvisual">
						<h2 class="name"><?php echo get_field( 'page_title' ); ?></h2>
					</div>
					<div class="subvisual">
						<p class="text"><?php echo get_field( 'page_introduction' ); ?></p>
					</div>
					<div class="img">
						<img src="<?php echo esc_url( wp_get_attachment_image_url( (int) get_field( 'hero_img' ), 'full' ) ); ?>" alt="">
					</div>
				</div>
			</div>
		</section>

		<section class="works-detail-content">
			<div class="wrapper">
				<div class="item">
					<p class="title">URL</p>
					<p class="description">
						<?php
							$url = get_field( 'url' );
							if ( $url ) :
								// 値がURL形式かどうかを判定
								if ( filter_var( $url, FILTER_VALIDATE_URL ) ) : ?>
									<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener">
										<?php echo esc_html( $url ); ?>
									</a>
								<?php else : ?>
									<p class="is-private"><?php echo esc_html( $url ); ?></p>
								<?php endif; ?>
						<?php endif; ?>
					</p>
				</div>
				<div class="item">
					<p class="title">Source Code (GitHub)</p>
					<p class="description">
						<?php
							$source_url = get_field( 'source_code' );
							if ( $source_url ) :
								// 値がURL形式かどうかを判定
								if ( filter_var( $source_url, FILTER_VALIDATE_URL ) ) : ?>
									<a href="<?php echo esc_url( $source_url ); ?>" target="_blank" rel="noopener">
										<?php echo esc_html( $source_url ); ?>
									</a>
								<?php else : ?>
									<span><?php echo esc_html( $source_url ); ?></span>
								<?php endif; ?>
						<?php endif; ?>
					</p>
				</div>
				<div class="item">
					<p class="title">Production Period</p>
					<p class="description"><?php echo get_field( 'term' ); ?></p>
				</div>
				<div class="item">
					<p class="title">Overview</p>
					<p class="description"><?php echo get_field( 'overview' ); ?></p>
				</div>
				<div class="item">
					<p class="title">Design Concept</p>
					<p class="description"><?php echo get_field( 'concept' ); ?></p>
				</div>
				<div class="item">
					<p class="title">Skills</p>
					<p class="description"><?php echo get_field( 'skills' ); ?></p>
				</div>
				<div class="item">
					<p class="title">Technology</p>
					<p class="description"><?php echo get_field( 'technology' ); ?></p>
				</div>
				<div class="item">
					<p class="title">Result / Learning</p>
					<p class="description"><?php echo get_field( 'overall' ); ?></p>
				</div>
			</div>
		</section>

		<section class="mordal">
			<div class="wrapper">
				<div class="inner">
					<div class="img-pc">
						<img src="<?php echo esc_url( wp_get_attachment_image_url( (int) get_field( 'img_pc' ), 'full' ) ); ?>">
					</div>
					<div class="img-sp">
						<img src="<?php echo esc_url( wp_get_attachment_image_url( (int) get_field( 'img_sp' ), 'full' ) ); ?>">
					</div>
				</div>
				<div class="works-detail-content-btn">
					<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>works">Back to the list</a>
				</div>
			</div>
		</section>

		<!-- クリック画像拡大用モーダル -->
		<div id="imgModal" class="img-modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="modalImg">
		</div>

		<div class="circle"></div>
	</main>

	<?php get_footer(); ?>