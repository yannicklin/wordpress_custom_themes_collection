<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION

function ta_childtheme_translations() {
	load_child_theme_textdomain( 'generatepress', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ta_childtheme_translations');



if ( ! function_exists( 'generate_featured_page_header_area' ) ) :
/**
 * Build the page header
 */
function generate_featured_page_header_area($class)
{
	// Don't run the function unless we're on a page it applies to
	if ( ! is_singular() )
		return;
		
	// Don't run the function unless we have a post thumbnail
	if ( ! has_post_thumbnail() )
		return;
		
	?>
	<div class="<?php echo $class; ?> grid-container grid-parent">
		<?php the_post_thumbnail( apply_filters( 'generate_page_header_default_size', 'full' ), array('itemprop' => 'image') ); ?> 
	 	<p class="story-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
	</div>
	<?php
}
endif;


if ( ! function_exists( 'generate_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function generate_posted_on() 
{
	if (is_singular('post')){

		$output_source = '<ul id="story-info" class="has-author has-comments"><li class="source">The Australian</li>';

		$time_string = sprintf( '<time class="date-and-time" datetime="%1$s" datelive="%3$s">%2$s</time>',
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('h:iA F d, Y' ) ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$output_time = sprintf('<li class="timestamp">%1$s</li>', $time_string);

		$output_tools = sprintf('<li class="tools save-story"><a href="#" class="tools-add-shortlist">'. __('Save', 'the-australian') . '</a></li><li class="tools share"><div id="share-tools"><ul id="share-tools-list"><li class="share-item-facebook first"><a title="Facebook" href="http://facebook.com/sharer.php?u=%1$s&amp;t=%2$s" target="_blank" class="share-facebook">Share on Facebook</a></li><li class="share-item-twitter"><a title="Twitter" href="https://twitter.com/intent/tweet?url=%1$s&amp;text=%2$s" target="_blank" class="share-twitter">Share on Twitter</a></li><li class="share-item-email"><a title="Email" href="mailto:?subject=%2$s&amp;body=%1$s" class="share-email">Share on email</a></li><li class="share-item-more more"><a title="Share more..." href="#share-tools" data-rel="lightcase" class="share-more">Share more...</a></li><li class="share-item-googleplus"><a title="Google+" href="https://plus.google.com/share?url=%1$s" target="_blank" class="share-googleplus">Share on Google+</a></li><li class="share-item-reddit"><a title="Reddit" href="http://www.reddit.com/submit?url=%1$s" target="_blank" class="share-reddit">Share on Reddit</a></li><li class="share-item-whatsapp"><a title="Whatsapp" href="whatsapp://send?text=%1$s" class="share-whatsapp">Share on Whatsapp</a></li><li class="share-item-print last"><a title="Print this article" href="javascript:window.print();" class="share-print">Print this article</a></li></ul><a href="javascript:window.lightcase.close();" id="share-tools-close">X</a></div></li>', esc_url( get_permalink() ), esc_html( get_the_title() ) );

		$output_comment = sprintf('<li class="tools comments"> <a href="#comments" id="scroll-comments"><span class="livefyre-commentcount">%1$s</span></a></li>', esc_html( number_format_i18n( get_comments_number() ) ) );

		$author_id = get_the_author_meta('ID');

		$output_author = sprintf('<li class="byline full"><div id="authors" class="has-author"><div data-author-name="%1$s %2$s" class="module author-module"><div class="module-header"><h2 class="heading"><a href="%3$s" rel="author">%1$s %2$s</a></h2></div><div class="module-content"><div class="dinkus"><a href="%3$s" rel="author"><img data-name="%1$s %2$s" src="%9$s"></a></div><div class="title">%7$s</div><div class="location">%8$s</div></div><div class="module-footer"><div class="google-plus more"><a href="%6$s" rel="me" target="_blank">%6$s</a></div><div class="twitter"><a href="%5$s" rel="me" target="_blank">@%4$s</a></div></div></div>
<img class="tcog-pixel" src="http://pixel.tcog.cp1.news.com.au/track/component/author/eea199fb46693fd5d9004e6a1df49130/?esi=true&amp;t_product=the-australian&amp;t_template=s3/austemp-article_common/vertical/author/widget&amp;td_bio=false" style="opacity:0; height:0px; width:0px; position:absolute;" width="0" height="0">
</div></li></ul>', esc_html(get_the_author_meta('first_name')) , esc_html(get_the_author_meta('last_name')) , esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) , esc_html( get_field('user_profile_twitter_name', 'user_'. $author_id ) ) , esc_url( get_field('user_profile_twitter_url', 'user_'. $author_id ) ) , esc_url( get_field('user_profile_google_plus_url', 'user_'. $author_id ) ) , esc_html( get_field('user_profile_position', 'user_'. $author_id ) ) , esc_html( get_field('user_profile_location', 'user_'. $author_id ) ) , esc_url( get_field('user_profile_avator_local', 'user_'. $author_id ) ) );

	} else {

		$output_source = '<span class="article-info">';
		$output_time = sprintf( '<div class="timestamp hidden" title="%1$s">%2$s</div>',
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('h:iA' ) ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$output_tools = '';
		$output_comment = '';
		$output_author = sprintf('<div class="byline">%1$s %2$s</div></span>', esc_html(get_the_author_meta('first_name')) , esc_html(get_the_author_meta('last_name')) );
	}

	echo $output_source . $output_time . $output_tools . $output_comment . $output_author ;
}
endif;

if ( ! function_exists( 'generate_footer_meta' ) ) :
	/**
	 * Build the footer post meta
	 */
	add_action( 'generate_after_entry_content', 'generate_footer_meta' );
	function generate_footer_meta()
	{
		if ( 'post' == get_post_type() ) : ?>
			<footer class="entry-meta">
				<?php generate_entry_meta(); ?>
			</footer><!-- .entry-meta -->
		<?php endif;
	}
endif;


if ( ! function_exists( 'generate_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags.
	 */
	function generate_entry_meta()
	{
		$categories = apply_filters( 'generate_show_categories', false );
		$tags = apply_filters( 'generate_show_tags', false );
		$comments = apply_filters( 'generate_show_comments', true );

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'generatepress' ) );
		if ( $categories_list && $categories ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'generatepress' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'generatepress' ) );
		if ( $tags_list && $tags ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'generatepress' ),
				$tags_list
			);
		}

		printf('<div id="share-tools"><ul id="share-tools-list"><li class="share-item-facebook first"><a title="Facebook" href="http://facebook.com/sharer.php?u=%1$s&amp;t=%2$s" target="_blank" class="share-facebook">Share on Facebook</a></li><li class="share-item-twitter"><a title="Twitter" href="https://twitter.com/intent/tweet?url=%1$s&amp;text=%2$s" target="_blank" class="share-twitter">Share on Twitter</a></li><li class="share-item-email"><a title="Email" href="mailto:?subject=%2$s&amp;body=%1$s" class="share-email">Share on email</a></li><li class="share-item-more more"><a title="Share more..." href="#share-tools" data-rel="lightcase" class="share-more">Share more...</a></li><li class="share-item-googleplus"><a title="Google+" href="%1$s" target="_blank" class="share-googleplus">Share on Google+</a></li><li class="share-item-reddit"><a title="Reddit" href="http://www.reddit.com/submit?url=%1$s" target="_blank" class="share-reddit">Share on Reddit</a></li><li class="share-item-whatsapp"><a title="Whatsapp" href="whatsapp://send?text=%1$s" class="share-whatsapp">Share on Whatsapp</a></li><li class="share-item-print last"><a title="Print this article" href="javascript:window.print();" class="share-print">Print this article</a></li></ul><a href="javascript:window.lightcase.close();" id="share-tools-close">X</a></div>', esc_url( get_permalink() ), esc_html( get_the_title() ) );

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) && $comments ) {
			echo '<span class="comments-link">';
			comments_popup_link( __( 'Leave a comment', 'generatepress' ), __( '1 Comment', 'generatepress' ), __( '% Comments', 'generatepress' ) );
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'generate_content_classes' ) ) :
	/**
	 * Adds custom classes to the content container
	 */
	add_filter( 'generate_content_class', 'generate_content_classes');
	function generate_content_classes( $classes )
	{
		$right_sidebar_width = apply_filters( 'generate_right_sidebar_width', '30' );
		$left_sidebar_width = apply_filters( 'generate_left_sidebar_width', '30' );
		$total_sidebar_width = $left_sidebar_width + $right_sidebar_width;

		$right_sidebar_tablet_width = apply_filters( 'generate_right_sidebar_tablet_width', $right_sidebar_width );
		$left_sidebar_tablet_width = apply_filters( 'generate_left_sidebar_tablet_width', $left_sidebar_width );
		$total_sidebar_tablet_width = $left_sidebar_tablet_width + $right_sidebar_tablet_width;

		$classes[] = 'content-area';
		$classes[] = 'grid-parent';
		$classes[] = 'mobile-grid-100';

		// Get the layout
		$layout = generate_get_layout();

		if ( '' !== $layout ) {
			switch ( $layout ) {

				case 'right-sidebar' :
					$classes[] = 'grid-' . ( 100 - $right_sidebar_width );
					$classes[] = 'tablet-grid-' . ( 100 - $right_sidebar_tablet_width );
					break;

				case 'left-sidebar' :
					$classes[] = 'push-' . $left_sidebar_width;
					$classes[] = 'grid-' . ( 100 - $left_sidebar_width );
					$classes[] = 'tablet-push-' . $left_sidebar_tablet_width;
					$classes[] = 'tablet-grid-' . ( 100 - $left_sidebar_tablet_width );
					break;

				case 'no-sidebar' :
					$classes[] = 'grid-100';
					$classes[] = 'tablet-grid-100';
					break;

				case 'both-sidebars' :
					$classes[] = 'push-' . $left_sidebar_width;
					$classes[] = 'grid-' . ( 100 - $total_sidebar_width );
					$classes[] = 'tablet-push-' . $left_sidebar_tablet_width;
					$classes[] = 'tablet-grid-' . ( 100 - $total_sidebar_tablet_width );
					break;

				case 'both-right' :
					$classes[] = 'grid-' . ( 100 - $total_sidebar_width );
					$classes[] = 'tablet-grid-' . ( 100 - $total_sidebar_tablet_width );
					break;

				case 'both-left' :
					$classes[] = 'push-' . $total_sidebar_width;
					$classes[] = 'grid-' . ( 100 - $total_sidebar_width );
					$classes[] = 'tablet-push-' . $total_sidebar_tablet_width;
					$classes[] = 'tablet-grid-' . ( 100 - $total_sidebar_tablet_width );
					break;
			}
		}

		return $classes;

	}
endif;

if ( ! function_exists( 'generate_right_sidebar_classes' ) ) :
	/**
	 * Adds custom classes to the right sidebar
	 */
	add_filter( 'generate_right_sidebar_class', 'generate_right_sidebar_classes');
	function generate_right_sidebar_classes( $classes )
	{

		$right_sidebar_width = apply_filters( 'generate_right_sidebar_width', '30' );
		$left_sidebar_width = apply_filters( 'generate_left_sidebar_width', '30' );

		$right_sidebar_tablet_width = apply_filters( 'generate_right_sidebar_tablet_width', $right_sidebar_width );
		$left_sidebar_tablet_width = apply_filters( 'generate_left_sidebar_tablet_width', $left_sidebar_width );

		$classes[] = 'widget-area';
		$classes[] = 'grid-' . $right_sidebar_width;
		$classes[] = 'tablet-grid-' . $right_sidebar_tablet_width;
		$classes[] = 'grid-parent';
		$classes[] = 'sidebar';

		// Get the layout
		$layout = generate_get_layout();

		if ( '' !== $layout ) {
			switch ( $layout ) {
				case 'both-left' :
					$total_sidebar_width = $left_sidebar_width + $right_sidebar_width;
					$classes[] = 'pull-' . ( 100 - $total_sidebar_width );

					$total_sidebar_tablet_width = $left_sidebar_tablet_width + $right_sidebar_tablet_width;
					$classes[] = 'tablet-pull-' . ( 100 - $total_sidebar_tablet_width );
					break;
			}
		}

		return $classes;

	}
endif;

if ( ! function_exists( 'generate_add_footer_info' ) ) :
	add_action('generate_credits','generate_add_footer_info');
	function generate_add_footer_info() {}
endif;

if ( ! function_exists( 'generate_construct_site_title' ) ) :
	/**
	 * Build the site title and tagline
	 */
	function generate_construct_site_title()
	{
		$generate_settings = wp_parse_args(
			get_option( 'generate_settings', array() ),
			generate_get_defaults()
		);

		// Get the title and tagline
		$title = get_bloginfo( 'title' );
		$tagline = get_bloginfo( 'description' );

		// If the disable title checkbox is checked, or the title field is empty, return true
		$disable_title = ( '1' == $generate_settings[ 'hide_title' ] || '' == $title ) ? true : false;

		// If the disable tagline checkbox is checked, or the tagline field is empty, return true
		$disable_tagline = ( '1' == $generate_settings[ 'hide_tagline' ] || '' == $tagline ) ? true : false;

		// Site title and tagline
		if ( false == $disable_title || false == $disable_tagline ) : ?>
			<div class="site-branding">

				<div id="network-bar" class="info-bar-wrap"> <!-- was #info-bar -->
					<div class="info-bar-datestamp hidden-all">
						<span class="info-bar-datestamp-label">Last updated:</span>
						<strong class="info-bar-datestamp-date">October 29, 2016</strong>
					</div>
					<div class="login-wrap">
						<div class="newscdn-identity-component-ninbar" style="position: relative; width: 100%; height: 41px;"><iframe id="ncenvoy-component-cae982d80538b" name="ncenvoy-component-cae982d80538b" class="ncenvoy-identity ncenvoy-identity-ninbar" style="width: 100%; height: 100%;position: absolute;z-index: 10001;background:transparent;" allowtransparency="true" seamless="seamless" role="presentation" scrolling="no" frameborder="no"></iframe></div>
						<div class="homepage_mask"></div>
						<div class="aplus">
							<a href="https://theaustralianplus.com.au" class="aplus" target="_blank">APlus</a>
						</div>
					</div>

					<div class="network-bar-social">
						<ul class="network-bar-social-media-links">
							<li class="facebook"><a href="https://www.facebook.com/theaustralian" target="_blank">Facebook</a></li>
							<li class="twitter"><a href="https://twitter.com/australian" target="_blank">Twitter</a></li>
							<li class="instagram"><a href="https://www.instagram.com/the.australian/" target="_blank">Instagram</a></li>
						</ul>
					</div>
					<div class="network-bar-search">
						<div id="site-search">
							<form id="site-search__form" class="media-search-input gsc-search-box" action="/search-results">
								<label>
									<input type="text" class="gsc-input" name="q" title="search" autocomplete="off">
									<span class="gsc-search-button">
                            			<span class="btn visible-md"></span>
                            			<input class="visible-lg" type="button" form="site-search__form" value="Search" onclick="document.getElementById('site-search__form').submit(); return false;">
                    				</span>
								</label>
							</form>
						</div>
					</div>
				</div>

				<div id="header" class="clearfix life">
					<div id="header-logo">
						<div class="ad-ear ad-ear-left" id="header-ads-left" style="background-image: url(&quot;/wp-content/uploads/2018/12/Unlocked_Ear_L.jpg&quot;); cursor: pointer;">
							<div class="ad-block ad-custom" id="ad-block-8561785211-1" data-ad-width="157" data-ad-height="86" data-ad-tar="pos=1"></div>
						</div>
						<h1>
							<a id="header-vertical" href="/" title="The Australian">The Australian</a>
						</h1>
						<div class="ad-ear ad-ear-right" id="header-ads-right" style="background-image: url(&quot;/wp-content/uploads/2018/12/Unlocked_Ear_R.jpg&quot;); cursor: pointer;">
							<div class="ad-block ad-custom" data-ad-size="157x86" id="ad-block-8561785211-2" data-ad-tar="pos=2"></div>
						</div>
					</div>
				</div>
			</div>
		<?php endif;
	}
endif;

if ( ! function_exists( 'generate_excerpt_more' ) ) :
	/**
	 * Prints the read more HTML to post excerpts
	 */
	add_filter( 'excerpt_more', 'generate_excerpt_more' );
	function generate_excerpt_more( $more )
	{
		return '';
	}
endif;

if ( ! function_exists( 'generate_post_image' ) ) :
	/**
	 * Prints the Post Image to post excerpts
	 */
	add_action( 'generate_after_entry_header', 'generate_post_image' );
	function generate_post_image()
	{
		// If there's no featured image, return
		if ( ! has_post_thumbnail() )
			return;

		// If we're not on any single post/page or the 404 template, we must be showing excerpts
		if ( ! is_singular('post') && ! is_404() ) {
			?>
			<div class="post-image">
				<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( apply_filters( 'generate_page_header_default_size', 'thumbnail' ), array('itemprop' => 'image') ); ?></a>
			</div>
			<?php
		}
	}
endif;

if ( ! function_exists( 'generate_content_nav' ) ) :
	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function generate_content_nav( $nav_id ) {

		return '';
	}
endif; // generate_content_nav