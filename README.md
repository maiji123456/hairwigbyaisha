# LuxeHair by Aisha — Laravel

Static marketing site migrated from plain HTML to Laravel 12 + Blade. No database, no npm/Vite.

## Run locally
```
composer install
cp .env.example .env
php artisan key:generate
php artisan serve        # http://localhost:8000
php artisan test         # optional smoke tests
```
Requires PHP 8.2+.

## Where things live
- `routes/web.php` — `/`, `/robots.txt`, `/sitemap.xml`
- `config/site.php` — all content (nav, products, services, testimonials, SEO defaults, Tawk.to id)
- `resources/views/layouts` — layout, header, footer, SEO/structured data, Tawk.to
- `resources/views/sections` — one partial per page section; `resources/views/components` — repeated cards
- `public/css/styles.css`, `public/js/site.js`, `public/assets/{images,video}`
- `unused-assets/` — files from the original export that the page never referenced (kept, not served)
