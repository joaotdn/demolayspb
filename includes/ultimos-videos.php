      <section class="small-16 medium-8 large-6 columns">
        <header class="small-16 left widget-header">
          <h4 class="text-upp red left">Vídeos</h4>  
          <a href="<?php echo_url_category('Videos'); ?>" title="Ver mais vídeos" class="display-block text-upp right"><span class="left">Ver mais vídeos</span> <span class="display-block icon-video2 left"></span></a>
          <div class="line-red abs"></div>
        </header>
        <?php     
          query_posts('showposts=1&category_name=videos'); 
          if (have_posts()): while (have_posts()) : the_post();

          global $post;
        ?>
        <figure class="small-16 left video-thumb rel">
          <a href="#" class="display-block small-16 left rel block-video" title="<?php the_title(); ?>" data-reveal-id="video-modal" data-postid="<?php echo $post->ID; ?>">
            <div class="small-16 abs text-center play-container"><span class="display-block icon-play2"></span></div>
            <?php
              if(has_post_thumbnail()) {
                the_post_thumbnail( 'videos-thumb' );
              } else {
                echo '<img src="'. get_template_directory_uri() .'/images/no-thumb-videos.jpg">';
              }
            ?>
          </a>

          <figcaption class="small-16 columns abs">
            <a href="#" class="white" title="<?php the_title(); ?>" data-reveal-id="video-modal" data-postid="<?php echo $post->ID; ?>">
              <?php the_title(); ?>
            </a>
          </figcaption>
        </figure>
        <?php endwhile; else: endif; wp_reset_query(); ?>

        <div id="video-modal" class="reveal-modal" data-reveal>
          <div class="ajax-loader small-16 left text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/ajax-loader.gif" alt="">
          </div>
          <div class="flex-video"></div>
          <a class="close-reveal-modal">&#215;</a>
        </div>
      </section><!-- //videos -->