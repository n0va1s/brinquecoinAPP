//https://shareurcodes.com/blog/how-to-easily-convert-your-existing-laravel-application-into-a-progressive-web-app-by-using-workbox
importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.1.2/workbox-sw.js');

if (workbox) {
    console.log('Workbox is loaded');
    workbox.core.setCacheNameDetails({
        prefix: 'brinquecoin'
    });

    // 1. css
    workbox.routing.registerRoute(
        new RegExp('\.css$'),
        new workbox.strategies.CacheFirst({
            cacheName: 'brinquecoin-stylesheets',
            plugins: [
                new workbox.expiration.ExpirationPlugin({
                    maxAgeSeconds: 60 * 60 * 24 * 7, // cache for one week
                    maxEntries: 20, // only cache 20 request
                    purgeOnQuotaError: true
                })
            ]
        })
    );

    // 2. images
    workbox.routing.registerRoute(
        new RegExp('\.(png|svg|jpg|jpeg)$'),
        new workbox.strategies.CacheFirst({
            cacheName: 'brinquecoin-images',
            plugins: [
                new workbox.expiration.ExpirationPlugin({
                    maxAgeSeconds: 60 * 60 * 24 * 7,
                    maxEntries: 50,
                    purgeOnQuotaError: true
                })
            ]
        })
    );

    // materialize css
    workbox.routing.registerRoute(
        new RegExp('https://cdnjs.cloudflare.com/(.*)'),
        new workbox.strategies.CacheFirst({
            cacheName: 'brinquecoin-materializecss',
            plugins: [
                new workbox.cacheableResponse.CacheableResponsePlugin({
                    statuses: [0, 200],
                }),
            ],
        })
    );

    // cache google fonts
    workbox.routing.registerRoute(
        new RegExp('https://fonts.(?:googleapis|gstatic).com/(.*)'),
        new workbox.strategies.CacheFirst({
            cacheName: 'brinquecoin-fonts',
            plugins: [
                new workbox.cacheableResponse.CacheableResponsePlugin({
                    statuses: [0, 200],
                }),
            ],
        })
    );

    //Giving Offline Support with a fallback page
    const networkFirstHandler = new workbox.strategies.NetworkFirst({
        cacheName: 'brinquecoin-dynamic',
        plugins: [
            new workbox.expiration.ExpirationPlugin({
                maxEntries: 10
            }),
            new workbox.cacheableResponse.CacheableResponsePlugin({
                statuses: [200]
            })
        ]
    });

    const FALLBACK_URL = workbox.precaching.getCacheKeyForURL('/offline.html');
    const matcher = ({
        event
    }) => event.request.mode === 'navigate';
    const handler = args =>
        networkFirstHandler
        .handle(args)
        .then(response => response || caches.match(FALLBACK_URL))
        .catch(() => caches.match(FALLBACK_URL));

    workbox.routing.registerRoute(matcher, handler);

    workbox.precaching.precacheAndRoute([{"revision":"d41d8cd98f00b204e9800998ecf8427e","url":"css/app.css"},{"revision":"21b275af1a58f4d527e62529dc2cabcb","url":"favicon.ico"},{"revision":"1e8f0c73e49773798428f32214cd38ee","url":"img/boards/0.png"},{"revision":"fa01c2564f2d1d0544701ad7b93eebf5","url":"img/boards/1.png"},{"revision":"7a296d3848c9e1795bd1acbbcb08ce1e","url":"img/boards/2.png"},{"revision":"3a3414b830b6543e9ad091e88fa03ff2","url":"img/boards/ferias.jpg"},{"revision":"9a93c1ba07f1e455f0c04ace739eff4a","url":"img/boards/habito.jpg"},{"revision":"0c64feb4321e9d78d277113cf8e27d2e","url":"img/boards/mesada.jpg"},{"revision":"4726b18c4656b6ad51cc21f7a930de9b","url":"img/boards/tarefas.jpg"},{"revision":"d77fd5c8b7530a8ca4b9769474b60b99","url":"img/brinquecoin.png"},{"revision":"561794a273292f6382b14daee93683de","url":"img/capsula.jpg"},{"revision":"c9cdac75983df89640f23b31e8d4cb84","url":"img/icons/app-icon-144-144.png"},{"revision":"e6184f3234b98a03a2b29ae024385429","url":"img/icons/app-icon-152-152.png"},{"revision":"d587bae98fa28a31d649393b9de1710b","url":"img/icons/app-icon-192-192.png"},{"revision":"0bfc717e0c8014b636c1ffff4e1eff3a","url":"img/icons/app-icon-256-256.png"},{"revision":"eac970e8c06bbbefcd8fb5252a400861","url":"img/icons/app-icon-384-384.png"},{"revision":"eddf8707187ad58792d8603b37b7ae45","url":"img/icons/app-icon-48-48.png"},{"revision":"d3d016383f5bca0b6342eaf5b50ac683","url":"img/icons/app-icon-512-512.png"},{"revision":"ccadfc74c69f691e3436b742db70c184","url":"img/icons/app-icon-96-96.png"},{"revision":"e416d2c67b01744f7a3ca1347fc6b80e","url":"img/offline.jpg"},{"revision":"3463ecefcbaa92cce0e1ed75eba75edf","url":"img/quadro.png"},{"revision":"b9901d13f00ef92e0793e2d9fcd57431","url":"index.php"},{"revision":"b6c3f7ea90d01fa7992d6243c99fad1f","url":"js/app.js"},{"revision":"c80e1b76d9c08b1623b07c198919a294","url":"js/board.js"},{"revision":"6b82fbb55ae19be4935964ae8c338e92","url":"js/fetch.js"},{"revision":"017ced36d82bea1e08b08393361e354d","url":"js/idb.js"},{"revision":"5d67a93acd7b944f37eee4bb507048f9","url":"js/install.js"},{"revision":"10c2238dcd105eb23f703ee53067417f","url":"js/promise.js"},{"revision":"4853a87685922cdf08b8bc5ed3f6f85e","url":"js/utility.js"},{"revision":"d170ff0d500ac70647037afce29cbf70","url":"offline.html"}]);

    // add offline analytics
    workbox.googleAnalytics.initialize();

    /* Install a new service worker and have it update
    and control a web page as soon as possible
    */

    workbox.core.skipWaiting();
    workbox.core.clientsClaim();

} else {
    console.log('Oops! Workbox didnt load');
}
