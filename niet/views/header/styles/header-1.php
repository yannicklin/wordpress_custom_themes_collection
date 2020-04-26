<?php 
/**
 * template part for Header. views/header/styles
 *
 * @author      Artbees
 * @package     jupiter/views
 * @version     5.0.0
 */
global $mk_options;

    /*
    * These options comes from header shortcode and will only be used to override the header options through shortcode.
    */
    $header_class = array(
        'sh_id' => isset($view_params['id']) ? $view_params['id'] : Mk_Static_Files::shortcode_id(),
        'is_shortcode' => isset($view_params['is_shortcode']) ? $view_params['is_shortcode'] : false,
        'sh_toolbar' => isset($view_params['toolbar']) ? esc_attr( $view_params['toolbar'] ) : '',
        'sh_is_transparent' => isset($view_params['is_transparent']) ? $view_params['is_transparent'] : '',
        'sh_header_style' => isset($view_params['header_styles']) ? esc_attr( $view_params['header_styles'] ) : '',
        'sh_header_align' => isset($view_params['header_align']) ? esc_attr( $view_params['header_align'] ) : '',
        'sh_hover_styles' => isset($view_params['hover_styles']) ? esc_attr( $view_params['hover_styles'] ) : esc_attr( $mk_options['main_nav_hover'] ),
        'el_class' => isset($view_params['el_class']) ? esc_attr( $view_params['el_class'] ) : '',
    );
    
    $is_transparent = (isset($view_params['is_transparent'])) ? ($view_params['is_transparent'] == 'false' ? false : is_header_transparent()) : is_header_transparent();
    $is_shortcode = $header_class['is_shortcode'];
    $menu_location = isset($view_params['menu_location']) ? esc_attr( $view_params['menu_location'] ) : '';
    
    $show_logo = isset($view_params['logo']) ? $view_params['logo'] : false;
    $seconday_show_logo = isset($view_params['burger_icon']) ? $view_params['burger_icon'] : false;
    $show_cart = isset($view_params['woo_cart']) ? $view_params['woo_cart'] : false;
    $search_icon = isset($view_params['search_icon']) ? $view_params['search_icon'] : false;

