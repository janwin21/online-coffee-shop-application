/*
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
*/

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/style.scss', 'resources/scss/fontawesome.scss',
                'resources/js/app.js',
                'resources/js/pages/home.js', 'resources/js/pages/drinks.js',
                'resources/js/pages/queue.js', 'resources/js/pages/authentication.js',
                'resources/js/pages/dashboard.js'
            ],
            refresh: true,
        }),
    ],
});
