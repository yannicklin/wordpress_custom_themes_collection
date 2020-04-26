<?php
$page = get_queried_object();
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="VfIhLfi6dTdqNqPenjulPEjVhKVoyFTsGGIhBkOG_U8" />
	<meta name="msvalidate.01" content="6EC952A5D4EDCC4985A8FB51BAB6A322" />
	<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PJJSJFL');</script>
<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJJSJFL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="site-container">

    <header class="site-header">
        <a class="site-brand" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"
           rel="home"><?php bloginfo( 'name' ); ?></a>

        <ul class="menu" data-dropdown-menu>
            <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '%3$s', // removes the <ul> from the menu as we're using our own markup
            ) ); ?>
        </ul>
    </header>

    <main class="site-content">