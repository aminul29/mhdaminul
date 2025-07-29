<?php 

    $image = get_theme_mod( 'image_setting_url', '' );
    $archiveDesc = get_theme_mod( 'archive_description', '' ); 
        
?>
        
        <div class="site-map">
            <div class="sitemap-page">
                <?php if (has_post_thumbnail()) : ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" alt="single" class="sitemap-image" />
                <?php endif; ?>
                <h4 class="sitemap-title">
                    <?php 
                        the_title();
                    ?>
                </h4>
            </div>
            <div class="sitemap-info">
                <div class="sitemap-text"><?php echo get_the_date(); ?></div>
            </div>
        </div>

        <?php if(is_active_sidebar('sidebar')){ ?>
        <div class="blog-with-sidebar">
        <?php } ?>
        <div class="single-wrapper">
            <?php if (has_post_thumbnail()) : ?>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                loading="lazy"
                alt="The Impact of 5G Technology"
                class="single-blog-image"
            />
            <?php endif; ?>

            <h2 class="single-post-title">
                <?php 
                    the_title();
                ?>
            </h2>
            <div class="single-text-style w-richtext">
                <?php the_content(); ?>
                <?php the_tags(); ?>
            </div>
            <div class="author-section">
                    <?php 
                        $post_id = get_the_ID(); // Replace 123 with the actual post ID

                        // Get the post author ID
                        $post_author_id = get_post_field('post_author', $post_id);

                        // Get the user data for the author
                        $author_data = get_userdata($post_author_id);

                        $first_name = $author_data->first_name;
                        $last_name = $author_data->last_name;

                        // Get the Gravatar image HTML
                        $gravatar_image = get_avatar(get_the_author_meta('ID', $post_author_id), 140);
                        $occupation = get_user_meta($post_author_id, '_gridos_occupation', true);
                    ?>
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 140 ); ?>
                <div class="author-name-and-title">
                    <h4 class="author-name"><?php echo esc_html($first_name) . ' ' . esc_html($last_name); ?></h4>
                    <div class="author-title"><?php echo esc_html( $occupation ); ?></div>
                </div>
                <div class="author-text"><?php the_author_meta('description'); ?></div>
            </div>
                            
            <?php if ( comments_open() || get_comments_number() ) {  ?>
                <?php comments_template(); ?>
            <?php } ?>
        </div>

        <?php if(is_active_sidebar('sidebar')){ ?>
            <?php get_sidebar(); ?>
        </div>
        <?php } ?>



