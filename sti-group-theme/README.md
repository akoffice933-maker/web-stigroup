# STI Group — WordPress Theme

Современная премиум WordPress-тема с glassmorphism дизайном для производителя интерактивных панелей и киосков.

## 🚀 Особенности

- **Современный дизайн** — Glassmorphism эффекты, анимированные градиенты, parallax
- **Полная адаптивность** — Отлично выглядит на всех устройствах
- **Tailwind CSS** — Утилитарные классы для быстрой стилизации
- **Оптимизированная производительность** — Lazy loading, минималистичный JS
- **SEO-готовая** — Правильная семантическая разметка
- **Customizer поддержка** — Настройка контактов через админку

## 📁 Структура темы

```
sti-group-theme/
├── style.css              # Основные стили + мета-информация темы
├── functions.php          # Функции темы
├── index.php              # Главный шаблон
├── front-page.php         # Шаблон главной страницы
├── single.php             # Шаблон записи
├── page.php               # Шаблон страницы
├── search.php             # Поиск
├── searchform.php         # Форма поиска
├── 404.php                # Страница 404
├── header.php             # Шапка
├── footer.php             # Подвал
├── screenshot.png         # Превью темы (1200x900)
├── assets/
│   ├── js/
│   │   └── main.js        # Основной JavaScript
│   └── images/            # Изображения темы
└── README.md              # Документация
```

## 🛠 Установка

### 1. Через админку WordPress

1. Скачайте папку `sti-group-theme`
2. Запакуйте в ZIP-архив
3. В админке WordPress: **Внешний вид → Темы → Добавить новую → Загрузить тему**
4. Выберите ZIP-файл и нажмите **Установить**
5. Активируйте тему

### 2. Через FTP

1. Скопируйте папку `sti-group-theme` в `/wp-content/themes/`
2. В админке WordPress: **Внешний вид → Темы**
3. Найдите "STI Group" и нажмите **Активировать**

## ⚙️ Настройка

### Меню

1. **Внешний вид → Меню**
2. Создайте новое меню
3. Добавьте страницы
4. Выберите расположение:
   - **Primary Menu** — главное меню в шапке
   - **Footer Menu** — меню в подвале

### Логотип

1. **Внешний вид → Настроить → Свойства сайта**
2. Загрузите логотип в поле **Логотип**
3. Рекомендуемый размер: 400×100px

### Контакты

1. **Внешний вид → Настроить → Contact Information**
2. Заполните:
   - Номер телефона
   - Email
   - Адрес

### Товары (Products)

Тема поддерживает custom post type **Products**. Для добавления товаров:

1. Установите плагин **Custom Post Type UI** или добавьте в `functions.php`:

```php
// Регистрация CPT Product
function sti_group_register_product_cpt() {
    register_post_type('product', array(
        'labels' => array(
            'name' => 'Товары',
            'singular_name' => 'Товар',
            'add_new' => 'Добавить товар',
            'add_new_item' => 'Добавить новый товар',
            'edit_item' => 'Редактировать товар',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'sti_group_register_product_cpt');

// Мета-поля для товара
function sti_group_product_meta_boxes() {
    add_meta_box('product_details', 'Детали товара', 'sti_group_product_meta_callback', 'product', 'side');
}
add_action('add_meta_boxes', 'sti_group_product_meta_boxes');

function sti_group_product_meta_callback($post) {
    wp_nonce_field('sti_group_save_product_meta', 'sti_group_product_nonce');
    $price = get_post_meta($post->ID, '_product_price', true);
    $features = get_post_meta($post->ID, '_product_features', true);
    ?>
    <p>
        <label for="product_price">Цена (₽):</label>
        <input type="text" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" style="width:100%">
    </p>
    <p>
        <label for="product_features">Особенности (через запятую):</label>
        <textarea id="product_features" name="product_features" style="width:100%"><?php echo esc_textarea($features); ?></textarea>
    </p>
    <?php
}

function sti_group_save_product_meta($post_id) {
    if (!isset($_POST['sti_group_product_nonce']) || !wp_verify_nonce($_POST['sti_group_product_nonce'], 'sti_group_save_product_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    
    if (isset($_POST['product_price'])) {
        update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
    }
    if (isset($_POST['product_features'])) {
        update_post_meta($post_id, '_product_features', sanitize_text_field($_POST['product_features']));
    }
}
add_action('save_post_product', 'sti_group_save_product_meta');
```

2. Добавьте товары через **Товары → Добавить новый**
3. Укажите цену и особенности в боковой панели

## 🎨 Кастомизация

### Цветовая схема

Измените градиенты в `style.css`:

```css
.text-gradient {
    background: linear-gradient(135deg, #fff 0%, #a5b4fc 50%, #c084fc 100%);
}

.btn-primary {
    background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
}
```

### Шрифты

Тема использует **Inter** и **SF Pro Display**. Для смены шрифтов отредактируйте `functions.php`:

```php
wp_enqueue_style('sti-group-google-fonts', 
    'https://fonts.googleapis.com/css2?family=YOUR_FONT&display=swap',
    array(),
    null
);
```

## 🚀 Деплой на WordPress

### WordPress.com (платный тариф)

1. **Дашборд → Развёртывания → Connect repository**
2. Авторизуйтесь в GitHub
3. Выберите репозиторий `sti-group-theme`
4. Настройте автоматический деплой

### Свой хостинг (GitHub Actions)

Создайте `.github/workflows/deploy.yml`:

```yaml
name: Deploy to WordPress

on:
  push:
    branches: [main]

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      
      - name: Deploy via rsync
        uses: burnett01/rsync-deployments@5.2
        with:
          switches: -avzr --delete
          path: sti-group-theme/
          remote_path: /var/www/html/wp-content/themes/sti-group-theme/
          remote_host: ${{ secrets.HOST }}
          remote_user: ${{ secrets.USER }}
          remote_key: ${{ secrets.SSH_KEY }}
```

## 📊 Производительность

### Рекомендации

1. **Скомпилируйте Tailwind CSS** для продакшена:

```bash
npm install -D tailwindcss
npx tailwindcss -o ./assets/css/tailwind.min.css --minify
```

2. **Оптимизируйте изображения**:
   - Конвертируйте в WebP
   - Используйте `srcset` для разных размеров

3. **Включите кэширование** через плагин (WP Rocket, W3 Total Cache)

## 🐛 Известные проблемы

- CDN Tailwind может замедлять загрузку в некоторых регионах
- Для production рекомендуется компилировать CSS

## 📝 Changelog

### 1.0.0 (2026)
- Первый релиз
- Glassmorphism дизайн
- Адаптивная вёрстка
- Базовые шаблоны WordPress

## 📄 Лицензия

GNU General Public License v2 or later

## 👨‍💻 Автор

**STI Group** — Производитель интерактивных панелей и киосков в Сочи

- Сайт: https://stigroup.ru
- Email: info@stigroup.ru

---

**Сделано с ❤️ в Сочи**
