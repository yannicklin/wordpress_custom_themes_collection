        </main>

        <footer>
            <div class="footer-max-width-container footer-layout-root">
                <img
                        src="<?php the_field('footer_logo', 'option') ?>"
                        alt=""
                        role="presentation"
                        class="logo"
                >
                <ul class="menu primary-menu">
		            <?php wp_nav_menu( array(
			            'theme_location' => 'footer_primary',
			            'container'      => false,
			            'items_wrap'     => '%3$s', // removes the <ul> from the menu as we're using our own markup
		            ) ); ?>
                </ul>
                <ul class="menu secondary-menu">
		            <?php wp_nav_menu( array(
			            'theme_location' => 'footer_secondary',
			            'container'      => false,
			            'items_wrap'     => '%3$s', // removes the <ul> from the menu as we're using our own markup
		            ) ); ?>
                </ul>
                <div class="social-links">
                    <h3 class="title">Follow us on...</h3>
                    <ul class="links">
                        <li class="link-item">
                            <a
                                href="<?php the_field('facebook_page', 'option'); ?>"
                                class="link">
                                <img class="icon" src="<?php echo get_theme_file_uri('src/images/facebook-icon.png'); ?>" alt="" role="presentation">
                                <span class="visually-hidden">Facebook</span>
                            </a>
                        </li>
                        <li class="link-item">
                            <a
                                href="<?php the_field('twitter_page', 'option'); ?>"
                                class="link">
                                <img class="icon" src="<?php echo get_theme_file_uri('src/images/twitter-icon.png'); ?>" alt="" role="presentation">
                                <span class="visually-hidden">Twitter</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php /*<div class="newsletter-signup">
                    <h3 class="title">
                        Subscribe to our newsletter...
                    </h3>
                    <?php echo do_shortcode('[email-subscribers namefield="NO" desc="" group="Public"]'); ?>
                </div>*/ ?>
                <img
                    class="charity-register-logo"
                    src="<?php the_field('charity_register_logo', 'option'); ?>"
                    alt="We are a registered charity"
                >
            </div>
        </footer>

        <p class="copyright-notice">
            &copy;
            <?php bloginfo('name'); ?>
            <?php echo date('Y'); ?>
        </p>

        <?php wp_footer(); ?>

        </div><?php /* .site-container */ ?>
    </body>
</html>