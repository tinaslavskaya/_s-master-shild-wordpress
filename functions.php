<?php 

add_action( 'wp_enqueue_scripts', 's_master_child_styles' );
 
function s_master_child_styles() {

	wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );

 	wp_enqueue_style( 'child-style', get_stylesheet_uri() );

 	wp_enqueue_style('bootstrap-main', get_template_directory_uri() . '/assets/css/main.css');
 	
 	wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), false, true);
	
}

//Изменение [...]строки в the_excerpt() с помощью фильтра
add_filter('excerpt_more', function($more) {
	return '...';
});

// custom post type News
function s_master_shild_register_post_types() {

	//register taxonomy newscat
	$labels_terms = array (
		'name'              => _x('Categories', '_s_master_shild' ),
		'singular_name'     => _x('Category', '_s_master_shild' , '_s_master_shild' ),
		'search_items'      => _x('Search Categories', '_s_master_shild' ),
		'all_items'         => _x('All Categories', '_s_master_shild' ),
		'parent_item'       => _x('Parent Category', '_s_master_shild' ),
		'parent_item_colon' => _x('Parent Category:', '_s_master_shild' ),
		'edit_item'         => _x('Edit Category', '_s_master_shild' ),
		'update_item'       => _x('Update Category', '_s_master_shild' ),
		'add_new_item'      => _x('Add New Category', '_s_master_shild' ),
		'new_item_name'     => _x('New Category Name', '_s_master_shild' ),
		'menu_name'         => _x('Categories', '_s_master_shild' )
	);

	$args_terms = array (
		'label'                 => _x('Categories', '_s_master_shild' ), // определяется параметром $labels->name
		'labels'                => $labels_terms,
		'description'           => _x('Categories for section news', '_s_master_shild' ), // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true, 
		'show_tagcloud'         => false, 
		'show_in_rest'			=> true,
		'hierarchical'          => true,
		'meta_box_cb'			=> true,
		'rewrite'               => array('slug'=>'newscat', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. 
	);

	register_taxonomy('newscat', ['news'], $args_terms);

	//register post type news
	$labels = array(
        'name'                  => _x( 'News', 'Post type general name', '_s_master_shild' ),
        'singular_name'         => _x( 'New', 'Post type singular name', '_s_master_shild' ),
        'menu_name'             => _x( 'News', 'Admin Menu text', '_s_master_shild' ),
        'name_admin_bar'        => _x( 'News', 'Add New on Toolbar', '_s_master_shild' ),
        'add_new'               => __( 'Add New', '_s_master_shild' ),
        'add_new_item'          => __( 'Add New _s_master_shild', '_s_master_shild' ),
        'new_item'              => __( 'New', '_s_master_shild' ),
        'edit_item'             => __( 'Edit New', '_s_master_shild' ),
        'view_item'             => __( 'View New', '_s_master_shild' ),
        'all_items'             => __( 'All News', '_s_master_shild' ),
        'search_items'          => __( 'Search News', '_s_master_shild' ),
        'not_found'             => __( 'No News found.', '_s_master_shild' ),
        'featured_image'        => _x( 'New Cover Image', 'Overrides the “Featured Image” phrase for this post type.', '_s_master_shild' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type.', '_s_master_shild' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type.', '_s_master_shild' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type.', '_s_master_shild' ),
        'archives'              => _x( 'New archives', 'The post type archive label used in nav menus. Default “Post Archives”.', '_s_master_shild' ),
        'insert_into_item'      => _x( 'Insert into New', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post).', '_s_master_shild' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this New', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post).', '_s_master_shild' ),
        'filter_items_list'     => _x( 'Filter News list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”.', '_s_master_shild' ),
        'items_list_navigation' => _x( 'News list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”.', '_s_master_shild' ),
        'items_list'            => _x( 'News list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”.', '_s_master_shild' ),
    );     
    $args = array(
    	'label'  			 => 'news',
        'labels'             => $labels,
        'description'        => 'New custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'menu_icon' 		 => 'dashicons-media-text',
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'post-formats' ),
        'taxonomies'         => array( 'newscat' ),
        'show_in_rest'       => true
    );
    register_post_type( 'news', $args );
}
add_action( 'init', 's_master_shild_register_post_types' );
?>

<?php
// shortcode [news] 
add_shortcode( 'news', 's_master_shild_news_shortcode' );

function s_master_shild_news_shortcode ($atts) {

	$atts = shortcode_atts( 
		array(
			'status' => 'publish',
			'type' => 'news',
			'order' => 'DESC',
			'count_posts' => 3,
		), $atts, 'news');

	$arrg = array(
      'post_status' => $atts['status'],
      'post_type' =>  $atts['type'],
      'order' => $atts['order'],
      'posts_per_page' => $atts['count_posts'],    
    );
   
	$query_news = new WP_Query(  $arrg );
	?>
	<?php if($query_news->have_posts()) : ?>
    <div class="d-flex flex-column justify-content-center align-items-start mb-3" style="max-width: 1000px; margin: 0 auto;">
        <div class="my-3">Количество выводимых постов: <?php echo (wp_count_posts( 'news')->publish); ?></div>
    </div>
    <?php while($query_news->have_posts()) : $query_news->the_post(); ?>
      	<?php get_template_part('template-parts/content', 'news'); ?>
    <?php endwhile; ?> 
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>         	 	
  <?php
}


add_filter( "the_excerpt", "s_master_shild_add_class_to_excerpt" );

function s_master_shild_add_class_to_excerpt( $excerpt ) {
    return str_replace('<p>', '<p class="card-text">', $excerpt);
}


//count word for the_content	
function s_master_word_count () {
	$content = get_the_content();
	if(!has_excerpt()) {
	    $word_count = str_word_count($content , 0);
	    if($word_count >= 55) {
	      echo wp_trim_words($content, 20, '[...]' );
	    }  
	} else {
	    the_excerpt();
	} 
} 

?>