      <aside id="sidebar" class="large-4 columns right">

        <form action="<?php bloginfo('home'); ?>/" class="form-search small-16 left" method="get">
          <div class="search-container small-16 left">
            <input type="text" placeholder="O que você procura?" class="search-text" name="s" id="s">
            <input type="submit" value="" class="display-block search-submit icon-search">
          </div>
        </form><!-- //busca -->

        <nav class="list-news show-for-large-up small-16 left">
          <div class="sidebar-news small-16 left">
            <header class="small-16 left widget-header">
              <h4 class="text-upp red left">Mais lidas</h4>  
              <div class="line-red abs"></div>
            </header>

            <ul class="no-bullet list-popular">
              <?php 
                  $cat_name = single_cat_title( '', false );
                  $cat = get_cat_ID( $cat_name );
                  if (function_exists('wpp_get_mostpopular')) wpp_get_mostpopular(array(
                      "wpp_start" => '<ul class="no-bullet popular small-16 left">',
                      "wpp_end" => "</ul>",
                      "range" => "monthly",
                      "order_by"=> "views",
                      "limit" => 3,
                      "stats_views" => 0,
                      "stats_comments" => 0,
                      "post_type" => "post",
                      "cat" => $cat,
                      "post_html" => "<li><span class=\"display-block small-2 left\"></span><h6 class=\"font-lato small-14 left\"><a href='{url}' title='{text_title}'>{text_title}</a></h6></li>"
                  ));
              ?>
            </ul>
          </div>
        </nav><!-- //ultimas noticias -->
        
        <div class="show-for-large-up">
        <?php
          /*
            ULTIMAS NOTICIAS
          */
          include_once 'includes/servicos.php';
        ?>
        </div>

        <section class="small-16 show-for-large-up left vote-form">
          <div class="vote-section small-16 left">
          <header class="small-16 left widget-header">
            <h4 class="text-upp red left">Enquete</h4>  
            <div class="line-red abs"></div>
          </header>
          <ul class="no-bullet">  
            <li><?php get_poll();?></li>  
          </ul>  
          </div>
        </section><!-- //enquetes -->

        <section class="small-16 left show-for-large-up">

          <header class="small-16 left widget-header">
            <h4 class="text-upp red left">Siga nosso Facebook</h4>  
            <div class="line-red abs"></div>
          </header>
          <?php
            $fb = get_option('nt_fb');
          ?>
          <div class="fb-like-box" data-href="<?php echo $fb; ?>" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
        </section><!-- //like box -->

      </aside><!-- //sidebar -->