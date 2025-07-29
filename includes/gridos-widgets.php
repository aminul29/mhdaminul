
<?php

// Widgets
add_action('widgets_init','gridos_register_widgets');
function gridos_register_widgets() {
    
	register_sidebar( array(
		'name'          => esc_html__( 'Blog sidebar', 'gridos' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your blog sidebar.', 'gridos' ),
		'before_widget' => '<div class="sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3><span>',
		'after_title'   => '</span></h3>',
	  ) );
	  
	  register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'gridos' ),
		'id'            => 'copyright',
		'description'   => esc_html__( 'Add Copyright text here.', 'gridos' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	  ) );
}