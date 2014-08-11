<?php get_header(); ?>

    <div class="row">
      <?php
        /*
          Single SIDEBAR
        */
        get_sidebar( 'single' );
      ?>

      <article class="large-12 medium-16 small-16 columns post-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); global $post; ?>
        <header class="post-title small-16 left">
          <h2 class="red text-upp"><?php the_title(); ?></h2>
          <span class="small-16 left text-center">
            <time class="left grey" pubdate>
              <small><?php the_time('d \d\e F \d\e Y') ?></small>
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
          <?php the_content(); ?>
        </section><!-- //conteudo -->
        
        <?php  $terms = get_the_terms( $post->ID, 'colunistas' ); ?>
        <footer class="columnist-about small-16 left">
          <header class="small-16 left">
            <h4 class="grey">Escrito por:</h4>
          </header>
          
          <figure class="small-16 left">
            <a href="<?php echo custom_taxonomies_terms_links_only(); ?>" class="display-block columnist-single-thumb left" style="background-image: url(<?php echo voice_avatar(); ?>);"></a>
            <figcaption class="large-13 medium-13 small-10 columns">
              <h4 class="small-16 left columnist-name"><?php  foreach ( $terms as $term ) { echo $term->name; } ?></h4>
              <p class="grey"><?php echo custom_term_description(); ?></p>
            </figcaption>
          </figure>

          <?php endwhile; else: ?>
          <section class="small-16 left the-content">
            <p> <?php _e('Este post não foi encontrado.'); ?> </p>
          </section>
          <?php endif; ?>

          <nav class="last-columns small-16 left">
            <header class="small-16 left">
              <h4 class="grey">Mais colunas de <?php  foreach ( $terms as $term ) { echo $term->name; } ?></h4>
            </header>
            <ul class="large-block-grid-4 medium-block-grid-2 small-block-grid-2">
            <?php 
                $backup = $post;  // backup the current object
                $found_none = "<li>Sem colunas anteriores</li>";
                $taxonomy = 'colunistas';//  e.g. post_tag, category, custom taxonomy
                $param_type = 'colunistas'; //  e.g. tag__in, category__in, but genre__in will NOT work
                $post_types = get_post_types( array('public' => true), 'names' );
                $tax_args=array('orderby' => 'none');
                $tags = wp_get_post_terms( $post->ID , $taxonomy, $tax_args);
                if ($tags) {
                    foreach ($tags as $tag) {
                      $args=array(
                          "$param_type" => $tag->slug,
                          'post__not_in' => array($post->ID),
                          'post_type' => $post_types,
                          'showposts'=>5,
                          'caller_get_posts'=>1
                      );
                    $my_query = null;
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                          <li>
                            <span class="grey"><?php the_time('d \d\e F \d\e Y') ?></span>
                            <p><a href="<?php the_permalink(); ?>" class="" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
                          </li>
                        <?php $found_none = '';
                        endwhile;
                    }    
                  }
              }
              if ($found_none) {
                echo $found_none;
              } 
              $post = $backup;  // copy it back
              wp_reset_query(); // to use the original query again
            ?>  
            </ul>
          </nav>
        </footer>
      </article><!-- //post -->

      <section id="comments-section" class="large-12 medium-16 small-16 columns">
        <header class="small-16 left">
          <h4 class="grey">Deixe um comentario</h4>
        </header>

        <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="20" data-colorscheme="light"></div>
      </section>
      
      <section class="hide-sidebar small-16 columns hide-for-large-up"></section><!-- //conteudo clonado -->
    </div>

<?php get_footer(); ?>