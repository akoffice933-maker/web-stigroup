<?php
/**
 * Search Results Template
 *
 * @package STI_Group
 */

get_header();
?>

    <main class="relative min-h-screen pt-32 pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <header class="mb-12 text-center">
                <h1 class="text-4xl sm:text-5xl font-bold mb-4">
                    Поиск: <span class="text-gradient">"<?php echo get_search_query(); ?>"</span>
                </h1>
                <p class="text-gray-400">
                    <?php printf('Найдено результатов: %d', $wp_query->found_posts); ?>
                </p>
            </header>

            <?php if (have_posts()) : ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="glass-card rounded-3xl p-6 group cursor-pointer">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="img-glass mb-6 aspect-[16/9]">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'sti-card'); ?>" 
                                             alt="<?php the_title_attribute(); ?>" 
                                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <h2 class="text-xl font-semibold mb-2">
                                <a href="<?php the_permalink(); ?>" class="hover:text-indigo-300 transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <p class="text-gray-400 text-sm mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="text-indigo-400 hover:text-indigo-300 text-sm flex items-center gap-1">
                                Читать далее
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => '← Назад',
                        'next_text' => 'Вперёд →',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="text-center py-20">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full glass flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold mb-4">Ничего не найдено</h2>
                    <p class="text-gray-400 mb-8">По вашему запросу "<?php echo get_search_query(); ?>" не найдено результатов</p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>

        </div>
    </main>

<?php
get_footer();
