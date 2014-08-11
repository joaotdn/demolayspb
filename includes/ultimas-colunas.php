    <section class="small-16 large-12 medium-16 columns">
        <header class="small-16 left widget-header">
          <h4 class="text-upp red left">Colunistas</h4>  
          <a href="<?php echo get_post_type_archive_link('colunas'); ?>" title="Ver mais Colunas" class="display-block text-upp right"><span class="left">Ver mais Colunas</span></a>
          <div class="line-red abs"></div>
        </header>
        
        <nav class="small-16 left last-columns">
          <ul class="large-block-grid-3 medium-block-grid-3 medium-block-grid-1">
            <?php
              $args = array( 'post_type' => 'colunas', 'taxonomy' => 'colunistas', 'posts_per_page' => 3, 'orderby' => 'date' ); 
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();
              global $post;
            ?>
            <li>
              <figure class="small-16 left">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="display-block columnist-thumb small-6 columns" style="background-image: url(<?php echo voice_avatar(); ?>);"></a>
                <figcaption class="small-10 columns">
                  <h5 class="text-upp"><?php echo custom_taxonomies_terms_links(); ?></h5>
                  <p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="grey"><?php the_title(); ?></a></p>
                </figcaption>
              </figure>
            </li>
            <?php endwhile; wp_reset_query(); ?>
          </ul>
        </nav>
      </section><!-- //colunistas -->