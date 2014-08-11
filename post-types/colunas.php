<?php
  /*
    * Post type para colunas
    * Última alteração: 18 de julho de 2014
   */
  
function colunas_init() {
  $labels = array(
    'name'               => 'Colunas',
    'singular_name'      => 'Coluna',
    'add_new'            => 'Adicionar Nova',
    'add_new_item'       => 'Adicionar nova Coluna',
    'edit_item'          => 'Editar Coluna',
    'new_item'           => 'Novo Coluna',
    'all_items'          => 'Todos as Colunas',
    'view_item'          => 'Ver Coluna',
    'search_items'       => 'Buscar Colunas',
    'not_found'          => 'N&atilde;o encontrada',
    'not_found_in_trash' => 'N&atilde;o encontrada',
    'parent_item_colon'  => '',
    'menu_name'          => 'Colunas'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'colunas' ),
    'capability_type'    => 'post',
    'menu_position'      => 1,
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'excerpt', 'comments' )
  );

  register_post_type( 'colunas', $args );

  $labels = array(
    'name'              => __( 'Colunistas'),
    'singular_name'     => __( 'Colunista'),
    'search_items'      =>  __( 'Buscar' ),
    'popular_items'     => __( 'Mais ativos' ),
    'all_items'         => __( 'Todos os Colunistas' ),
    'parent_item'       => null,
    'parent_item_colon' => null,
    'edit_item'         => __( 'Adicionar novo' ),
    'update_item'       => __( 'Atualizar' ),
    'add_new_item'      => __( 'Adicionar novo Colunista' ),
    'new_item_name'     => __( 'Nova' )
    );

  register_taxonomy("colunistas", array("colunas"), array(
    "hierarchical"      => true, 
    "labels"            => $labels, 
    "singular_label"    => "Colunista", 
    "rewrite"           => true,
    "add_new_item"      => "Adicionar novo colunista",
    "new_item_name"     => "Novo colunista",
  ));
}
add_action( 'init', 'colunas_init' );

?>