<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class('text-white antialiased'); ?>>
<?php wp_body_open(); ?>

    <!-- Background -->
    <div class="gradient-bg"></div>
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>

    <!-- Navigation -->
    <nav class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-[95%] max-w-5xl">
        <div class="nav-pill px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-bold text-lg shadow-lg">
                        STI
                    </div>
                    <span class="font-semibold text-lg tracking-tight hidden sm:block">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white hover:text-indigo-300 transition-colors">
                            <?php bloginfo('name'); ?>
                        </a>
                    </span>
                <?php endif; ?>
            </div>
            
            <!-- Primary Menu -->
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-300">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex items-center gap-8',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                    'add_li_class'   => '',
                    'walker'         => new Walker_Nav_Menu(),
                ));
                ?>
            </div>

            <!-- CTA Button -->
            <?php if (get_theme_mod('sti_phone')) : ?>
                <a href="tel:<?php echo esc_attr(get_theme_mod('sti_phone')); ?>" class="btn-primary px-6 py-2.5 rounded-full text-sm font-semibold text-white hidden sm:flex items-center gap-2">
                    <?php echo sti_group_get_icon('phone'); ?>
                    <span><?php echo esc_html(get_theme_mod('sti_phone')); ?></span>
                </a>
            <?php else : ?>
                <button class="btn-primary px-6 py-2.5 rounded-full text-sm font-semibold text-white" onclick="document.getElementById('contacts').scrollIntoView({behavior: 'smooth'})">
                    Заказать звонок
                </button>
            <?php endif; ?>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white" id="mobile-menu-btn" aria-label="Открыть меню">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden glass-strong rounded-2xl mt-4 p-6" id="mobile-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex flex-col gap-4',
                'fallback_cb'    => false,
                'depth'          => 1,
            ));
            ?>
        </div>
    </nav>
