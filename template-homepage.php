<?php 
/**
 * Template name: Homepage Template
 */

 get_header();
 ?>

<br><p>template-homepage.php<br></p>
<div class="cars">

    <?php
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $args = array(
        'post-type' => 'car',
        'paged' => $paged,
        'posts_per_page' => 2,
    );
    $cars = new WP_Query($args); ?>

    <?php if($cars->have_posts()) : while($cars->have_posts()) : $cars->the_post();  ?>

        <?php get_template_part('partials/content', 'car'); ?>

    <?php  endwhile; geniuscourses_paginate($cars); else : ?>

        <?php fet_template_part('partials/content', 'none'); ?>

    <?php endif; 
    
    wp_reset_postdata(); 
    ?>	

    <hr>

    <?php
    unset($args);

    $args = array(
        'post-type' => 'post',
        'posts_per_page' => -1,
    );
    $blogpost = new WP_Query($args); ?>

    <?php if($blogpost->have_posts()) : while($blogpost->have_posts()) : $blogpost->the_post();  ?>

        <?php get_template_part('partials/content'); ?>

    <?php  endwhile; else : ?>

        <?php fet_template_part('partials/content', 'none'); ?>

    <?php endif; 
    
    wp_reset_postdata(); 
    ?>	

</div>


<?php
//get_sidebar();
get_footer();

 