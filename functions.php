<?php
/*------------------------
 CSSファイルの読み込み
 ------------------------*/
function yu_mizomasa_enqueue_styles() {
	// 共通CSS
	wp_enqueue_style( 'yu-mizomasa-style', get_stylesheet_uri() );
	
	// 各ページ別CSS
	if ( is_page_template( 'page-about.php' ) || is_page( 'about' ) ) {
		wp_enqueue_style( 'yu-mizomasa-about', get_template_directory_uri() . '/css/about.css' );
	}
	
	if ( is_page_template( 'page-contact.php' ) || is_page( 'contact' ) ) {
		wp_enqueue_style( 'yu-mizomasa-contact', get_template_directory_uri() . '/css/contact.css' );
	}
	
	if ( is_page_template( 'page-works.php' ) || is_page( 'works' ) ) {
		wp_enqueue_style( 'yu-mizomasa-works', get_template_directory_uri() . '/css/works.css' );
	}
	
	// 投稿詳細（single.php）
	if ( is_single() ) {
		wp_enqueue_style( 'yu-mizomasa-works-detail', get_template_directory_uri() . '/css/works-detail.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'yu_mizomasa_enqueue_styles' );

/*------------------------
 JavaScriptファイルの読み込み
 ------------------------*/
function yu_mizomasa_enqueue_scripts() {
	// GSAP ライブラリ
	wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), null, false );
	wp_enqueue_script( 'gsap-split-text', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js', array( 'gsap' ), null, false );
	wp_enqueue_script( 'gsap-scroll-trigger', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array( 'gsap' ), null, false );
	
	// 共通JS
	wp_enqueue_script( 'yu-mizomasa-script', get_template_directory_uri() . '/js/script.js', array( 'gsap-scroll-trigger' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'yu_mizomasa_enqueue_scripts' );

add_filter( 'jpeg_quality', function( $arg ) {
	return 100;
} );
add_filter( 'wp_editor_set_quality', function( $arg ) {
	return 100;
} );

add_filter( 'big_image_size_threshold', '__return_false' );

/*------------------------
 タイトルタグ自動生成
 ------------------------*/
add_theme_support( 'title-tag' );
