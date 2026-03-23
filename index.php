<?php get_header(); ?>

<div class="container mx-auto px-4 py-12 md:py-20">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <article class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-display font-bold mb-8 text-primary">
                <?php the_title(); ?>
            </h1>
            
            <div class="prose prose-invert prose-lg max-w-none prose-headings:font-display prose-a:text-primary">
                <?php the_content(); ?>
            </div>
        </article>

    <?php endwhile; else : ?>
        
        <div class="text-center py-20">
            <h2 class="text-3xl font-bold mb-4">Page Not Found</h2>
            <p class="text-gray-400">Sorry, we couldn't find the content you were looking for.</p>
        </div>

    <?php endif; ?>

</div>

<?php get_footer(); ?>