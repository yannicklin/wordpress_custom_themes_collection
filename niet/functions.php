<?php 

add_action( 'wp', 'remove_product_content' );
function remove_product_content() {
// If a product in the 'Government Funded Courses' category is being viewed...
if ( is_product() && has_term( 'Government Funded Courses', 'product_cat' ) ) {
//... Remove the images
// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

// For a full list of what can be removed please see woocommerce-hooks.php
}
}


