    <section class="small-16 left dm-galleries">
      <div class="row">
        <div class="small-16 columns">
          <header class="small-16 left widget-header">
            <h4 class="text-upp red left">Últimos eventos</h4>  
            <div class="line-red abs"></div>
          </header>
        </div>
      </div><!-- //row -->
      
      <ul class="large-block-grid-6 medium-block-grid-3 small-block-grid-3 list-events">
        <?php      
          query_posts('showposts=12&category_name=eventos'); 
          if (have_posts()): while (have_posts()) : the_post();
        ?>
        <li>
          <figure class="rel event-thumb small-16 left">
            <a href="<?php the_permalink(); ?>" class="display-block small-16 left">
              <?php
                if(has_post_thumbnail()) {
                  the_post_thumbnail( 'news-thumb' );
                } else {
                  echo '<img src="'. get_template_directory_uri() .'/images/no-thumb-news.jpg">';
                }
              ?>
            </a>
            <figcaption class="small-16 abs">
              <time><small><?php the_time('d/m/Y') ?></small></time>
              <h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
            </figcaption>
          </figure>
        </li>
        <?php endwhile; else: endif; wp_reset_query(); ?>
      </ul>
    </section><!-- //ultimos eventos -->

    <footer id="footer" class="small-16 left">
      <div class="row">
        <nav class="large-7 columns footer-menu">
          <ul class="inline-list">
            <?php

              $defaults = array(
                'theme_location'  => '',
                'menu'            => 'Menu rodape',
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
        </nav>

        <section class="large-4 columns right newsletter">
          <header class="small-16 left">
            <p class="white text-upp">Cadastre-se em nossa Newsletter</p>
          </header>
          <div class="widget_wysija_cont html_wysija"><div id="msg-form-wysija-html53e7e7c3765fd-1" class="wysija-msg ajax"></div>
          <form id="form-wysija-html53e7e7c3765fd-1" method="post" action="#wysija" class="small-16 left widget_wysija html_wysija">
            <div class="small-16 left collapse">
              <div class="small-12 left">
                <input type="email" placeholder="Digite seu e-mail" name="wysija[user][email]" class="wysija-input validate[required,custom[email]]" title="Email">
              </div>
              <div class="small-4 left">
                <input type="submit" value="Enviar" class="button-submit wysija-submit wysija-submit-field">
              </div> 
            </div>
            <input type="hidden" name="form_id" value="1" />
            <input type="hidden" name="action" value="save" />
            <input type="hidden" name="controller" value="subscribers" />
            <input type="hidden" value="1" name="wysija-page" />
            <input type="hidden" name="wysija[user_list][list_ids]" value="1" />
          </form>
        </section>

        <section class="small-16 columns credits">
          <div class="large-8 left">
            <p class="grey">Grande Conselho Estadual Nº4 da Ordem Demolay da Paraíba</p>
            <p class="grey">Copyright &copy; <?php echo date('Y',time()) ?>. Todos os direitos reservados.</p>
          </div>

          <div class="large-8 right">
            <p class="text-right grey"><small>Design: <a href="https://www.facebook.com/spacodesign" class="grey" target="_blank">Junior Maciel</a>/Código: <a href="http://about.me/jteodoro" class="grey" target="_blank">Joao Teodoro</a></small></p>
          </div>
        </section>
      </div>
    </footer>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts.js"></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=285518124940152&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <!--START Scripts : this is the script part you can add to the header of your theme-->
    <script type="text/javascript" src="http://demolaypb.org.br/wp-includes/js/jquery/jquery.js?ver=2.6.10"></script>
    <script type="text/javascript" src="http://demolaypb.org.br/wp-content/plugins/wysija-newsletters/js/validate/languages/jquery.validationEngine-pt.js?ver=2.6.10"></script>
    <script type="text/javascript" src="http://demolaypb.org.br/wp-content/plugins/wysija-newsletters/js/validate/jquery.validationEngine.js?ver=2.6.10"></script>
    <script type="text/javascript" src="http://demolaypb.org.br/wp-content/plugins/wysija-newsletters/js/front-subscribers.js?ver=2.6.10"></script>
    <script type="text/javascript">
      /* <![CDATA[ */
      var wysijaAJAX = {"action":"wysija_ajax","controller":"subscribers","ajaxurl":"http://demolaypb.org.br/wp-admin/admin-ajax.php","loadingTrans":"Carregando..."};
      /* ]]> */
    </script>
    <script type="text/javascript" src="http://demolaypb.org.br/wp-content/plugins/wysija-newsletters/js/front-subscribers.js?ver=2.6.10"></script>
    <!--END Scripts-->
    <?php wp_footer(); ?>
  </body>
</html>