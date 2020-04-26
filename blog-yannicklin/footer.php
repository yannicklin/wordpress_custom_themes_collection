<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sparkling
 */
?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .site-content -->

	<div id="footer-area">
		<div class="container footer-inner">
			<div class="row">
				<?php get_sidebar( 'footer' ); ?>
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info container">
				<div class="row">
					<?php if( of_get_option('footer_social') ) sparkling_social_icons(); ?>
					<nav role="navigation" class="col-md-3">
						<?php sparkling_footer_links(); ?>
					</nav>
					<div class="copyright col-md-9">
						<?php echo of_get_option( 'custom_footer_text', 'sparkling' ); ?>
						<div class="site-info">
							<?PHP
								$blog_name = '<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>';
								$blog_owner = '<a href="http://yannicklin.net/" rel="designer">YANNICK LIN</a>';
								$twoudia = '<a href="http://www.twoudia.com/" rel="TWOUDIA">TWOUDIA</a>';
								printf(__('WEBSITE (%s) IS MAINTAINED BY %s WITH TECH OF %s. FROM 2004 TO %s. ALL RIGHTS RESERVED. %s','aplos'), $blog_name,$blog_owner,$twoudia,date('Y'), '&copy;'); ?>
						</div><!-- .site-info -->
					</div>
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>