<?php 

$elementor_page_active = null;

if ( defined( 'ELEMENTOR_VERSION' ) ) {
    $elementor_page_active = \Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID());
}

$title = get_post_meta($wp_query->get_queried_object_id(), "_gridos_banner_title", true);
$subtitle = get_post_meta($wp_query->get_queried_object_id(), "_gridos_banner_subtitle", true);
$image = get_post_meta($wp_query->get_queried_object_id(), "_gridos_banner_image", true);

get_header();


if ( ! is_front_page() ) : ?>

<section>

    <div class="inner-pages-wrap">
        <div class="w-layout-blockcontainer main-container w-container">

            <div class="site-map">
                <div class="sitemap-page">
                    <?php if($image) : ?>
                    <img src="<?php echo esc_url( $image ); ?>" loading="lazy" alt="page-icon" class="sitemap-image" />
                    <?php endif; ?>
                    <?php if($title) { ?>
                    <h4 class="sitemap-title"><?php echo esc_html($title); ?></h4>
                    <?php } else { ?>
                        <h4 class="sitemap-title"><?php the_title(); ?></h4>
                    <?php } ?>
                </div>
                <?php if($subtitle) : ?>
                <div class="sitemap-info">
                    <div class="sitemap-text"><?php echo esc_html($subtitle); ?></div>
                </div>
                <?php endif; ?>
            </div>

<?php endif;

if($elementor_page_active) {

    the_content();

} else {

    while ( have_posts() ) : the_post(); ?>

    <div class="static-page">
        <div class="container">
            <?php
                the_content();
                wp_link_pages();
            ?>
            <?php if ( comments_open() || get_comments_number() ) {  ?>
                <?php comments_template(); ?>   
            <?php } ?>
            
        </div>
    </div>

<?php
    if ( ! is_front_page() ) :  
?>

        </div>
    </div>
</section>

<?php endif; ?>

    <?php endwhile;

}

get_footer();

?>