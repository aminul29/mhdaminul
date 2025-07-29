

            <!-- Search form fullscreen fixed -->
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-form-fullscreen">
                <div class="content-center container">
                    <span class="search-icon">
                        <i class="fas fa-search"></i>
                    </span>
                    <h1><?php esc_html_e('What are you looking for?', 'gridos'); ?></h1>
                    <input autocomplete="off" id="keyword" type="search" name="s" onkeyup="fetch()" class="search-field" placeholder="<?php esc_attr_e( 'type here ...', 'gridos' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>"/>
                    <a href="#" class="close-search">
                        <i class="fas fa-times"></i>
                    </a>
                    <div id="datafetch"><?php esc_html_e('Search results will appear here', 'gridos'); ?></div>
                </div>
            </form>
            <!-- End Search form fullscreen fixed -->