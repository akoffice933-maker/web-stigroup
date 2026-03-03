<?php
/**
 * Template Name: Front Page
 * Front Page Template
 *
 * @package STI_Group
 */

get_header();
?>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div class="space-y-8 z-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass text-sm font-medium text-indigo-300">
                    <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
                    Производитель в Сочи
                </div>
                
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold leading-tight">
                    Интерактивные <br>
                    <span class="text-gradient">панели</span> и <span class="text-gradient-2">киоски</span><br>
                    <span class="text-3xl sm:text-4xl lg:text-5xl font-light text-gray-400">под ключ</span>
                </h1>
                
                <p class="text-lg sm:text-xl text-gray-400 max-w-lg leading-relaxed">
                    Сенсорные решения премиум-класса для бизнеса, образования и государственных учреждений. Монтаж за 3 дня.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#products" class="btn-primary px-8 py-4 rounded-2xl text-base font-semibold text-white flex items-center justify-center gap-2 group">
                        Каталог продукции
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#calculator" class="btn-glass px-8 py-4 rounded-2xl text-base font-semibold text-white">
                        Рассчитать стоимость
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 pt-8 border-t border-white/10">
                    <div class="stat-item" style="animation-delay: 0.1s">
                        <div class="text-3xl font-bold text-white">>150</div>
                        <div class="text-sm text-gray-400 mt-1">внедрений</div>
                    </div>
                    <div class="stat-item" style="animation-delay: 0.2s">
                        <div class="text-3xl font-bold text-gradient">10%</div>
                        <div class="text-sm text-gray-400 mt-1">скидка</div>
                    </div>
                    <div class="stat-item" style="animation-delay: 0.3s">
                        <div class="text-3xl font-bold text-white">>7 лет</div>
                        <div class="text-sm text-gray-400 mt-1">срок службы</div>
                    </div>
                </div>
            </div>

            <!-- Right Content - Hero Image -->
            <div class="relative float-anim">
                <div class="glass-strong rounded-[40px] p-4 sm:p-6 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-purple-500/20"></div>
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'sti-hero'); ?>" 
                             alt="<?php the_title_attribute(); ?>" 
                             class="w-full h-auto rounded-3xl relative z-10 shadow-2xl">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-default.jpg" 
                             alt="Интерактивная панель" 
                             class="w-full h-auto rounded-3xl relative z-10 shadow-2xl">
                    <?php endif; ?>
                    
                    <!-- Floating badge -->
                    <div class="absolute -bottom-4 -left-4 glass-strong px-6 py-4 rounded-2xl z-20 flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold">Гарантия</div>
                            <div class="text-xs text-gray-400">3 года</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-24 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl font-bold mb-4">Наша <span class="text-gradient">продукция</span></h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Профессиональное оборудование для создания современных пространств</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                // Products from custom post type or regular posts
                $products_args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 6,
                    'post_status'    => 'publish',
                );
                
                $products_query = new WP_Query($products_args);
                
                if ($products_query->have_posts()) :
                    while ($products_query->have_posts()) : $products_query->the_post();
                        $price = get_post_meta(get_the_ID(), '_product_price', true);
                        $features = get_post_meta(get_the_ID(), '_product_features', true);
                ?>
                    <!-- Product Card -->
                    <div class="glass-card rounded-3xl p-6 group cursor-pointer">
                        <div class="img-glass mb-6 aspect-[4/3]">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'sti-product'); ?>" 
                                     alt="<?php the_title_attribute(); ?>" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-default.jpg" 
                                     alt="<?php the_title_attribute(); ?>" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <?php endif; ?>
                        </div>
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-semibold"><?php the_title(); ?></h3>
                            <?php if ($price) : ?>
                                <span class="text-2xl font-bold text-gradient"><?php echo esc_html($price); ?> ₽</span>
                            <?php endif; ?>
                        </div>
                        <p class="text-gray-400 text-sm mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <?php if ($features) : ?>
                            <div class="flex gap-2 flex-wrap">
                                <?php foreach (explode(',', $features) as $feature) : ?>
                                    <span class="px-3 py-1 rounded-full bg-white/5 text-xs text-gray-300 border border-white/10"><?php echo esc_html(trim($feature)); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Default products if no custom post types exist
                    $default_products = array(
                        array(
                            'title' => 'Интерактивная панель 65"',
                            'price' => '120 000',
                            'desc' => 'Идеально для небольших переговорных и учебных классов',
                            'features' => array('4K', '20 касаний'),
                            'image' => 'product-65.jpg',
                        ),
                        array(
                            'title' => 'Интерактивная панель 86"',
                            'price' => '210 000',
                            'desc' => 'Для больших аудиторий и конференц-залов',
                            'features' => array('4K', '40 касаний'),
                            'image' => 'product-86.jpg',
                        ),
                        array(
                            'title' => 'Сенсорная плёнка PCAP',
                            'price' => '45 000',
                            'desc' => 'Превратит любую поверхность в сенсорную',
                            'features' => array('Прозрачная', 'До 100"'),
                            'image' => 'product-pcap.jpg',
                        ),
                        array(
                            'title' => 'Сенсорная рамка IR',
                            'price' => '35 000',
                            'desc' => 'Инфракрасная технология для любых дисплеев',
                            'features' => array('Любой размер', 'Легкая установка'),
                            'image' => 'product-ir.jpg',
                        ),
                        array(
                            'title' => 'Сенсорный киоск 32-55"',
                            'price' => '180 000',
                            'desc' => 'Для навигации и самообслуживания',
                            'features' => array('Напольный', 'Windows/Android'),
                            'image' => 'product-kiosk.jpg',
                        ),
                        array(
                            'title' => 'Настенная стойка',
                            'price' => '8 000',
                            'desc' => 'Надёжное крепление для панелей',
                            'features' => array('VESA', 'До 100 кг'),
                            'image' => 'product-bracket.jpg',
                        ),
                    );
                    
                    foreach ($default_products as $product) :
                ?>
                    <div class="glass-card rounded-3xl p-6 group cursor-pointer">
                        <div class="img-glass mb-6 aspect-[4/3]">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $product['image']; ?>" 
                                 alt="<?php echo $product['title']; ?>" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-semibold"><?php echo $product['title']; ?></h3>
                            <span class="text-2xl font-bold text-gradient"><?php echo $product['price']; ?> ₽</span>
                        </div>
                        <p class="text-gray-400 text-sm mb-4"><?php echo $product['desc']; ?></p>
                        <div class="flex gap-2 flex-wrap">
                            <?php foreach ($product['features'] as $feature) : ?>
                                <span class="px-3 py-1 rounded-full bg-white/5 text-xs text-gray-300 border border-white/10"><?php echo $feature; ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Calculator Section -->
    <section id="calculator" class="py-24 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-5xl mx-auto">
            <div class="glass-strong rounded-[40px] p-8 sm:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl -mr-32 -mt-32"></div>
                
                <div class="relative z-10 grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-bold mb-4">Рассчитайте стоимость <span class="text-gradient">под ключ</span></h2>
                        <p class="text-gray-400 mb-8">Ответьте на 4 вопроса и получите ориентировочную стоимость оборудования и монтажа за 2 минуты</p>
                        
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10">
                                <div class="w-10 h-10 rounded-full bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold">1</div>
                                <span class="text-gray-300">Выберите тип помещения</span>
                            </div>
                            <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10">
                                <div class="w-10 h-10 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-400 font-bold">2</div>
                                <span class="text-gray-300">Укажите размер диагонали</span>
                            </div>
                            <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10">
                                <div class="w-10 h-10 rounded-full bg-pink-500/20 flex items-center justify-center text-pink-400 font-bold">3</div>
                                <span class="text-gray-300">Выберите дополнительные опции</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass rounded-3xl p-8 text-center">
                        <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/30">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Быстрый расчёт</h3>
                        <p class="text-gray-400 mb-6">Получите предварительную смету сразу после заполнения</p>
                        <button class="btn-primary w-full py-4 rounded-2xl text-base font-semibold" onclick="document.getElementById('contact-form').scrollIntoView({behavior: 'smooth'})">
                            Начать расчёт
                        </button>
                        <p class="text-xs text-gray-500 mt-4">
                            Или позвоните: <a href="tel:<?php echo esc_attr(get_theme_mod('sti_phone', '79991234567')); ?>" class="text-indigo-400 hover:text-indigo-300"><?php echo esc_html(get_theme_mod('sti_phone', '+7 (999) 123-45-67')); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section id="solutions" class="py-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl font-bold mb-4">Готовые <span class="text-gradient-2">решения</span></h2>
                <p class="text-gray-400 text-lg">для вашего бизнеса</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <?php
                $solutions = array(
                    array(
                        'title' => 'Образование',
                        'desc' => 'Интерактивные классы и цифровые доски для школ и университетов',
                        'icon' => 'education',
                        'image' => 'solution-education.jpg',
                        'color' => 'blue',
                    ),
                    array(
                        'title' => 'Бизнес',
                        'desc' => 'Переговорные комнаты и конференц-залы с удалённым управлением',
                        'icon' => 'business',
                        'image' => 'solution-business.jpg',
                        'color' => 'purple',
                    ),
                    array(
                        'title' => 'Госучреждения',
                        'desc' => 'Киоски самообслуживания и информационные терминалы',
                        'icon' => 'government',
                        'image' => 'solution-government.jpg',
                        'color' => 'green',
                    ),
                );
                
                foreach ($solutions as $solution) :
                ?>
                    <div class="glass-card rounded-3xl overflow-hidden group">
                        <div class="h-48 overflow-hidden">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $solution['image']; ?>" 
                                 alt="<?php echo $solution['title']; ?>" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="w-12 h-12 rounded-xl bg-<?php echo $solution['color']; ?>-500/20 flex items-center justify-center mb-4">
                                <?php if ($solution['icon'] === 'education') : ?>
                                    <svg class="w-6 h-6 text-<?php echo $solution['color']; ?>-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                <?php elseif ($solution['icon'] === 'business') : ?>
                                    <svg class="w-6 h-6 text-<?php echo $solution['color']; ?>-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                <?php else : ?>
                                    <svg class="w-6 h-6 text-<?php echo $solution['color']; ?>-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <h3 class="text-xl font-semibold mb-2"><?php echo $solution['title']; ?></h3>
                            <p class="text-gray-400 text-sm"><?php echo $solution['desc']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto glass-strong rounded-[40px] p-12 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 to-purple-600/20"></div>
            <div class="relative z-10">
                <h2 class="text-3xl sm:text-5xl font-bold mb-6">Готовы модернизировать <br>ваше пространство?</h2>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">Получите бесплатную консультацию и демонстрацию оборудования в нашем шоуруме в Сочи</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#contacts" class="btn-primary px-8 py-4 rounded-2xl text-base font-semibold">
                        Заказать консультацию
                    </a>
                    <a href="#" class="btn-glass px-8 py-4 rounded-2xl text-base font-semibold">
                        Скачать каталог (PDF)
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
