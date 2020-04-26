<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
  <?php 
  $html_siteinfo = sprintf( __('%1$s @ %2$s. All Rights Reserved.', 'cathayaglobal'), 
  	'2017',
    '<a href="'. esc_url( get_permalink() ) . '">'. strtoupper(get_bloginfo( 'name', 'display' )) . '</a>'
  );
  echo $html_siteinfo;
  ?>
</div><!-- .site-info -->
