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
              <h4 class="text-upp red left">Últimas Notícias</h4>  
              <div class="line-red abs"></div>
            </header>

            <ul class="no-bullet">
              <?php     
                query_posts('showposts=5'); 
                if (have_posts()): while (have_posts()) : the_post();
              ?>
              <li>
                <h6 class="font-lato"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
              </li>
              <?php endwhile; else: endif; wp_reset_query(); ?>
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