      <section class="large-7 columns">
        <header class="small-16 left widget-header">
          <h4 class="text-upp red left">Últimas Novidades</h4>  
          <a href="<?php echo_url_category('Novidades'); ?>" title="Ver mais notícias" class="display-block text-upp right"><span class="left">Ver mais notícias</span> <span class="display-block icon-file left"></span></a>
          <div class="line-red abs"></div>
        </header>

        <nav class="last-news small-16 left">
          <ul id="list-news" class="no-bullet">
            <?php
              $exclude = get_cat_ID( 'Destaques');       
              query_posts('showposts=6&category_name=novidades&cat=-'.$exclude); 
              if (have_posts()): while (have_posts()) : the_post();
            ?>
            <li class="small-16">
              <figure class="small-16 left">
                <a href="<?php the_permalink(); ?>" class="display-block small-6 medium-4 large-6 left news-thumb" title="<?php the_title(); ?>">
                  <?php
                    if(has_post_thumbnail()) {
                      the_post_thumbnail( 'news-thumb' );
                    } else {
                      echo '<img src="'. get_template_directory_uri() .'/images/no-thumb-news.jpg">';
                    }
                  ?>
                </a>

                <figcaption class="small-10 medium-12 large-10 columns">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <h5 class="text-upp"><?php the_title(); ?></h5>
                  </a>
                  <p class="show-for-medium-up"><?php get_excerpt(50); ?></p>
                  <small class="text-upp">Publicada por <?php echo get_the_author_link(); ?></small>
                </figcaption>
              </figure>
            </li>
            <?php endwhile; else: endif; wp_reset_query(); ?>
          </ul>
        </nav>
        
        <nav class="nav-caroussel small-16 left">
          <a href="#" class="prev-news display-block small-8 left" title="Anterior">
            <span class="display-block icon-down centered"></span>
          </a>

          <a href="#" class="next-news display-block small-8 left" title="Anterior">
            <span class="display-block icon-up centered"></span>
          </a>
        </nav>
        
      </section><!-- //ultimas noticias -->