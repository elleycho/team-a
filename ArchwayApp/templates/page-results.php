/**
 * Template Name: Results Page
 **/

 <?php
 $query = new WP_Query( array('post_type' => 'agency_listing', 'posts_per_page' => 5 ) );
 while ( $query->have_posts() ) : $query->the_post(); ?>
// Your code e.g. "the_content();"
<?php endif; wp_reset_postdata(); ?>
<?php endwhile; ?>
