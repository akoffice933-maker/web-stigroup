<?php
/**
 * Page Template
 *
 * @package STI_Group
 */

get_header();
?>

    <main class="relative min-h-screen pt-32 pb-20 px-4 sm:px-6 lg:px-8">
        <article class="max-w-4xl mx-auto">
            <?php while (have_posts()) : the_post(); ?>
                
                <header class="mb-12 text-center">
                    <h1 class="text-4xl sm:text-5xl font-bold mb-4 text-gradient"><?php the_title(); ?></h1>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="img-glass mb-8 aspect-[21/9]">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'sti-hero'); ?>" 
                                 alt="<?php the_title_attribute(); ?>" 
                                 class="w-full h-full object-cover">
                        </div>
                    <?php endif; ?>
                </header>

                <div class="glass-strong rounded-3xl p-8 sm:p-12 prose prose-invert prose-lg max-w-none">
                    <?php the_content(); ?>
                </div>

            <?php endwhile; ?>
        </article>
    </main>

<?php
get_footer();
