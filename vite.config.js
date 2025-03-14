import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/vendor/libs/bootstrap/css/bootstrap.min.css',
                'resources/css/simple-lightbox.min.css',
                'resources/sass/backend/main.scss',
                'resources/sass/frontend/common.scss',
                'Modules/FoodMenu/resources/assets/sass/backend/foodmenu.scss',
                'Modules/FoodMenu/resources/assets/sass/frontend/menu.scss',
                'resources/js/app.js',      
                'resources/assets/vendor/libs/jquery/jquery.js',
                'resources/assets/vendor/libs/bootstrap/js/bootstrap.bundle.min.js',
                'resources/js/simple-lightbox.jquery.min.js',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
