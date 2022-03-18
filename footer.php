<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package digital-media-garden-blog
 */

?>
	<footer>
		<div class="base-container">
			<section class="footerWrapper">
				<h3 id="copytext" class="gray-1 left">&copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></h3>
				<div id="sociallinksFooter" class="mint-green right">
					<i class="fab fa-linkedin fa-lg"></i>
					<i class="fab fa-twitter-square fa-lg"></i>
					<i class="far fa-envelope fa-lg"></i>
				</div>
			</section>
		</div>  
	</footer>

<?php wp_footer(); ?>

</body>
</html>
