
        <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-wrapper w-nav">
            <div class="main-container w-container">
                <div class="nav-wrapper">

                    <?php $custom_logo = get_post_meta($wp_query->get_queried_object_id(), '_gridos_custom_logo', true) ?>

                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" class="brand-logo w-nav-brand">
                        <?php if($custom_logo!=''){ ?>
                            <img src="<?php echo esc_url($custom_logo); ?>" alt="<?php bloginfo('name'); ?>" loading="lazy" class="logo">
                        <?php }elseif($custom_logo_id!=''){ ?>
                            <?php $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                            <img src="<?php echo esc_url($image[0]); ?>" alt="<?php bloginfo('name'); ?>" loading="lazy" class="logo"/>
                        <?php }else{  ?>
                            <?php bloginfo('name'); ?>
                        <?php } ?>
                    </a>

                    <label class="menu-button w-nav-button" tabindex="0" for="menu-toggle">
                        <div class="icon w-icon-nav-menu"></div>
                    </label>
                    <input type="checkbox" id="menu-toggle"/>

                    <nav role="navigation" class="main-nav w-nav-menu" id="nav">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'link_before' => '',     
                                'link_after'  => '',
                                'menu_class' => 'navigation-menu-list',
                                'depth'           => 0
                            ));
                        ?>
                    </nav>

                </div>
            </div>
        </div>
            