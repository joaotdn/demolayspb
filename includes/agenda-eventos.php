    <section class="large-5 columns">
        <header class="small-16 left widget-header">
          <h4 class="text-upp red left">Próximos eventos</h4>  
          <a href="<?php echo get_post_type_archive_link('eventos'); ?>" title="Ver mais eventos" class="display-block text-upp right"><span class="left">Ver mais eventos</span> <span class="display-block icon-calendar2 left"></span></a>
          <div class="line-red abs"></div>
        </header>

        <nav class="last-events small-16 left">
          <ul class="no-bullet">
            <?php
                $args = array( 'post_type' => 'eventos', 'posts_per_page' => 4, 'orderby' => 'date' ); 
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                global $post;
            ?>
            <li>
              <time><h3 class="grey"><?php echo get_field('data_evento',$post->ID) ?></h3></time>
              <h5 class="text-upp"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
            </li>
            <?php endwhile; wp_reset_query(); ?>
          </ul>
        </nav>
      </section><!-- //Agenda de eventos -->