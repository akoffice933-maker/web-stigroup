<?php
/**
 * 404 Error Page Template
 *
 * @package STI_Group
 */

get_header();
?>

    <main class="relative min-h-screen pt-32 pb-20 px-4 sm:px-6 lg:px-8 flex items-center">
        <div class="max-w-3xl mx-auto text-center">
            
            <div class="mb-8">
                <div class="text-9xl font-bold text-gradient mb-4">404</div>
                <div class="w-24 h-1 mx-auto bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full"></div>
            </div>

            <h1 class="text-3xl sm:text-4xl font-bold mb-4">Страница не найдена</h1>
            
            <p class="text-gray-400 text-lg mb-8 max-w-md mx-auto">
                К сожалению, страница, которую вы ищете, не существует или была перемещена.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary px-8 py-4 rounded-2xl text-base font-semibold">
                    Вернуться на главную
                </a>
                <button onclick="history.back()" class="btn-glass px-8 py-4 rounded-2xl text-base font-semibold">
                    Назад
                </button>
            </div>

            <!-- Quick Links -->
            <div class="mt-16 grid sm:grid-cols-3 gap-6">
                <a href="#products" class="glass rounded-2xl p-6 hover:bg-white/5 transition-colors">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-indigo-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    <div class="font-semibold">Продукция</div>
                </a>
                <a href="#solutions" class="glass rounded-2xl p-6 hover:bg-white/5 transition-colors">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-purple-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <div class="font-semibold">Решения</div>
                </a>
                <a href="#contacts" class="glass rounded-2xl p-6 hover:bg-white/5 transition-colors">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-pink-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="font-semibold">Контакты</div>
                </a>
            </div>

        </div>
    </main>

<?php
get_footer();
