import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/map/map.js",
                "resources/js/notifications/notifications.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],

    server: {
        host: "localhost",
        port: 5173,
    },
});
