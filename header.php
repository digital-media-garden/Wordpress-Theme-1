<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package digital-media-garden-blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


  <nav id="navInfo">
    <a href="<?php echo home_url() ?>"><img class="logo" src="<?php echo get_template_directory_uri() ?>/assets/images/logo1.png"/ alt="Blog logo image"></a>

    <?php
			// wp_nav_menu(
			// 	array(
			// 		'theme_location' => 'blog-nav',
			// 		'menu_id'        => 'main-blog-menu',
      //     'menu_class'     => '',
      //     'container_class'  => 'nav-main-info',
      //     'depth'          => '1', 

			// 	)
			// );
	  ?>

    <div class="nav-main-info">
      <a href="<?php echo home_url() ?>/category/wp-tips/"><img class="optionTwo" src="<?php echo get_template_directory_uri() ?>/assets/images/Shape_2.png"/></a><br/>
      <a href="<?php echo home_url() ?>/category/about-us/"><img class="optionTwo" src="<?php echo get_template_directory_uri() ?>/assets/images/Shape_3.png"/></a><br/>
      <a href="<?php echo home_url() ?>/category/design/"><img class="optionTwo" src="<?php echo get_template_directory_uri() ?>/assets/images/Shape_4.png"/></a><br/>
      <a href="<?php echo home_url() ?>/category/digital-health/"><img class="optionTwo" src="<?php echo get_template_directory_uri() ?>/assets/images/Shape_5.png"/></a><br/> 
      <a href="<?php echo home_url() ?>/category/for-nonprofits/"><img class="optionTwo" src="<?php echo get_template_directory_uri() ?>/assets/images/Shape_6.png"/></a>
    </div>
    <div class="nav-contact-info">
      <a href="#"><img class="optionTwo" src="<?php echo get_template_directory_uri() ?>/assets/images/Shape_7.png"/></a><br/>
      <a href="#"><img class="optionTwo" src="<?php echo get_template_directory_uri() ?>/assets/images/Shape_8.png"/></a>
    </div>
  </nav>

  <header class="hero"><!-- BEFIN HERO --> 
    <div class="hero-overlay base-container">
      <div class="hero__top-bar">
        <h1 class="hero__sitename white"><a href="<?php echo home_url() ?>">Medical<br>Technology<br>Blog</a></h1>
        <p class="hero__social-links white">
          <i class="fab fa-linkedin fa-lg"></i>
          <i class="fab fa-twitter-square fa-lg"></i>
          <i class="far fa-envelope fa-lg"></i>
        </p>
      </div>
    </div><!-- End hero-overlay-->
    <div class="hero__content">
      <div class="hero__content-wrapper">
        <section class="hero__content-blog-wrapper feature-post">
          <div class="blog-feature feature-heading-bg" >
            <div class="single-blog">
              <div class="hero__blog-content-wrapper">
                <div class="hero__blog-content">
                  <p class="hero__blog-category">
                    <span class="cat-name-4 white">Spotlight</span>
                    <span class="cat-name-5 white">All in healthcare</span>
                  </p>
                  <h1 class="introHeading">Tuberculosis is a killer, but scientists are fighting back with DNA changes</h1>
                </div>
                <div class="hero__blog-info">
                  <p class="gray-1 margin-right"><img src="<?php echo get_template_directory_uri() ?>/assets/images/userIconSvg.svg"/>by <strong class="default-text">Author</strong></p>
                  <p class="gray-1"><img src="<?php echo get_template_directory_uri() ?>/assets/images/calendarIconSvg.svg"/>2 days ago</p>
                  <p class="gray-1 float-right top-comment"><img src="<?php echo get_template_directory_uri() ?>/assets/images/commentIconSvg.svg"/>2 comments<span class="clear"></span></p>
                </div>
              </div>
            </div>
          </div>
        </section> 
      </div><!-- End hero__content-wrapper-->
    </div><!-- End hero__content -->
  </header><!-- End hero-->

