<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>YU MIZOMASA</title>
    <meta name="description" content="YU MIZOMASAのポートフォリオサイト。Webデザインとフロントエンド開発を中心に、シンプルに伝わるデザインを動きで魅せる。作品・経歴・制作実績を掲載。">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+JP:wght@100..900&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

<body>

  <div class="loading-screen">
    <div class="dots">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </div>

  <div class="wipe-bg"></div>

  <header id="header">
    <h1 class="logo">
      <a href="index.html"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="YU MIZOMASA"></a>
    </h1>
    <nav>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>about">ABOUT</a></li>
        <li><a href="<?php echo esc_url(home_url('/')); ?>works">WORKS</a></li>
        <li><a href="<?php echo esc_url(home_url('/')); ?>contact">CONTACT</a></li>
      </ul>
    </nav>

    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <div class="mask"></div>
  </header>