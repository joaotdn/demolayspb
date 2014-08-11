<?php get_header(); ?>

    <div class="row">
      <?php if (have_posts()) : while (have_posts()) : the_post(); global $post; ?>

      <?php
        if ($post->post_parent) {
            $ancestors = get_post_ancestors($post->ID);
            $parent = $ancestors[count($ancestors) - 1];
        } else {
            $parent = $post->ID;
        }

        $children = wp_list_pages("title_li=&child_of=" . $parent . "&echo=0");

        if ($children):
      ?>
      <aside class="large-4 medium-16 small-16 columns">
        <dl class="accordion small-16 left" data-accordion>
          <dd class="small-16 left">
            <a href="#panel1" class="button-accordion small-16 left">
              <h4 class="white left"><?php $post_id = get_post($parent); echo $post_id->post_title;  ?></h4>
              <span class="display-block right icon-bottom"></span>
            </a>
            <div id="panel1" class="content active left small-16">
              <ul class="no-bullet">
                <?php echo $children; ?> 
              </ul> 
            </div>
          </dd>
        </dl>
      </aside>
      <?php endif; ?>

      <article class="large-12 medium-16 small-16 columns page-content">
        <header class="small-16 left page-header">
          <h1><?php the_title(); ?></h1>
        </header>

        <section class="small-16 left post-content">
          <?php the_content(); ?>
        </section>

      </article>

      <?php endwhile; else: ?>
        <article class="large-12 medium-16 small-16 columns post-content">
          <p> <?php _e('Este post não foi encontrado.'); ?> </p>
        </article>
      <?php endif; ?>
      
    </div>

<?php get_footer(); ?>