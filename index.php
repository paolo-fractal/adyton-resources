<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
    <?php the_content(); ?>

<?php endwhile; else : ?>
    
    <div class="text-center py-20">
        <h2 class="text-3xl font-bold mb-4">Page Not Found</h2>
        <p class="text-gray-400">Sorry, we couldn't find the content you were looking for.</p>
    </div>

<?php endif; ?>

<?php get_footer(); ?>