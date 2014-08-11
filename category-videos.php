<?php get_header(); ?>

    <div class="row">
      <?php
        /*
          category SIDEBAR
        */
        get_sidebar( 'category' );
      ?>

      <section class="nav-posts large-12 medium-16 small-16 columns">
        <header class="small-16 left">
          <h2 class="text-upp left"><span class="icon-video"></span> <?php echo single_cat_title(); ?></h2>
        </header>

        <nav class="list-posts small-16 left">
          <ul class="small-block-grid-2 large-block-grid-4 medium-block-grid-3 video-list">
            <?php if (have_posts()) : while (have_posts()) : the_post(); global $post; ?>
            <li>
              <article class="small-16 left">
                <time class="grey small-16 left"><small><?php the_time('d \d\e F \d\e Y') ?></small></time>
                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" data-reveal-id="video-modal" data-postid="<?php echo $post->ID; ?>"><?php the_title(); ?></a></h3>
                <figure class="small-16 left">
                  <a href="<?php the_permalink(); ?>" class="display-block left small-16 post-thumb" data-reveal-id="video-modal" data-postid="<?php echo $post->ID; ?>">
                    <?php
                      if(has_post_thumbnail()) {
                        the_post_thumbnail( 'category-thumb' );
                      } else {
                        echo '<img src="'. get_template_directory_uri() .'/images/no-thumb-news.jpg">';
                      }
                    ?>
                  </a>
                  <figcaption class="left small-16">
                    <a href="<?php the_permalink(); ?>" title="" class="grey" data-reveal-id="video-modal" data-postid="<?php echo $post->ID; ?>"><?php get_excerpt(100); ?></a>

                    <div class="share-post small-16 left">
                      <div class="fb-share-button left" data-href="<?php the_permalink(); ?>" data-type="button_count"></div>
                      <a href="<?php the_permalink(); ?>" class="twitter-share-button left" data-lang="en">Tweet</a>
                    </div>
                  </figcaption>
                </figure>
              </article>
            </li>
            <?php endwhile; else: ?>
              <li> <?php _e('Este post não foi encontrado.'); ?> </li>
            <?php endif; ?>
          </ul>
        </nav>
        
        <div class="pagination-centered">
        <?php
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $wp_query->max_num_pages,
          'next_text'    => '&raquo;',
          'prev_text'    => '&laquo;',
          'type'         => 'list',
        ) );
        ?>
        </div><!-- //paginação -->
        
        <div id="video-modal" class="reveal-modal" data-reveal>
          <div class="ajax-loader small-16 left text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/ajax-loader.gif" alt="">
          </div>
          <div class="flex-video"></div>
          <a class="close-reveal-modal">&#215;</a>
        </div>
      </section> 
      
      <section class="hide-sidebar small-16 columns hide-for-large-up"></section><!-- //conteudo clonado -->
    </div>

    <?php echo get_footer(); ?>