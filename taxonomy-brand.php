<?php

get_header();
	


// test code	
// $paged = get_query_var( 'paged', 1 );
// echo 'Currently Browsing Page ', $paged;



//$term = get_term_by('slug', get_guery_var('term'),get_guery_var('taxonomy'));

//print_r($term);


?> 


    <p>TAXONOMY BRAND ARCHIVE PAGE TAXONOMY-BRAND.PHP - test</p>



    <div>

        <?php if(have_posts()) : while(have_posts()) : the_post();  ?>

        <?php get_template_part('partials/content', 'car'); ?>

        <?php  endwhile; else : ?>

        <?php fet_template_part('partials/content', 'none') ?>

        <?php endif; ?>	

    </div>

<?php 
get_sidebar('cars');
get_footer();

