    <aside id="sidebar" class="small-16 medium-16 large-4 columns right">

        <form action="<?php bloginfo('home'); ?>/" class="form-search small-16 left" method="get">
          <div class="search-container small-16 left">
            <input type="text" placeholder="O que você procura?" class="search-text" name="s" id="s">
            <input type="submit" value="" class="display-block search-submit icon-search">
          </div>
        </form><!-- //busca -->
        
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