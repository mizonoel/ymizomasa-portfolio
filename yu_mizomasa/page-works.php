<?php get_header(); ?>

  <main>
    <section class="sub-hero">
      <div class="wrapper">
        <div class="inner">
          <div class="mainvisual">
            <h2 class="name">WORKS</h2>
          </div>
          <div class="subvisual">
            <p class="text">架空サイトで表現した、デザインとコーディングの世界。</p>
          </div>
        </div>
      </div>
    </section>

    <section class="works-list">
  <h2 class="section-title">WORKS LIST</h2>
  <div class="wrapper inner">

      <?php
      $works_query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'asc',
      ));

      if ($works_query->have_posts()) :
        while ($works_query->have_posts()) :
          $works_query->the_post();

          // ACF
          $thumbnail_id = get_field('thumbnail'); // 画像ID
          $site_name    = get_field('site_name');
          $description  = get_field('description');
      ?>

      <div class="item fadein">
        <a href="<?php echo esc_url(get_permalink()); ?>">

          <div class="img">
            <?php
            if ($thumbnail_id) {
              echo wp_get_attachment_image($thumbnail_id, 'full', false, [
                'alt' => esc_attr($site_name)
              ]);
            } elseif (has_post_thumbnail()) {
              the_post_thumbnail('full', ['alt' => esc_attr($site_name)]);
            }
            ?>
          </div>

          <div class="text-area">
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
          </div>

          <div class="works-btn">
            <span class="btn">View More</span>
          </div>

        </a>
      </div>

      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>

  </div>
</section>


    <div class="circle"></div>
  </main>

<?php get_footer(); ?>