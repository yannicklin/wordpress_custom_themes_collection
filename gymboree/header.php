<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zakra
 */

/**
 * Functions hooked into zakra_action_doctype action
 *
 * @hooked zakra_doctype - 10
 */
do_action( 'zakra_action_doctype' );
?>

	<head>

		<?php
		/**
		 * Hook - zakra_action_head
		 *
		 * Functions hooked into zakra_action_head action
		 *
		 * @hooked zakra_head - 10
		 */
		do_action( 'zakra_action_head' );
		?>

		<?php wp_head(); ?>
		
		<!-- Facebook Pixel Code -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window,document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
				fbq('init', '700254880803358'); 
				fbq('track', 'PageView');
			</script>
			<noscript>
			 <img height="1" width="1" src="https://www.facebook.com/tr?id=700254880803358&ev=PageView&noscript=1"/>
		</noscript>
		<!-- End Facebook Pixel Code -->
	</head>

<body <?php body_class(); ?>>

<?php
/**
 * WordPress function to load custom scripts after body.
 *
 * Introduced in WordPress 5.2.0
 *
 * @since Zakra 1.2.3
 */
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<?php
/**
 * Hook - zakra_action_before
 *
 * @hooked zakra_page_start - 10
 * @hooked zakra_skip_to_content - 15
 */
do_action( 'zakra_action_before' );
?>

<?php
/**
 * Hook - zakra_action_before_header
 *
 * @hooked zakra_header_start - 10
 */
do_action( 'zakra_action_before_header' );
?>

<?php
/**
 * Hook - zakra_action_header_top
 *
 * @hooked zakra_header_top - 10
 */
do_action( 'zakra_action_header_top' );
?>

<?php
/**
 * Hook - zakra_action_before_header_main
 *
 * @hooked zakra_before_header_main - 10
 */
do_action( 'zakra_action_before_header_main' );
?>

<?php
/**
 * Hook - zakra_action_header_main
 *
 * @hooked zakra_header_main_site_branding - 10
 * @hooked zakra_header_main_site_navigation - 15
 * @hooked zakra_header_main_action- 20
 */
do_action( 'zakra_action_header_main' );
?>

<?php
/**
 * Hook - zakra_action_after_header_main
 *
 * @hooked zakra_header - 10
 */
do_action( 'zakra_action_after_header_main' );
?>

<?php
/**
 * Hook - zakra_action_after_header
 *
 * @hooked zakra_header_end - 10
 */
do_action( 'zakra_action_after_header' );
?>

<?php
/**
 * Hook - zakra_action_before_content.
 *
 * @hooked zakra_main_start - 10
 * @hooked zakra_page_header - 15
 * @hooked zakra_content_start - 20
 */
do_action( 'zakra_action_before_content' );