?> 
<?php if(is_header_and_title_show($is_shortcode)) : ?>
    <header <?php echo get_header_json_data($is_shortcode, $header_class['sh_header_style']); ?> <?php echo mk_get_header_class($header_class); ?> <?php echo get_schema_markup('header'); ?>>
        <?php if (is_header_show($is_shortcode)): ?>
            <div class="mk-header-holder">
                <?php mk_get_header_view('holders', 'toolbar', ['is_shortcode' => $is_shortcode]); ?>
                <div class="mk-header-inner add-header-height">

                    <div class="mk-header-bg <?php echo mk_get_bg_cover_class($mk_options['header_size']); ?>"></div>

                    <?php if (is_header_toolbar_show($is_shortcode) == 'true') { ?>
                        <div class="mk-toolbar-resposnive-icon"><?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-icon-chevron-down'); ?></div>
                    <?php } ?>

                    <?php if($mk_options['header_grid'] == 'true'){ ?>
                            <div class="mk-grid header-grid">
								
                    <?php } ?>
 
                            <div class="mk-header-nav-container one-row-style menu-hover-style-<?php echo esc_attr( $header_class['sh_hover_styles'] ); ?>" 
                               
                               <?php echo get_schema_markup('nav'); ?>
								<div class="abovenav"><div class="abovenav"><span class="left"><?php get_search_form(); ?></span><span class="right"><div id="social-581b141b0ce3e" class="align-left">
									<a href="https://www.facebook.com/nietcourse/" rel="nofollow" class="builtin-icons light medium facebook-hover" target="_blank" alt="Follow Us on facebook" title="Follow Us on facebook"><svg class="mk-svg-icon" data-name="mk-jupiter-icon-facebook" data-cacheid="icon-581b141b0d74a" style=" height:24px; width: 24px; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256-6.4c-141.385 0-256 114.615-256 256s114.615 256 256 256 256-114.615 256-256-114.615-256-256-256zm64.057 159.299h-49.041c-7.42 0-14.918 7.452-14.918 12.99v19.487h63.723c-2.081 28.41-6.407 64.679-6.407 64.679h-57.566v159.545h-63.929v-159.545h-32.756v-64.474h32.756v-33.53c0-8.098-1.706-62.336 70.46-62.336h57.678v63.183z"/></svg></a>
									<a href="https://www.linkedin.com/company/niet-national-institute-of-education-and-technology" rel="nofollow" class="builtin-icons light medium linkedin-hover" target="_blank" alt="Follow Us on linkedin" title="Follow Us on linkedin"><svg class="mk-svg-icon" data-name="mk-jupiter-icon-linkedin" data-cacheid="icon-581b141b0dbe5" style=" height:24px; width: 24px; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256-6.4c-141.385 0-256 114.615-256 256s114.615 256 256 256 256-114.615 256-256-114.615-256-256-256zm-96.612 95.448c19.722 0 31.845 13.952 32.215 32.284 0 17.943-12.492 32.311-32.592 32.311h-.389c-19.308 0-31.842-14.368-31.842-32.311 0-18.332 12.897-32.284 32.609-32.284zm32.685 288.552h-64.073v-192h64.073v192zm223.927-.089h-63.77v-97.087c0-27.506-11.119-46.257-34.797-46.257-18.092 0-22.348 12.656-27.075 24.868-1.724 4.382-2.165 10.468-2.165 16.583v101.892h-64.193s.881-173.01 0-192.221h57.693v.31h6.469v19.407c9.562-12.087 25.015-24.527 52.495-24.527 43.069 0 75.344 29.25 75.344 92.077v104.954z"/></svg></a>
									<a href="https://www.instagram.com/nietsales/" rel="nofollow" class="builtin-icons light medium instagram-hover" target="_blank" alt="Follow Us on instagram" title="Follow Us on instagram"><svg class="mk-svg-icon" data-name="mk-jupiter-icon-instagram" data-cacheid="icon-58ea1296b5f8b" style=" height:24px; width: 24px; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 297.6c27.2 0 48-20.8 48-48s-20.8-48-48-48-48 20.8-48 48 20.8 48 48 48zm80-48c0 44.8-35.2 80-80 80s-80-35.2-80-80c0-8 0-12.8 3.2-19.2h-19.2v107.2c0 4.8 3.2 9.6 9.6 9.6h174.4c4.8 0 9.6-3.2 9.6-9.6v-107.2h-19.2c1.6 6.4 1.6 11.2 1.6 19.2zm-22.4-48h28.8c4.8 0 9.6-3.2 9.6-9.6v-28.8c0-4.8-3.2-9.6-9.6-9.6h-28.8c-4.8 0-9.6 3.2-9.6 9.6v28.8c0 6.4 3.2 9.6 9.6 9.6zm-57.6-208c-140.8 0-256 115.2-256 256s115.2 256 256 256 256-115.2 256-256-115.2-256-256-256zm128 355.2c0 16-12.8 28.8-28.8 28.8h-198.4c-9.6 0-28.8-12.8-28.8-28.8v-198.4c0-16 12.8-28.8 28.8-28.8h196.8c16 0 28.8 12.8 28.8 28.8v198.4z"></path></svg></a>
									<a href="https://twitter.com/NIET_AUS" rel="nofollow" class="builtin-icons light medium twitter-hover" target="_blank" alt="Follow Us on twitter" title="Follow Us on twitter"><svg class="mk-svg-icon" data-name="mk-jupiter-icon-twitter" data-cacheid="icon-581b141b0e08c" style=" height:24px; width: 24px; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256-6.4c-141.385 0-256 114.615-256 256s114.615 256 256 256 256-114.615 256-256-114.615-256-256-256zm146.24 258.654c-31.365 127.03-241.727 180.909-338.503 49.042 37.069 35.371 101.619 38.47 142.554-3.819-24.006 3.51-41.47-20.021-11.978-32.755-26.523 2.923-41.27-11.201-47.317-23.174 6.218-6.511 13.079-9.531 26.344-10.407-29.04-6.851-39.751-21.057-43.046-38.284 8.066-1.921 18.149-3.578 23.656-2.836-25.431-13.295-34.274-33.291-32.875-48.326 45.438 16.866 74.396 30.414 98.613 43.411 8.626 4.591 18.252 12.888 29.107 23.393 13.835-36.534 30.915-74.19 60.169-92.874-.493 4.236-2.758 8.179-5.764 11.406 8.298-7.535 19.072-12.719 30.027-14.216-1.257 8.22-13.105 12.847-20.249 15.539 5.414-1.688 34.209-14.531 37.348-7.216 3.705 8.328-19.867 12.147-23.872 13.593-2.985 1.004-5.992 2.105-8.936 3.299 36.492-3.634 71.317 26.456 81.489 63.809.719 2.687 1.44 5.672 2.1 8.801 13.341 4.978 37.521-.231 45.313-5.023-5.63 13.315-20.268 23.121-41.865 24.912 10.407 4.324 30.018 6.691 43.544 4.396-8.563 9.193-22.379 17.527-45.859 17.329z"/></svg></a>
									<a href="https://youtube.com" rel="nofollow" class="builtin-icons light medium youtube-hover" target="_blank" alt="Follow Us on youtube" title="Follow Us on youtube"><svg class="mk-svg-icon" data-name="mk-jupiter-icon-youtube" data-cacheid="icon-583dec15617bd" style=" height:24px; width: 24px; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M202.48 284.307v-14.152l-56.999-.098v13.924l17.791.053v95.84h17.835l-.013-95.567h21.386zm24.889 65.266c0 7.385.448 11.076-.017 12.377-1.446 3.965-7.964 8.156-10.513.43-.427-1.353-.049-5.44-.049-12.447l-.07-51.394h-17.734l.053 50.578c.022 7.752-.172 13.537.061 16.164.44 4.644.286 10.049 4.584 13.133 8.026 5.793 23.391-.861 27.24-9.123l-.04 10.547 14.319.019v-81.318h-17.835v51.035zm46.259-47.854l.062-31.592-17.809.035-.089 109.006 14.645-.219 1.335-6.785c18.715 17.166 30.485 5.404 30.458-15.174l-.035-42.49c-.017-16.183-12.129-25.887-28.567-12.781zm15.364 58.35c0 3.524-3.515 6.39-7.805 6.39s-7.797-2.867-7.797-6.39v-47.695c0-3.526 3.507-6.408 7.797-6.408 4.289 0 7.805 2.883 7.805 6.408v47.695zm-36.294-164.046c4.343 0 7.876-3.912 7.876-8.698v-44.983c0-4.778-3.532-8.684-7.876-8.684-4.338 0-7.903 3.906-7.903 8.684v44.984c0 4.786 3.565 8.698 7.903 8.698zm3.302-202.423c-141.385 0-256 114.615-256 256s114.615 256 256 256 256-114.615 256-256-114.615-256-256-256zm31.394 129.297h16.34v65.764c0 3.564 2.935 6.473 6.505 6.473 3.586 0 6.512-2.909 6.512-6.473v-65.764h15.649v84.5h-19.866l.334-6.996c-1.354 2.844-3.024 4.971-5.001 6.399-1.988 1.433-4.255 2.127-6.83 2.127-2.928 0-5.381-.681-7.297-2.026-1.933-1.366-3.366-3.178-4.29-5.418-.915-2.26-1.476-4.602-1.705-7.037-.219-2.457-.351-7.295-.351-14.556v-56.991zm-48.83.883c3.511-2.769 8.003-4.158 13.471-4.158 4.592 0 8.539.901 11.826 2.673 3.305 1.771 5.854 4.083 7.631 6.931 1.801 2.856 3.022 5.793 3.673 8.799.66 3.046.994 7.643.994 13.836v21.369c0 7.84-.317 13.606-.923 17.267-.599 3.67-1.908 7.072-3.912 10.272-1.988 3.156-4.544 5.52-7.647 7.028-3.137 1.516-6.733 2.259-10.786 2.259-4.531 0-8.341-.619-11.488-1.933-3.156-1.292-5.59-3.261-7.331-5.858-1.754-2.594-2.985-5.772-3.727-9.468-.756-3.7-1.113-9.26-1.113-16.666v-22.371c0-8.113.685-14.446 2.026-19.012 1.345-4.549 3.78-8.211 7.305-10.966zm-52.06-34.18l11.946 41.353 11.77-41.239h20.512l-22.16 55.523-.023 64.81h-18.736l-.031-64.788-23.566-55.659h20.287zm197.528 280.428c0 21.764-18.882 39.572-41.947 39.572h-172.476c-23.078 0-41.951-17.808-41.951-39.572v-90.733c0-21.755 18.873-39.573 41.951-39.573h172.476c23.065 0 41.947 17.819 41.947 39.573v90.733zm-39.38-18.602l-.034 1.803v7.453c0 4-3.297 7.244-7.298 7.244h-2.619c-4.015 0-7.313-3.244-7.313-7.244v-19.61h30.617v-11.515c0-8.42-.229-16.832-.924-21.651-2.188-15.224-23.549-17.64-34.353-9.853-3.384 2.435-5.978 5.695-7.478 10.074-1.522 4.377-2.269 10.363-2.269 17.967v25.317c0 42.113 51.14 36.162 45.041-.053l-13.37.068zm-16.947-34.244c0-4.361 3.586-7.922 7.964-7.922h1.063c4.394 0 7.981 3.56 7.981 7.922l-.192 9.81h-16.887l.072-9.81z"/></svg></a></div></span></div>  <?php
                                mk_get_header_view('master', 'main-nav', ['menu_location' => $menu_location, 'logo_middle' => $mk_options['logo_in_middle']]);
                                
                                if($search_icon != 'false') { 
                                    mk_get_header_view('global', 'nav-side-search', ['header_style' => 1]);
                                }
                                if($show_cart != 'false') { 
                                    mk_get_header_view('master', 'checkout', ['header_style' => 1]);
                                }
                                if($seconday_show_logo != 'false') {
                                    mk_get_header_view('global', 'secondary-menu-burger-icon', ['is_shortcode' => $is_shortcode, 'header_style' => 1]);
                                }
                                ?>
                            </div>
                            <?php    
                                mk_get_header_view('global', 'main-menu-burger-icon', ['header_style' => 1]);                            
                                if($show_logo != 'false') { 
                                    mk_get_header_view('master', 'logo');
                                }
                            ?>

                    <?php if($mk_options['header_grid'] == 'true'){ ?>
                        </div>
                    <?php } ?>

                    <div class="mk-header-right">
                       
                    </div>

                </div>
                <?php mk_get_header_view('global', 'responsive-menu', ['menu_location' => $menu_location, 'is_shortcode' => $is_shortcode]); ?>        
            </div>
        <?php endif;// End for option to disable header ?>

        <?php mk_get_header_view('global', 'header-sticky-padding', ['is_shortcode' => $is_shortcode]); ?>
        <?php if(!$is_transparent) mk_get_view('layout', 'title', false, ['is_shortcode' => $is_shortcode]); ?>
        
    </header>
<?php endif; // End to disale whole header