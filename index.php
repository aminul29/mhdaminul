<?php

get_header();
        $title = get_post_meta($wp_query->get_queried_object_id(), "_gridos_banner_title", true);
        $subtitle = get_post_meta($wp_query->get_queried_object_id(), "_gridos_banner_subtitle", true);
        $image = get_post_meta($wp_query->get_queried_object_id(), "_gridos_banner_image", true);
        
        ?>
<section>

    <div class="inner-pages-wrap">
        <div class="w-layout-blockcontainer main-container w-container">

            <div class="site-map">
                <div class="sitemap-page">
                    <?php if (is_home()) : 
                        if($image) {
                        ?>
                    <img src="<?php echo esc_url( $image ); ?>" loading="lazy" alt="page-icon" class="sitemap-image" />
                    <?php 
                        }
                    endif; ?>
                    <h4 class="sitemap-title">
                        <?php 
                            if ( is_category() ) {  
                                echo esc_html_e('CATEGORY: ', 'gridos') . single_term_title();
                            } elseif ( is_tag() ) {    
                                echo esc_html_e('TAG: ', 'gridos') . single_term_title();
                            } elseif ( is_date() ) {    
                                the_archive_title();
                            } elseif ( is_author() ) {    
                                echo esc_html_e('Posts by: ', 'gridos') . get_the_author_meta('display_name');
                            } elseif ( is_tax() ) {
                                single_term_title();
                            } elseif (is_home()) {
                                if($title) {
                                    echo esc_html($title);
                                } else {
                                    esc_html_e('Our Latest Posts', 'gridos');
                                }
                            } else {
                                the_title();
                            }
                            
                        ?>
                    </h4>
                </div>
                <?php if (is_home() && $subtitle ) : ?>
                <div class="sitemap-info">
                    <div class="sitemap-text"><?php echo esc_html($subtitle); ?></div>
                </div>
                <?php endif; ?>
            </div>

            <div class="blog-wrapper">
                <?php if(is_active_sidebar('sidebar')){ ?>
                <div class="blog-with-sidebar">
                    <div class="blog-list-wrapper w-dyn-list">
                        <div role="list" class="blog-list w-dyn-items w-row one-col">
                <?php } else { ?>
                <div class="blog-list-wrapper w-dyn-list">
                    <div role="list" class="blog-list w-dyn-items w-row">
                <?php } ?>
                        <?php
                            if(have_posts()) :
                                while(have_posts()) : the_post(); ?>

                                    <div role="listitem" class="blog-item w-dyn-item w-col w-col-6">
                                        <div class="blog-item-div <?php if ( !has_post_thumbnail() ) { echo esc_attr('no-thumb'); }?>">
                                            <?php if ( has_post_thumbnail() ) { ?>
                                            <a href="<?php the_permalink(); ?>" class="link-to-single-post w-inline-block">
                                                <img
                                                    src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                    loading="lazy"
                                                    alt="post-image"
                                                    class="blog-main-image"
                                                />
                                            </a>
                                            <?php } ?>
                                            <a href="<?php the_permalink(); ?>" class="link-to-single-post w-inline-block">
                                                <h3 class="blog-title"><?php the_title(); ?></h3>
                                            </a>
                                            <p class="blog-paragraph"><?php echo gridos_excerpt(); ?></p>
                                            <div class="blog-time"><?php echo get_the_date(); ?></div>
                                        </div>
                                    </div>
                                
                                <?php endwhile;
                            endif; 
                        ?>

                    </div>
                    <?php fabric_paging_navigation($wp_query); ?>
                </div>
                <?php if(is_active_sidebar('sidebar')){ ?>
                    <?php get_sidebar(); ?>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>
        
<?php
get_footer();