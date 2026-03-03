    <!-- Footer -->
    <footer id="contacts" class="border-t border-white/10 py-12 px-4 sm:px-6 lg:px-8 mt-12">
        <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-bold text-lg shadow-lg">
                            STI
                        </div>
                        <span class="font-semibold text-xl"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </div>
                <p class="text-gray-400 text-sm max-w-xs">
                    <?php echo esc_html(get_bloginfo('description')); ?>
                </p>
                
                <!-- Social Links -->
                <div class="flex gap-4 mt-6">
                    <a href="#" class="w-10 h-10 rounded-full glass flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="Telegram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.648 6.648c-.21.993-.675 3.385-.91 4.648-.112.6-.333.803-.546.823-.465.043-.818-.307-1.27-.604-.705-.463-1.103-.75-1.782-1.197-.79-.52-.278-.812.172-1.28.116-.12 2.124-1.948 2.163-2.113.005-.023.01-.108-.042-.154-.052-.046-.128-.03-.183-.018-.78.177-13.227 5.257-13.93 5.558-.67.288-1.297.576-1.297.97 0 .295.174.58.65.768 5.01 1.97 8.35 3.286 10.02 3.943 4.757 1.878 5.728 1.57 6.338.738.61-.832.873-3.79 1.077-5.67.018-.165-.156-.24-.295-.172z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full glass flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="WhatsApp">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full glass flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="VK">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M15.073 2H8.937C5.027 2 2 4.988 2 8.937v6.125C2 18.973 4.988 22 8.937 22h6.125C18.973 22 22 19.012 22 15.073V8.937C22 5.027 19.012 2 15.073 2zM17.83 14.14c.35.35.63.64.89.89.27.26.56.47.87.64.31.17.6.25.87.25h1.55v1.88h-2.17c-.66 0-1.25-.15-1.77-.44-.52-.29-.97-.66-1.36-1.11-.39-.45-.73-.94-1.03-1.47-.3-.53-.58-1.08-.85-1.65-.26.57-.55 1.13-.86 1.68-.31.55-.67 1.05-1.07 1.51-.4.46-.86.84-1.39 1.14-.53.3-1.13.45-1.81.45h-2.17v-1.88h1.55c.27 0 .55-.08.85-.25.3-.17.58-.39.85-.65.27-.26.53-.55.79-.87.26-.32.5-.65.73-.99.23-.34.44-.68.63-1.02.19-.34.36-.66.51-.97.15-.31.28-.59.39-.85.11-.26.2-.48.27-.67.07-.19.12-.33.15-.43.03-.1.05-.16.05-.18v-.02c0-.02-.02-.08-.05-.18-.03-.1-.08-.24-.15-.43-.07-.19-.16-.41-.27-.67-.11-.26-.24-.54-.39-.85-.15-.31-.32-.63-.51-.97-.19-.34-.4-.68-.63-1.02-.23-.34-.47-.67-.73-.99-.26-.32-.52-.61-.79-.87-.27-.26-.55-.48-.85-.65-.3-.17-.58-.25-.85-.25H6.45V4.12h2.17c.68 0 1.28.15 1.81.45.53.3.99.68 1.39 1.14.4.46.76.96 1.07 1.51.31.55.6 1.11.86 1.68.27-.57.55-1.12.85-1.65.3-.53.64-1.02 1.03-1.47.39-.45.84-.82 1.36-1.11.52-.29 1.11-.44 1.77-.44h2.17v1.88h-1.55c-.27 0-.56.08-.87.25-.31.17-.6.38-.87.64-.26.25-.54.54-.89.89-.35.35-.68.73-1 1.14-.32.41-.62.84-.89 1.29-.27.45-.51.91-.72 1.37-.21.46-.39.91-.54 1.35-.15.44-.27.85-.36 1.24-.09.39-.16.74-.2 1.06-.04.32-.06.59-.06.82 0 .23.02.5.06.82.04.32.11.67.2 1.06.09.39.21.8.36 1.24.15.44.33.89.54 1.35.21.46.45.92.72 1.37.27.45.57.88.89 1.29.32.41.65.79 1 1.14z"/></svg>
                    </a>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="font-semibold mb-4">Контакты</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <?php if (get_theme_mod('sti_address')) : ?>
                        <li class="flex items-start gap-2">
                            <?php echo sti_group_get_icon('location'); ?>
                            <span><?php echo esc_html(get_theme_mod('sti_address')); ?></span>
                        </li>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('sti_phone')) : ?>
                        <li>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('sti_phone')); ?>" class="hover:text-white transition-colors flex items-center gap-2">
                                <?php echo sti_group_get_icon('phone'); ?>
                                <span><?php echo esc_html(get_theme_mod('sti_phone')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('sti_email')) : ?>
                        <li>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('sti_email')); ?>" class="hover:text-white transition-colors flex items-center gap-2">
                                <?php echo sti_group_get_icon('email'); ?>
                                <span><?php echo esc_html(get_theme_mod('sti_email')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            
            <!-- Working Hours -->
            <div>
                <h4 class="font-semibold mb-4">Режим работы</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li>Пн-Пт: 9:00 - 18:00</li>
                    <li>Сб: 10:00 - 16:00</li>
                    <li>Вс: выходной</li>
                </ul>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="max-w-7xl mx-auto mt-12 pt-8 border-t border-white/10 text-center text-sm text-gray-500">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Все права защищены.</p>
            <?php if (has_nav_menu('footer')) : ?>
                <div class="mt-4">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'flex justify-center gap-6',
                        'depth'          => 1,
                    ));
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
