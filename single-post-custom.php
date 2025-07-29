<?php
/*
 * Template Name: Project Post Layout
 * Template Post Type: post
 */

get_header(); ?>

<main id="main" class="site-main">
    <h1>This is a Custom Template for Posts</h1>
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
