var CACHE_STATIC_NAME = 'static-v11';
var CACHE_DYNAMIC_NAME = 'dynamic-v2';

self.addEventListener('install', function (event) {
  console.log('[SW] Installing Service Worker ...', event);
  event.waitUntil(
    caches.open(CACHE_STATIC_NAME)
      .then(function (cache) {
        console.log('[SW] Precaching App Shell');
        cache.addAll([
          '/',
          '/index.html',
          '/favicon.ico',
          '/contato/index.html',
          '/dica/index.html',
          '/dica/autonomia/index.html',
          '/dica/casa/index.html',
          '/dica/comportamento/index.html',
          '/dica/escola/index.html',
          '/dica/espiritualidade/index.html',
          '/dica/exercicio/index.html',
          '/dica/higiene/index.html',
          '/dica/refeicao/index.html',
          '/quadro/index.html',
          '/dica/dia/index.html',
          '/src/js/app.js',
          '/src/js/quadro.js',
          '/src/js/promise.js',
          '/src/js/fetch.js',
          '/src/css/app.css',
          '/src/css/dica.css',
          '/src/css/quadro.css',
          '/src/css/contato.css',
          '/src/images/main-image.jpg',
          '/src/images/icons/app-icon-144x144.png',
          '/src/images/emoticon/emoticon-neutral-outline.svg',
          '/src/images/emoticon/emoticon-cry-outline.svg',
          '/src/images/emoticon/emoticon-happy-outline.svg',
          'https://fonts.googleapis.com/css?family=Roboto:400,700',
          'https://fonts.googleapis.com/icon?family=Material+Icons',
          'https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.indigo-pink.min.css'
        ]);
      })
  )
});

self.addEventListener('activate', function (event) {
  console.log('[SW] Activating Service Worker ....', event);
  event.waitUntil(
    caches.keys()
      .then(function (keyList) {
        return Promise.all(keyList.map(function (key) {
          if (key !== CACHE_STATIC_NAME && key !== CACHE_DYNAMIC_NAME) {
            console.log('[SW] Removing old cache.', key);
            return caches.delete(key);
          }
        }));
      })
  );
  return self.clients.claim();
});

self.addEventListener('fetch', function (event) {
  event.respondWith(
    caches.match(event.request)
      .then(function (response) {
        if (response) {
          return response;
        } else {
          return fetch(event.request)
            .then(function (res) {
              return caches.open(CACHE_DYNAMIC_NAME)
                .then(function (cache) {
                  cache.put(event.request.url, res.clone());
                  return res;
                })
            })
            .catch(function (err) {
              console.log('[SW] Error on fetch!', err);
            });
        }
      })
  );
});