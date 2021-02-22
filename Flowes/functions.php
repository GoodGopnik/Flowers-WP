<?php 

add_action( 'wp_enqueue_scripts', 'style_theme' );
add_action( 'wp_footer', 'scripts_theme' );
add_action('init', 'Flowes_init');
add_theme_support( 'post-thumbnails' );

show_admin_bar(false);

function style_theme() {
    wp_enqueue_style( 'style', get_stylesheet_uri());
    wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_style( 'boorstrap', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css' );
    wp_enqueue_style( 'swiper-bundle', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
}

function scripts_theme() {
    wp_deregister_script( 'jquery' );

    wp_register_script( 'jquery', '//cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js');

    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'swiper-bundle', '//unpkg.com/swiper/swiper-bundle.min.js', array(), '1.0.0', true );
    
    wp_enqueue_script( 'fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'mainJS', get_template_directory_uri() . '/assets/js/main.js', array('fancybox'), '1.0.0', true);
}

function Flowes_init(){
	register_post_type('reviews', array(
		    'labels'             => array(
			'name'               => 'Отзывы', // Основное название типа записи
			'singular_name'      => 'Отзыв', // отдельное название записи типа Book
			'add_new'            => 'Добавить отзыв',
			'add_new_item'       => 'Добавить новый отзыв',
			'edit_item'          => 'Редактировать отзыв',
			'new_item'           => 'Новый отзыв',
			'view_item'          => 'Посмотреть отзыв',
			'search_items'       => 'Найти отзыв',
			'not_found'          => 'Отзывов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Отзывы'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
        'menu_icon'          => 'dashicons-admin-users',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt')
	) );
    register_post_type('Flowers', array(
        'labels'             => array(
        'name'               => 'Букеты', // Основное название типа записи
        'singular_name'      => 'Букет', // отдельное название записи типа Book
        'add_new'            => 'Добавить Букет',
        'add_new_item'       => 'Добавить новый Букет',
        'edit_item'          => 'Редактировать Букет',
        'new_item'           => 'Новый Букет',
        'view_item'          => 'Посмотреть Букеты',
        'search_items'       => 'Найти Букет',
        'not_found'          => 'Букетов не найдено',
        'parent_item_colon'  => '',
        'menu_name'          => 'Букеты'

      ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'menu_icon'          => 'dashicons-palmtree',
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array('title','editor','author','thumbnail','excerpt')
) );
}