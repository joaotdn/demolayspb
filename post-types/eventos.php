<?php
  /*
    * Post type para eventos J. França
    * Última alteração: 18 de julho de 2014
   */
  
function eventos_init() {
  $labels = array(
    'name'               => 'Eventos',
    'singular_name'      => 'Eventos',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo evento',
    'edit_item'          => 'Editar evento',
    'new_item'           => 'Novo evento',
    'all_items'          => 'Todos os eventos',
    'view_item'          => 'Ver evento',
    'search_items'       => 'Buscar eventos',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Agenda'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'jfranca' ),
    //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
    'capability_type'    => 'post',
    'menu_position'      => 1,
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title','excerpt','editor' )
  );

  register_post_type( 'eventos', $args );
}

add_action( 'init', 'eventos_init' );

?>