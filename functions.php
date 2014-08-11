<?php
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

//Registrar menu
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Menu principal' ),
      'footer-menu' => __( 'Menu rodape' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

//Gera novos formatos de miniaturas
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'news-thumb', 203, 188, true ); //miniaturas do slide
  add_image_size( 'video-thumb', 600, 400, true ); //miniaturas videos
  add_image_size( 'category-thumb', 300, 250, true ); //miniaturas categorias
}

//Remove container de menu
function my_wp_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

//Listar Editorias
function listar_editorias() {
    $args = array(
        'hide_empty'    => 0,
        'title_li'      => '',
        'hierarchical'  => 0,
    );
    //Lista categorias fora das editorias
    wp_list_categories( $args );
}

//Incluir Jquery
function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );

    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js');
    wp_enqueue_script( 'jquery-migrate' );
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

//Nome da 1a categoria de uma postagem em um loop
function get_first_category_name() {
    $category = get_the_category(); 
    if($category[0]){
        echo $category[0]->cat_name;
    }
}

//Link da 1a categoria de uma postagem em um loop
function get_first_category_link() {
    $category = get_the_category(); 
    if($category[0]){
        echo get_category_link( $category[0]->term_id );
    }
}

//Primeio nome de um termo
function custom_taxonomies_terms_names() {
  global $post, $post_id;
  $post = &get_post($post->ID);
  $post_type = $post->post_type;
  $taxonomies = get_object_taxonomies($post_type);
  foreach ($taxonomies as $taxonomy) {
    $terms = get_the_terms( $post->ID, $taxonomy );
    if ( !empty( $terms ) ) {
      $out = array();
      foreach ( $terms as $term )
        $out[] = $term->name;
      $return = join( ', ', $out );
    }
  }
  return $return;
}

//Link do termo personalizado
function custom_taxonomies_terms_links() {
  global $post, $post_id;
  $post = &get_post($post->ID);
  $post_type = $post->post_type;
  $taxonomies = get_object_taxonomies($post_type);
  foreach ($taxonomies as $taxonomy) {
    $terms = get_the_terms( $post->ID, $taxonomy );
    if ( !empty( $terms ) ) {
      $out = array();
      foreach ( $terms as $term )
        $out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'" title="' . $term->name .'" class="red-lite">'.$term->name.'</a>';
      $return = join( ', ', $out );
    }
  }
  return $return;
}

//Pega a primeira tag de uma postagem em um loop 
function get_first_tag() {
    $posttags = get_the_tags();
    $count=0;
    if ($posttags) {
        foreach($posttags as $tag) {
            $count++;
            if (1 == $count) {
                echo $tag->name . ' ';
            }
        }
    } else {
        get_first_category_name();
    }
}

//Foto do colunista
function voice_avatar() {
  global $post;
    $terms = get_the_terms($post->ID, 'colunistas');

    if( !empty($terms) )
    {
        $term = array_pop($terms);
 
        $custom_field = get_field('colunista_foto', $term );

    }

    return $custom_field;
}

//Pegar url do thumb
function get_thumbnails_url($size) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id, $size , true);
    echo $thumb_url[0];
}

//Gerar resumo com limite de caracteres
remove_filter('the_excerpt', 'wpautop');

function custom_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function get_excerpt($l) {
  $e = substr(the_excerpt(), 0,$l);
  return $e;
}

//Pegar url da categoria pelo nome
function echo_url_category($cat_name) {
    $category_id = get_cat_ID( $cat_name );
    $category_link = get_category_link( $category_id );
    echo esc_url( $category_link );
}

//link do custom term
function custom_taxonomies_terms_links_only() {
  global $post, $post_id;
  $post = &get_post($post->ID);
  $post_type = $post->post_type;
  $taxonomies = get_object_taxonomies($post_type);
  foreach ($taxonomies as $taxonomy) {
    $terms = get_the_terms( $post->ID, $taxonomy );
    if ( !empty( $terms ) ) {
      $out = array();
      foreach ( $terms as $term )
        $out[] = get_term_link($term->slug, $taxonomy);
      $return = join( ', ', $out );
    }
  }
  return $return;
}

//descricao do custom term
function custom_term_description() {
  global $post, $post_id;
  $post = &get_post($post->ID);
  $post_type = $post->post_type;
  $taxonomies = get_object_taxonomies($post_type);
  foreach ($taxonomies as $taxonomy) {
    $terms = get_the_terms( $post->ID, $taxonomy );
    if ( !empty( $terms ) ) {
      $out = array();
      foreach ( $terms as $term )
        $out[] = $term->description;
      $return = join( ', ', $out );
    }
  }
  return $return;
}

//Alterar saída padrão das galerias
add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need
    $output = "<div id=\"slideshow-1\">\n<p><a href=\"#\" class=\"cycle-prev button white\"><span class=\"icon-arrow-left4\"></span></a> <a href=\"#\" class=\"cycle-next button white\"><span class=\"icon-arrow-right4\"></span></a><span class=\"custom-caption\"></span>\n</p>";

    $output .= "<div id=\"cycle-1\" class=\"cycle-slideshow\" data-cycle-slides=\"> div\" data-cycle-timeout=\"0\" data-cycle-prev=\"#slideshow-1 .cycle-prev\" data-cycle-next=\"#slideshow-1 .cycle-next\" data-cycle-caption=\"#slideshow-1 .custom-caption\" data-cycle-caption-template=\" Foto {{slideNum}} de {{slideCount}}\" data-cycle-fx=\"fade\">";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
        $full = wp_get_attachment_image_src($id, 'large');

        $output .= "<div class=\"bg-cover small-16 left gallery-slide\" style=\"background-image: url({$full[0]});\">\n";
        $output .= "</div>\n";
    }

    $output .= "</div>\n";
    $output .= "</div>\n";

    return $output;
}

//Correção para contagem de comentarios
// Disqus: Prevent from replacing comment count
remove_filter('comments_number', 'dsq_comments_text');
remove_filter('get_comments_number', 'dsq_comments_number');
remove_action('loop_end', 'dsq_loop_end');


/*
    Chamadas AJAX
    ============================
 */

//VIDEO na principal
add_action( 'wp_ajax_nopriv_DM_request_videos_home', 'DM_request_videos_home' );
add_action( 'wp_ajax_DM_request_videos_home', 'DM_request_videos_home' );

function DM_request_videos_home() {
    $postid = $_GET['postid'];
    $video = get_field('dm_video', $postid);

    echo $video;
    exit();
}



/*
    Post Types
    ============================
 */

//EVENTOS
require_once ( get_stylesheet_directory() . '/post-types/eventos.php' );

//COLUNAS
require_once ( get_stylesheet_directory() . '/post-types/colunas.php' );

/*
    Opçoes do tema
    ============================
 */
require_once ( get_stylesheet_directory() . '/theme-options.php' );

?>