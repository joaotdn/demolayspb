<?php get_header(); ?>

    <div class="row">
      <?php
        /*
          Single SIDEBAR
        */
        get_sidebar( 'single' );
      ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); global $post; ?>
      <article class="large-12 medium-16 small-16 columns post-content">
        <header class="post-title small-16 left">
          <h2 class="red text-upp"><?php the_title(); ?></h2>
          <span class="small-16 left text-center">
            <time class="left grey" pubdate>
              <small><?php the_time('d \d\e F \d\e Y') ?> | <span class="text-upp">Publicado por: </span><?php the_author(); ?></small>
            </time>

            <a href="#comments-section" class="right display-block grey">
              <span class="display-block icon-chat left"></span>
              <span class="left comment-anchor show-for-medium-up">Comentar</span>
            </a>
          </span>

          <span class="small-16 left share-bar">
            <div class="fb-share-button left" data-href="<?php the_permalink(); ?>" data-type="button_count"></div>
            <a href="https://twitter.com/share" class="twitter-share-button left" data-lang="en">Tweet</a>

            <?php if(function_exists('wp_print')) { print_link(); } ?>
          </span>
        </header>

        <section class="small-16 left the-content">
         
          <div class="panel callout radius">
            <h3 class="red margin-bottom">Informações sobre o evento</h3>
             <h4 class="grey"><span class="red">Data:</span> <?php echo get_field('data_evento',$post->ID) ?></h4>
             <h4 class="grey"><span class="red">Cidade:</span> <?php echo get_field('cidade_evento',$post->ID) ?></h4>
             <h4 class="grey"><span class="red">Local:</span> <?php echo get_field('local_evento',$post->ID) ?></h4>
             <h4 class="grey"><span class="red">Horário:</span> <?php echo get_field('horario_evento',$post->ID) ?></h4>
          </div>

          <?php the_content(); ?>
        </section><!-- //conteudo -->
      </article><!-- //post -->
      <?php endwhile; else: ?>
        <article class="large-12 medium-16 small-16 columns post-content">
          <p> <?php _e('Este post não foi encontrado.'); ?> </p>
        </article>
      <?php endif; ?>

      <section id="comments-section" class="large-12 medium-16 small-16 columns">
        <header class="small-16 left">
          <h4 class="grey">Deixe um comentario</h4>
        </header>

        <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="20" data-colorscheme="light"></div>
      </section>
      
      <section class="hide-sidebar small-16 columns hide-for-large-up"></section><!-- //conteudo clonado -->
    </div>

<?php get_footer(); ?>