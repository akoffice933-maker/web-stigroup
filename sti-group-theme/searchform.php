<?php
/**
 * Search Form Template
 *
 * @package STI_Group
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="glass-strong rounded-2xl p-2 flex items-center gap-2 max-w-md mx-auto">
        <input 
            type="search" 
            class="flex-1 bg-transparent border-none outline-none px-4 py-3 text-white placeholder-gray-500"
            placeholder="Поиск по сайту…" 
            value="<?php echo get_search_query(); ?>" 
            name="s" 
            aria-label="Поиск"
        />
        <button type="submit" class="btn-primary px-6 py-3 rounded-xl text-white flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <span class="hidden sm:inline">Найти</span>
        </button>
    </div>
</form>
