	<div class="main-slide small-16 left">
        <nav class="list-sliders small-16 left">
          <ul class="" data-orbit data-options="animation_speed:1500;slide_number:false;next_on_click:false;bullets:false;resume_on_mouseout:true;">
          		<?php       
                  query_posts('showposts=4&category_name=destaques'); 
                  if (have_posts()): while (have_posts()) : the_post();
                ?>
            	<li class="small-16">
            		<figure class="small-16 left bg-cover" style="background-image: url(<?php get_thumbnails_url('full'); ?>);">
            			<figcaption class="abs small-16">
            				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="white"><?php the_title(); ?></a></h2>
            			</figcaption>
            		</figure>
            	</li>
            	<?php endwhile; else: endif; wp_reset_query(); ?>
          </ul>
        </nav>
    </div><!-- //slide -->