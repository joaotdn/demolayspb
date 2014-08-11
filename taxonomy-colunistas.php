<?php get_header(); ?>

    <div class="row">
      <?php
        /*
          category SIDEBAR
        */
        get_sidebar( 'colunas' );
      ?>

      <section class="nav-posts large-12 medium-16 small-16 columns">
        <header class="small-16 left">
          <h2 class="text-upp left"><span class="icon-user"></span> <?php echo single_cat_title(); ?></h2>

          <div class="right choose-view show-for-medium-up">
            <a href="#" class="display-block grid-cat icon-grid left"></a>
            <a href="#" class="display-block list-cat icon-list-red left"></a>
          </div>
        </header>

        <section class="panel small-16 left">
          <a href="<?php echo custom_taxonomies_terms_links_only(); ?>" title="<?php echo custom_taxonomies_terms_names(); ?>" class="small-4 medium-2 large-2 left show-for-medium-up">
              <img src="<?php echo voice_avatar(); ?>" alt="" class="th">
            </a>

            <p class="small-16 large-14 medium-14 column right" style="padding-right:0;">
              <?php echo custom_term_description(); ?>
            </p>
        </section>

        <nav class="list-posts small-16 left">
          <ul class="small-block-grid-1 large-block-grid-1 medium-block-grid-1">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li>
              <article class="small-16 left">
                <time class="grey small-16 left"><small><?php the_time('d \d\e F \d\e Y') ?></small></time>
                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                <figure class="small-16 left">
                  <figcaption class="left small-16">
                    <a href="<?php the_permalink(); ?>" title="" class="grey"><?php get_excerpt(100); ?></a>
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

      </section> 
      
      <section class="hide-sidebar small-16 columns hide-for-large-up"></section><!-- //conteudo clonado -->
    </div>

    <?php echo get_footer(); ?>