

<form  action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-bar-form">
    <div class="inner-form-box">
        <div class="search-input-line">
            <input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search on page', 'gridos' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>"/>
            <span class="material-icons">
                <?php esc_html_e('search', 'gridos');  ?>
            </span>
        </div>
        <input type="submit" id="submit_search" class="gridos-button search-submit" value="<?php esc_attr_e( 'Search', 'gridos' ); ?>" />
    </div>
</form>