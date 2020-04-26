<?php
	/**
		* @package Chinese Learn
		* @version 0.6
	*/
?>
<footer id="main-footer">
	<?php get_sidebar( 'footer' ); ?>
	
	<?php
		$footer_text = '<a href="'. get_site_url() .'" target=_self>'. get_bloginfo('name') .'</a> &copy;&reg; 2014 - '. date('Y') .' ; '. icl_translate('ChineseLearnInfo', 'Copyright Credit', 'Design & Develop by') .' <a href="http:/www.twoudia.com/" target=_blank rel="designer">TWOUDIA</a>';
	?>
	
	<p id="footer-info"><a href="<?php echo get_site_url(); ?>" target=_self><?php echo get_bloginfo('name'); ?></a> &copy; 2014 - <?php echo date('Y'); ?> ; <?php echo icl_translate('ChineseLearnInfo', 'Copyright Credit', 'Design & Develop by'); ?> <a href="http://www.twoudia.com/" target=_blank rel="designer">TWOUDIA</a></p>
</footer> <!-- #main-footer -->
</div> <!-- #container -->

<?php wp_footer(); ?>
</body>
</html>