import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        // FIX: Expose Vite dev server on all interfaces so Ngrok can tunnel it.
        // Without host: '0.0.0.0', the dev server only listens on localhost
        // and assets served by @vite() will 404 through the Ngrok URL.
        host: '0.0.0.0',
        // FIX: Allow Ngrok domains. Vite 5+ blocks unknown Host headers by
        // default. Setting this to 'all' allows any host including Ngrok URLs.
        allowedHosts: 'all',
        hmr: {
            // Use the VITE_DEV_SERVER_URL env var if set (your Ngrok URL),
            // otherwise fall back to localhost for local development.
            host: process.env.VITE_DEV_SERVER_URL
                ? new URL(process.env.VITE_DEV_SERVER_URL).hostname
                : 'localhost',
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
