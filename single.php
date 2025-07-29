<?php

$singleLayout = get_post_meta( get_the_ID(), '_gridos_post_layout', true );
  
get_header();
?>

<section>

    <div class="inner-pages-wrap">
        <div class="w-layout-blockcontainer main-container w-container">

<?php

if ( have_posts() ) : while ( have_posts() ) : the_post();
    setPostViews(get_the_ID());

        
    get_template_part( 'template-parts/single' );


endwhile; endif; ?>

        </div>
    </div>
</section>
        
<?php
get_footer();

?>