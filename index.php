<?php get_header(); ?>

    <div class="row">

      <?php
        /*
          Slide DESTAQUES
        */
        include_once 'includes/slide_destaques.php';

        /*
          Home SIDEBAR
        */
        get_sidebar( 'home' );

        /*
          ULTIMAS NOTICIAS
        */
        include_once 'includes/ultimas-noticias.php';

        /*
          AGENDA DE EVENTOS
        */
        include_once 'includes/agenda-eventos.php';

        /*
          ULTIMAS COLUNAS
        */
        include_once 'includes/ultimas-colunas.php';

        /*
          ULTIMOS VIDEOS
        */
        include_once 'includes/ultimos-videos.php';

        /*
          MURAL DE RECADOS
        */
        include_once 'includes/mural-recados.php';
      ?>

      <section class="hide-sidebar small-16 columns hide-for-large-up"></section><!-- //conteudo clonado -->

    </div><!-- //row -->

<?php get_footer(); ?>