import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
				'resources/js/modal1.js',
                'https://code.jquery.com/jquery-3.3.1.slim.min.js',
                'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js',
                'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js',
            ],
            refresh: true,
        }),
    ],
});