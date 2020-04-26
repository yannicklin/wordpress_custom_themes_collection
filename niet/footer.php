<?php
global $mk_options;

$mk_footer_class = $show_footer = $disable_mobile = $footer_status = '';

$post_id = global_get_post_id();
if($post_id) {
  $show_footer = get_post_meta($post_id, '_template', true );
  $cases = array('no-footer', 'no-header-footer', 'no-header-title-footer', 'no-footer-title');
  $footer_status = in_array($show_footer, $cases);
}

if($mk_options['disable_footer'] == 'false' || ( $footer_status )) {
  $mk_footer_class .= ' mk-footer-disable';
}

if($mk_options['footer_type'] == '2') {
  $mk_footer_class .= ' mk-footer-unfold';
}


$boxed_footer = (isset($mk_options['boxed_footer']) && !empty($mk_options['boxed_footer'])) ? $mk_options['boxed_footer'] : 'true';
$footer_grid_status = ($boxed_footer == 'true') ? ' mk-grid' : ' fullwidth-footer';
$disable_mobile = ($mk_options['footer_disable_mobile'] == 'true' ) ? $mk_footer_class .= ' disable-on-mobile'  :  ' ';

?>

<section id="mk-footer-unfold-spacer"></section>

<div class="mk-page-section-wrapper ctafooter">    <div id="page-section-9" class="mk-page-section self-hosted  full-width-9 js-el js-master-row    nicta center-y mk-in-viewport" data-intro-effect="false">                                <div class="mk-page-section-inner">                <div class="mk-video-color-mask"></div>                                            </div>                                <div class="page-section-content vc_row-fluid page-section-fullwidth">            <div class="mk-padding-wrapper"><div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">	<div class="wpb_row vc_inner vc_row    attched-false   vc_row-fluid ">				<div class="mk-grid">				<div class="ctaicon wpb_column vc_column_container vc_col-sm-3"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="mk-image   align-center simple-frame outside-image " style="margin-bottom:10px"><div class="mk-image-holder" style="max-width: 121px;"><div class="mk-image-inner "><img class="lightbox-false" alt="icon-phone" title="icon-phone" src="/wp-content/uploads/2017/06/icon-phone.png" width="121" height="121"></div></div><div class="clearboth"></div></div></div></div></div><div class="ctatext wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner "><div class="wpb_wrapper"><div id="text-block-10" class="mk-text-block   ">		<h4>TO FIND OUT MORE, GET IN TOUCH TODAY!</h4>	<div class="clearboth"></div></div></div></div></div><div class="ctabutton wpb_column vc_column_container vc_col-sm-3"><div class="vc_column-inner "><div class="wpb_wrapper"><div id="mk-button-11" class="mk-button-container _ relative    block text-center  ">	<a href="/contact-us/" target="_self" class="mk-button js-smooth-scroll mk-button--dimension-flat mk-button--size-large mk-button--corner-pointed text-color-light _ relative text-center font-weight-700 no-backface  letter-spacing-2 inline">				 		<span class="mk-button--text">CONTACT US</span>			</a></div></div></div></div>				</div>			</div></div></div>            <div class="clearboth"></div>        </div>                                                    <div class="clearboth"></div>    </div></div>


<section id="mk-footer" class="<?php echo $mk_footer_class; ?>" <?php echo get_schema_markup('footer'); ?>>
    <?php if($mk_options['disable_footer'] == 'true' && !$footer_status) : ?>
    <div class="footer-wrapper<?php echo $footer_grid_status;?>">
        <div class="mk-padding-wrapper">
            <?php mk_get_view('footer', 'widgets'); ?>
            <div class="clearboth"></div>
        </div>
    </div>
    <?php endif;?>
    <?php mk_get_view('footer', 'sub-footer', false, ['footer_status' => $footer_status, 'footer_grid_status' => $footer_grid_status]); ?>
</section>
</div>
<?php 
global $is_header_shortcode_added;
mk_get_header_view('holders', 'secondary-menu', ['header_shortcode_style' => $is_header_shortcode_added]); ?>
</div>

<div class="bottom-corner-btns js-bottom-corner-btns">
<?php
    mk_get_view('footer', 'navigate-top');
    mk_get_view('footer', 'quick-contact');
    do_action('add_to_cart_responsive');
?>
</div>


<?php
mk_get_header_view('global', 'full-screen-search');
?>


<footer id="mk_page_footer">
    <?php
    
    wp_footer();

    if( (isset($mk_options['pagespeed-optimization']) and $mk_options['pagespeed-optimization'] != 'false')
     or (isset($mk_options['pagespeed-defer-optimization']) and $mk_options['pagespeed-defer-optimization'] != 'false')) {
    ?>
    <script>
        !function(e){var a=window.location,n=a.hash;if(n.length&&n.substring(1).length){var r=e(".vc_row, .mk-main-wrapper-holder, .mk-page-section, #comments"),t=r.filter("#"+n.substring(1));if(!t.length)return;n=n.replace("!loading","");var i=n+"!loading";a.hash=i}}(jQuery);
    </script>
    <?php } else { ?>
    <script>
        // Run this very early after DOM is ready
        (function ($) {
            // Prevent browser native behaviour of jumping to anchor
            // while preserving support for current links (shared across net or internally on page)
            var loc = window.location,
                hash = loc.hash;

            // Detect hashlink and change it's name with !loading appendix
            if(hash.length && hash.substring(1).length) {
                var $topLevelSections = $('.vc_row, .mk-main-wrapper-holder, .mk-page-section, #comments');
                var $section = $topLevelSections.filter( '#' + hash.substring(1) );
                // We smooth scroll only to page section and rows where we define our anchors.
                // This should prevent conflict with third party plugins relying on hash
                if( ! $section.length )  return;
                // Mutate hash for some good reason - crazy jumps of browser. We want really smooth scroll on load
                // Discard loading state if it already exists in url (multiple refresh)
                hash = hash.replace( '!loading', '' );
                var newUrl = hash + '!loading';
                loc.hash = newUrl;
            }
        }(jQuery));
    </script>
    <?php } ?>


    <?php 
    // Asks W3C Total Cache plugin to move all JS and CSS assets to before body closing tag. It will help getting above 90 grade in google page speed.
    if(isset($mk_options['pagespeed-optimization']) and $mk_options['pagespeed-optimization'] != 'false' and defined('W3TC')) {
        echo "<!-- W3TC-include-js-head -->";
        echo "<!-- W3TC-include-css -->";
    }
    ?>

</footer>  
</body>
</html>