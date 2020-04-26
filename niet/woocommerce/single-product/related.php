<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;



if(isset($_GET['testing'])) {
	// in order to prevent random related products, we are getting all related products and ordering it by id
	// You can increase parameter for get related 50 will be enough for a long time
	$related = $product->get_related( 50 );
	$orderby="ID";
} else {
	$related = $product->get_related( $posts_per_page );
}


if ( sizeof( $related ) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page' 		=> $posts_per_page,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related,
	'post__not_in'			=> array($product->id)
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] 	= $columns;

if ( $products->have_posts() ) : ?>
<div class="courseinfo">
<div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row  mk-in-viewport">
<div style="" class="vc_col-sm-8 wpb_column column_container  _ height-full">
<div class="coursetabs">
<?php if( get_field('course_inclusions') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-courseinclusions peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: none;">Course Inclusions</span>
<span class="peekaboo_onshow" style="">Course Inclusions</span>
</a>
<div class="peekaboo_content peekaboo-courseinclusions peekaboo_onhide" style="">
<div class="courseinclusions">
	<?php the_field('course_inclusions'); ?>
</div>
</div>
</div><?php endif; ?>

<?php if( get_field('course_details') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-coursedetails peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">Course Details</span>
<span class="peekaboo_onshow" style="display:none;">Course Details</span>
</a>
<div class="peekaboo_content peekaboo-coursedetails peekaboo_onhide" style="display:none;">
<div class="coursedetails"><?php the_field('course_details'); ?></div>
</div>
</div><?php endif; ?>


<?php if( get_field('entry_requirements') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-entryrequirements peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">Entry Requirements</span>
<span class="peekaboo_onshow" style="display:none;">Entry Requirements</span>
</a>
<div class="peekaboo_content peekaboo-entryrequirements peekaboo_onhide" style="display:none;">
<div class="entryrequirements"><?php the_field('entry_requirements'); ?></div>
</div>
</div><?php endif; ?>


<?php if( get_field('computing') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-computing peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">Computing </span>
<span class="peekaboo_onshow" style="display:none;">Computing </span>
</a>
<div class="peekaboo_content peekaboo-computing peekaboo_onhide" style="display:none;">
<div class="computing"><?php the_field('computing'); ?></div>
</div>
</div><?php endif; ?>

<?php if( get_field('career_outcomes') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-careeroutcomes peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">Career Outcomes</span>
<span class="peekaboo_onshow" style="display:none;">Career Outcomes</span>
</a>
<div class="peekaboo_content peekaboo-careeroutcomes peekaboo_onhide" style="display:none;">
<div class="careeroutcomes"><?php the_field('career_outcomes'); ?></div>
</div>
</div><?php endif; ?>

<?php if( get_field('benefit') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-benefit peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">Benefits</span>
<span class="peekaboo_onshow" style="display:none;">Benefits</span>
</a>
<div class="peekaboo_content peekaboo-benefit peekaboo_onhide" style="display:none;">
<div class="benefit"><?php the_field('benefit'); ?></div>
</div>
</div><?php endif; ?>

<?php if( get_field('open_to') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-open_to peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">Open for Queensland residents who are</span>
<span class="peekaboo_onshow" style="display:none;">Open for Queensland residents who are</span>
</a>
<div class="peekaboo_content peekaboo-open_to peekaboo_onhide" style="display:none;">
<div class="open_to"><?php the_field('open_to'); ?></div>
</div>
</div><?php endif; ?>

<?php if( get_field('niet_courses') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-niet_courses peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">NIET participating courses</span>
<span class="peekaboo_onshow" style="display:none;">NIET participating courses</span>
</a>
<div class="peekaboo_content peekaboo-niet_courses peekaboo_onhide" style="display:none;">
<div class="niet_courses"><?php the_field('niet_courses'); ?></div>
</div>
</div><?php endif; ?>

<?php if( get_field('contribution_fees') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-contribution_fees peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">Current student co-contribution fees</span>
<span class="peekaboo_onshow" style="display:none;">Current student co-contribution fees</span>
</a>
<div class="peekaboo_content peekaboo-contribution_fees peekaboo_onhide" style="display:none;">
<div class="contribution_fees"><?php the_field('contribution_fees'); ?></div>
</div>
</div><?php endif; ?>


<?php if( get_field('concession_fees') ): ?><div class="coursetab">
<a class="peekaboo_link peekaboo-concession_fees peekaboo_onhide courseid" href="#">
<span class="peekaboo_onhide" style="display: inline;">How do you qualify for concession fees?</span>
<span class="peekaboo_onshow" style="display:none;">How do you qualify for concession fees?</span>
</a>
<div class="peekaboo_content peekaboo-concession_fees peekaboo_onhide" style="display:none;">
<div class="concession_fees"><?php the_field('concession_fees'); ?></div>
</div>
</div><?php endif; ?>


</div>
</div>
<div style="" class="vc_col-sm-4 nidownloadform wpb_column column_container  _ height-full">
<div class="courseform"><?php gravity_form( 1, true, false, false, '', false ); ?></div>
</div>


</div>
</div>
<div class="mk-page-section-wrapper">
<div id="page-section-4" class="mk-page-section self-hosted  full-width-4 js-el js-master-row    niethr mk-in-viewport" data-intro-effect="false">
<div class="nietbghr"></div>

</div></div>

	<div class="related products compact-layout grid--float">
	<h4 class="nietrelated">You might also be interested in...</h4>	
		<section class=" mk--row">
		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>


			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>
		</section>
	</div>

<?php endif;

wp_reset_postdata();
