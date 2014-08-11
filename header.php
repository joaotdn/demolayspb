<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/vnd.microsoft.icon"/>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-ico"/>

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700|Homenaje' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.1/modernizr.min.js"></script>

    <script>
      //<![CDATA[
      var getData = {
        'urlDir':'<?php bloginfo('template_directory'); ?>/',
        'ajaxDir':'<?php echo stripslashes(get_admin_url()).'admin-ajax.php'; ?>'
      }
      //]]>
    </script>

    <?php wp_head(); ?>
  </head>
  <body>

    <div class="wrapper top-menu">
      <div class="row">
        
        <a href="#" class="button-menu radius left text-upp hide-for-large-up" data-dropdown="menu-mobile"><span class="icon-menu"></span> Menu</a>
        
        <ul id="menu-mobile" class="f-dropdown" data-dropdown-content>
        </ul><!-- //menu mobile -->

        <nav class="large-4 small-6 columns right">
          <ul class="inline-list right">
            <li><a href="http://webmail.demolaypb.org.br/" target="_blank" class="white">Webmail</a></li>
            <li><a href="<?php echo esc_url( home_url( '/wp-admin' ) ); ?>" class="white"><span class="display-block icon-lock2"></span></a></li>
          </ul>
        </nav>
      </div><!-- //row -->
    </div><!-- //top bar -->

    <div class="wrapper top-site">
      <div id="header" class="row">

        <figure class="logo large-6 medium-6 small-16 columns">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="icon-logo show-for-medium-up display-block" title="Página principal"></a>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="icon-logo-mo hide-for-medium-up centered display-block" title="Página principal"></a>
        </figure><!-- //logo -->

        <header class="small-8 columns right show-for-medium-up">
          <h5 class="text-right text-italic grey">Fundada em 18 de Dezembro de 2004</h5>
          <p class="text-right text-italic grey">Federado ao Supremo Conselho da Ordem DeMolay para a República Federativa do Brasil</p>
        </header>

        <nav class="small-10 columns show-for-large-up">
          <ul class="inline-list right main-menu">
            <?php

              $defaults = array(
                'theme_location'  => '',
                'menu'            => 'Menu principal',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => '',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'walker'          => ''
              );

              wp_nav_menu( $defaults );

            ?>
          </ul>
        </nav><!-- //menu principal -->

      </div><!-- //row -->
    </div><!-- //header -->
