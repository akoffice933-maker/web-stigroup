<?php
/**
 * Single Post Template
 *
 * @package STI_Group
 */

get_header();
?>

    <main class="relative min-h-screen pt-32 pb-20 px-4 sm:px-6 lg:px-8">
        <article class="max-w-3xl mx-auto">
            <?php while (have_posts()) : the_post(); ?>
                
                <header class="mb-8">
                    <div class="flex items-center gap-4 text-sm text-gray-400 mb-4">
                        <?php the_category(', '); ?>
                        <span>•</span>
                        <time><?php echo get_the_date(); ?></time>
                    </div>
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
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links flex gap-4 my-8">',
                        'after'  => '</div>',
                        'link_before' => '<span class="px-4 py-2 rounded-full glass">',
                        'link_after'  => '</span>',
                    ));
                    ?>
                </div>

                <!-- Post Meta -->
                <footer class="mt-12 pt-8 border-t border-white/10">
                    <div class="flex flex-wrap gap-4">
                        <?php the_tags('<div class="flex flex-wrap gap-2">', '</div>'); ?>
                    </div>
                    
                    <div class="mt-8 flex justify-between items-center">
                        <?php edit_post_link('Редактировать', '<span class="text-sm text-gray-400">', '</span>'); ?>
                    </div>
                </footer>

                <!-- Author Bio -->
                <div class="mt-12 glass rounded-3xl p-8 flex items-center gap-6">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-2xl font-bold">
                        <?php echo get_the_author_meta('display_name')[0]; ?>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-1">
                            <?php the_author_posts_link(); ?>
                        </h3>
                        <p class="text-gray-400 text-sm">
                            <?php echo get_the_author_meta('description'); ?>
                        </p>
                    </div>
                </div>

                <!-- Comments -->
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; ?>
        </article>
    </main>

<?php
get_footer();
