<?php get_header(); ?>

	<div>

		<?php if(have_posts()) : while(have_posts()) : the_post();  ?>

			<?php get_template_part('partials/content'); ?>

		<?php  endwhile; ?>
		
			<div class="pagination">
				<?php echo paginate_links(); ?>
			</div>
		
		<?php else : ?>

			<?php fet_template_part('partials/content', 'none') ?>

		<?php endif; ?>	

	</div>
<?php
// get_sidebar();
get_footer();
