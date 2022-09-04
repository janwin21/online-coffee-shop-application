import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/style.scss', 'resources/scss/fontawesome.scss',
                'resources/js/app.js',
                'resources/js/pages/home.js', 'resources/js/pages/drinks.js'
            ],
            refresh: true,
        }),
    ],
});
