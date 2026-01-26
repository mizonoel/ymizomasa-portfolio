<?php get_header( 'top' ); ?>
  
  <main>
    <section id="hero">
      <div class="wrapper">
        <div class="hero-inner">
          <div class="mainvisual">
            <h2 class="name">YU MIZOMASA<span class="cursor">|</span></h2>
          </div>
          <div class="subvisual">
            <p class="title">Web Creator / Front-End<br>Developer</p>
            <p class="text">シンプルに伝わるデザインを、動きで魅せる。</p>
          </div>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="wrapper">
        <h2 class="section-title">ABOUT</h2>
        <div class="about-inner">
          <div class="about-img">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about.png" alt="YU MIZOMASA">
          </div>
          <div class="about-text">
            <p>はじめまして、Yu Mizomasaです。<br>HTML・CSS・JavaScript・WordPress（オリジナルテーマ）を用いて、デザインと動きを両立させたWebサイトを制作しています。Figmaでの設計からコーディングまで一貫して対応可能です。
            </p>
            <div class="about-btn">
              <a class="btn" href="<?php echo esc_url(home_url('/')); ?>about">View More</a>
            </div>
          </div>
      </div>
    </section>

    <section id="works">
  <div class="wrapper">
    <h2 class="section-title">WORKS</h2>

    <div class="stagedReveal">

      <?php
      $works_query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 3,   // ここで件数調整可能
        'orderby'        => 'date',
        'order'          => 'ASC',
      ));

      if ($works_query->have_posts()) :
        while ($works_query->have_posts()) :
          $works_query->the_post();

          // ACF
          $thumbnail_id = get_field('thumbnail'); // 画像ID
          $site_name    = get_field('site_name');
          $description  = get_field('description');
      ?>

      <div class="stagedReveal-content">
        <div class="item">

          <!-- 全体リンク -->
          <a href="<?php echo esc_url(home_url('/works')); ?>">

            <div class="img">
              <?php
              if ($thumbnail_id) {
                echo wp_get_attachment_image($thumbnail_id, 'full', false, [
                  'alt' => esc_attr($site_name)
                ]);
              }
              ?>
            </div>

            <div class="tag">
              <?php
                $skills = get_field('skills_checkbox');
                if ($skills) :
                  foreach ($skills as $skill) :
                ?>
                  <span><?php echo esc_html($skill); ?></span>
                <?php endforeach; endif; ?>
            </div>

            <p class="title"><?php echo esc_html($site_name); ?></p>
            <p class="description"><?php echo esc_html($description); ?></p>

            <div class="works-btn">
              <a class="btn" href="<?php echo esc_url(get_permalink()); ?>">View More</a>
            </div>

          </a>

        </div>
      </div>

      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>

    </div>

  </div>
</section>


    <section id="contact">
      <div class="wrapper">
        <h2 class="section-title">CONTACT</h2>
        <p class="text">Webサイト制作のご相談など、お気軽にご連絡ください。</p>

        <div class="form-container">
          <?php echo do_shortcode('[contact-form-7 id="86016ca" title="Contact"]'); ?>
        </div>
      </div>
    </section>

    <div class="circle"></div>
  </main>

<?php get_footer(); ?>

