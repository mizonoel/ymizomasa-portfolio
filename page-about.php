<?php get_header(); ?>
 
  <main>
    <section class="sub-hero">
      <div class="wrapper">
        <div class="inner">
          <div class="mainvisual">
            <h2 class="name">ABOUT ME</h2>
          </div>
          <div class="subvisual">
            <p class="text">シンプルに、伝わるデザインを。<br>ミニマルな構成と動きで、情報を美しく整理します。</p>
          </div>
        </div>
      </div>
    </section>

    <section class="introduction">
      <div class="container">
        <div class="wrapper inner">
          <div class="img">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about/about_me.png" alt="About Me">
          </div>
          <div class="text-area">
            <p class="title">YU MIZOMASA</p>
            <p class="description">IT企業でインフラシステムの企画・運用・保守に従事するなか、副業でWeb制作を中心に、デザインから実装まで一貫して行っています。<br>情報を整理し、ユーザーにとって心地よい体験を届けることを大切にしており、HTML / CSS / JavaScript / WordPress / Figma などを使用し、ミニマルな中にも動きと温かみのあるサイトを制作します。</p>
          </div>
        </div>
      </div>
    </section>

    <section class="skills">
      <h2 class="section-title">SKILLS</h2>
      <div class="skills-inner">
        <div class="item fadein">
          <div class="item-container">
            <div class="upper">
              <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about/design.png" alt="Design">
              </div>
              <p>Design</p>
            </div>
            <div class="bottom">
              <p>Figma / Photoshop / Illustrator</p>
            </div>
          </div>
        </div>
        <div class="item fadein">
          <div class="item-container">
            <div class="upper">
              <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about/front-end.png" alt="Front-end">
              </div>
              <p>Front-end</p>
            </div>
            <div class="bottom">
              <p>HTML / CSS / JavaScript / jQuery / GSAP</p>
            </div>
          </div>
        </div>
        <div class="item fadein">
          <div class="item-container">
            <div class="upper">
              <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about/wordpress.png" alt="WordPress">
              </div>
              <p>WordPress</p>
            </div>
            <div class="bottom">
              <p>PHP /オリジナルテーマ開発<br> / カスタム投稿</p>
            </div>
          </div>
        </div>
        <div class="item fadein">
          <div class="item-container">
            <div class="upper">
              <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about/other.png" alt="Other">
              </div>
              <p>Other</p>
            </div>
            <div class="bottom">
              <p>Git / UI設計 / レスポンシブデザイン</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="vision">
      <div class="wrapper">
        <h2 class="section-title">VISION</h2>
        <p>ただ整えるだけでなく、<br>“伝わる”デザインをつくる。</p>
        <p>動きと余白で、情報をデザインすることを目指しています。</p>
      </div>
    </section>

    

    <div class="circle"></div>
  </main>

<?php get_footer(); ?>