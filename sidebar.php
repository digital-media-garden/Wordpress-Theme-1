<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package digital-media-garden-blog
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

	<!-- <aside id="secondary" class="widget-area">
		<?php //dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>#secondary -->

	<aside><!-- Begin Main SIDEBAR -->
		<div class="sidebarMainWrapper">
		<img class="authorPic" src="<?php echo get_template_directory_uri() ?>/assets/images/author1.png"/>
		<h3 class="sideHeading prettyUnderline1">About</h3>
		<p class="sideAboutText"><strong>Lorem ipsum dolor sit amet,</strong> consectetur adipiscing elit. Nam interdum mauris sit amet libero hendrerit sollicitudin. 
			Etiam ipsum lectus, feugiat eu dapibus nec, lobortis ac est. Nulla varius ac urna quis aliquam. 
			Etiam auctor eros ornare nibh malesuada, egestas elementum augue posuere.</p>
		</div>

		<section class="popPosts">
		<h3 class="sideHeading">Posts</h3>
		<p>Meet the biochemist working to cure the most common, lethal genetic disease of childhood</p>
		<p>Xiaomi's announces Mi VR headset with remote control</p>
		<p>When are we going to get best wireless charging?</p>
		</section>

		<div class="newsletter">
		<p class="upperCase subscribeCTA">Subscribe to newsletter</p>
		<div class="email">
			<img class="email__envelopeIcon" src="<?php echo get_template_directory_uri() ?>/assets/images/envelopeSVG.svg"/>
			<input type="email" placeholder="Your email">
			<button class="upperCase newsletterSubmitBtn white" type="submit">
			<a href="#">ok</a>
			</button>
		</div>
		</div>
	</aside><!-- End Main Sidebar -->
</main>