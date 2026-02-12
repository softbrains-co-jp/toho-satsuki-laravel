import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import fs from 'fs';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    const isLocal = env.APP_ENV === 'local';
    console.log('mode:', env.APP_ENV); // ←ここで値を表示

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            tailwindcss(),
        ],
        server: isLocal
            ? {
                host: '0.0.0.0',
                port: 5173,
                cors: true,
                https: {
                    key: fs.readFileSync('/etc/apache2/ssl/satsuki.key'),
                    cert: fs.readFileSync('/etc/apache2/ssl/satsuki.crt'),
                },
                hmr: {
                    host: 'local.satsuki.toho-system.com',
                },
            }
            : undefined,
    };
});
