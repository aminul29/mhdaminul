<?php 


add_action( 'wp_enqueue_scripts', 'gridos_lazyload_assets', 10 );

function gridos_lazyload_assets() {
  $js_dir = get_template_directory_uri() . '/assets/js';
  wp_enqueue_script( 'gridos-lazyload', $js_dir . '/lazyload.js', [], '', true );
}

add_filter( 'the_content', 'gridos_lazyload_content_images' );
add_filter( 'wp_get_attachment_image_attributes', 'gridos_lazyload_attachments', 10, 2 );

// Replace the image attributes in Post/Page Content
function gridos_lazyload_content_images( $content ) {
  $content = preg_replace( '/(<img.+)(src)/Ui', '$1data-$2', $content );
  $content = preg_replace( '/(<img.+)(srcset)/Ui', '$1data-$2', $content );
  return $content;
}

// Replace the image attributes in Post Listing, Related Posts, etc.
function gridos_lazyload_attachments( $atts, $attachment ) {
  $atts['data-src'] = $atts['src'];
  unset( $atts['src'] );
  
  if( isset( $atts['srcset'] ) ) {
    $atts['data-srcset'] = $atts['srcset'];
    unset( $atts['srcset'] );
  }

  return $atts;
}

