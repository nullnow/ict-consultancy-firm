import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { bunny } from "laravel-vite-plugin/fonts";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/favicons/apple-touch-icon.png",
                "resources/favicons/favicon-96x96.png",
                "resources/favicons/favicon.ico",
                "resources/favicons/favicon.svg",
                "resources/favicons/site.webmanifest",
                "resources/favicons/web-app-manifest-192x192.png",
                "resources/favicons/web-app-manifest-512x512.png",
                "resources/images/opes-clientele/tanesco.png",
                "resources/images/opes-clientele/savanna.png",
                "resources/images/opes-clientele/radiomaria.png",
                "resources/images/opes-clientele/posta.png",
                "resources/images/opes-clientele/nissan.png",
                "resources/images/opes-clientele/lakegas.png",
                "resources/images/opes-clientele/equity.png",
                "resources/images/opes-clientele/crdb.png",
                "resources/images/opes-clientele/china-dasheng.png",
                "resources/images/opes-clientele/anglo-Gold.png",
                "resources/images/Opes-logo.png",
            ],
            refresh: true,
            fonts: [
                bunny("Instrument Sans", {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
