  <?php get_header(); ?>
  <main><!-- MAIN CONTENT -->
    <div class="base-container contentMain">

      <?php 
      if ( have_posts() ) : 

        /* Start the Loop */
        while ( have_posts() ) :

          the_post(); ?>

          <section class="blog-wrapper"><!-- Begin Blog Featured Posts -->
            <div class="blog-feature">
              <div class="single-blog">
                <div class="blog-img">
                  <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?></a>
                </div>
    
                <div class="blog-content-wrapper">
                  <div class="blog-content">
                    <p class="blog-category">
                      <?php the_tags( '<span class="cat-name-2">', '</span> <span class="cat-name-3">', '</span>' ); ?>
                    </p>
                    <h2><a class="blog-content__heading-link" href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h2>
                    <p>
                      <?php the_excerpt(); ?><a href="<?php the_permalink(); ?>">Read more...</a>
                    </p>
                  </div>
    
                  <div class="blog-info">
                    <p class="gray-1 margin-right"><img src="<?php echo get_template_directory_uri() ?>/assets/images/userIconSvg.svg"/>by <strong class="default-text clear"><?php echo get_the_author(); ?></strong></p>
                    <p class="gray-1"><img src="<?php echo get_template_directory_uri() ?>/assets/images/calendarIconSvg.svg"/><?php echo get_the_date(); ?></p>
                  </div>
                </div><!-- End blog-content-wrapper -->
              </div><!-- End single-blog -->
            </div>
          </section>          

      <?php

      endwhile;

        else :

        get_template_part( 'template-parts/content', 'none' );

      endif; 
      ?>



      <div class="pageNumberBlock right"><!-- Begin PAGINATION -->
        <span class="squareBorder">1</span>
        <span class="squareBorder">2</span>
        <span class="squareBorder">3</span>
        <span class="squareBorder">4</span>
        <span class="page-dots">...</span>
        <span class="squareBorder next-page">Next <img class="right-arrow-padding" src="<?php echo get_template_directory_uri() ?>/assets/images/right-arrow.svg"/></span>
      </div><!-- End Begin Pagination -->
    </div><!-- End contentMain wrapper container -->


  <?php
  get_sidebar();
  get_footer();
