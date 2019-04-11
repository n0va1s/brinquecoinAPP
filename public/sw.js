
importScripts("https://storage.googleapis.com/workbox-cdn/releases/4.2.0/workbox-sw.js");

workbox.routing.registerRoute(
    /.*(?:googleapis|gstatic)\.com.*$/, 
    new workbox.strategies.StaleWhileRevalidate({
      cacheName: 'google-fonts',
      cacheExpiration: {
        maxEntries: 3,
        maxAgeSeconds: 60 * 60 * 24 * 30
      }
  })
);
  
workbox.routing.registerRoute(
    'https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.indigo-pink.min.css', 
    new workbox.strategies.StaleWhileRevalidate({
      cacheName: 'material-css'
    })
);

workbox.precaching.precacheAndRoute([
  {
    "url": "contato/index.html",
    "revision": "8cfab145d9db7ad2ee4517aa77d599dd"
  },
  {
    "url": "dica/autonomia/index.html",
    "revision": "5ebefcc539d0254b8f157222822bbe58"
  },
  {
    "url": "dica/casa/index.html",
    "revision": "df9a2351a8c7d1f86c4f67aeb7cc330d"
  },
  {
    "url": "dica/comportamento/index.html",
    "revision": "ccd2aa08d9ce438dfbb0972a7cd77cd5"
  },
  {
    "url": "dica/escola/index.html",
    "revision": "0386ed471edecb14fe997ce9aaae951b"
  },
  {
    "url": "dica/espiritualidade/index.html",
    "revision": "778b9d74a7907f41c06fc8f7aaab9c52"
  },
  {
    "url": "dica/exercicio/index.html",
    "revision": "66935d86581d11ce41bbb91f2cc8f6f4"
  },
  {
    "url": "dica/higiene/index.html",
    "revision": "33331405adf4c5e70f7cbeb0fe7248f5"
  },
  {
    "url": "dica/index.html",
    "revision": "129a09dc23e3eee95d8ec81b50abe9cc"
  },
  {
    "url": "dica/refeicao/index.html",
    "revision": "e266367d0bd38fc4ae12e96a8cc9d5d9"
  },
  {
    "url": "favicon.ico",
    "revision": "2437ec5d502a81525d985a75c1c408b3"
  },
  {
    "url": "index.html",
    "revision": "c4d0115d92ff3495cdef45bd713fa0c9"
  },
  {
    "url": "manifest.json",
    "revision": "6bf117cf559c0283c1b5714b51c0a670"
  },
  {
    "url": "quadro/dia/index.html",
    "revision": "44f651b67c1131af4c77d0783ddc8bbb"
  },
  {
    "url": "quadro/index.html",
    "revision": "23289d4b54ec8bb7953c9b3f3ef7b5a0"
  },
  {
    "url": "src/css/app.css",
    "revision": "0b86bd63ab651f659ef05f1486f60c52"
  },
  {
    "url": "src/css/contato.css",
    "revision": "e6d59c69eb9efe4ff18fc9ed8e6af0f3"
  },
  {
    "url": "src/css/dica.css",
    "revision": "460349a2d05f224d7632d155e05b7d44"
  },
  {
    "url": "src/css/quadro.css",
    "revision": "a9093e7ddc143b3c2e183eed03d447e8"
  },
  {
    "url": "src/images/emoticon/emoticon-cool-outline.svg",
    "revision": "1518b9767e75f1f6bdb8e1c3f0b64613"
  },
  {
    "url": "src/images/emoticon/emoticon-cry-outline.svg",
    "revision": "9c534f13cdeeebf1f15a38687a78cc68"
  },
  {
    "url": "src/images/emoticon/emoticon-dead-outline.svg",
    "revision": "51e72a7794e770c075930ee21627a4f5"
  },
  {
    "url": "src/images/emoticon/emoticon-happy-outline.svg",
    "revision": "335e5b464226b2749e4b27e7cfd04168"
  },
  {
    "url": "src/images/emoticon/emoticon-kiss-outline.svg",
    "revision": "18dd1d5195da8464bc097a04bf06f84c"
  },
  {
    "url": "src/images/emoticon/emoticon-neutral-outline.svg",
    "revision": "70430c7596fb6cf2727241f293de26be"
  },
  {
    "url": "src/images/emoticon/emoticon-outline.svg",
    "revision": "b09fa6b4c3b3f302ef60ba48c025060a"
  },
  {
    "url": "src/images/emoticon/emoticon-sad-outline.svg",
    "revision": "1c45af897d9c35615c65edd4f540de1b"
  },
  {
    "url": "src/js/app.js",
    "revision": "a82537f65ff4acf50e806575efad297f"
  },
  {
    "url": "src/js/atividade.js",
    "revision": "2df11114d9d3bca83503fe3501fe69eb"
  },
  {
    "url": "src/js/dia.js",
    "revision": "f5a65a4b214fc887425dfc24c2449e84"
  },
  {
    "url": "src/js/fetch.js",
    "revision": "6b82fbb55ae19be4935964ae8c338e92"
  },
  {
    "url": "src/js/material.min.js",
    "revision": "713af0c6ce93dbbce2f00bf0a98d0541"
  },
  {
    "url": "src/js/promise.js",
    "revision": "10c2238dcd105eb23f703ee53067417f"
  },
  {
    "url": "src/js/quadro.js",
    "revision": "030a232eae3bbbc4a1421d1b9a854f0f"
  },
  {
    "url": "sw_old.js",
    "revision": "2496db527f4a983e91c48a7b3561585d"
  },
  {
    "url": "sw-base.js",
    "revision": "fdf35cc89eb4dbc2313917a235996bba"
  },
  {
    "url": "src/images/main-image-lg.jpg",
    "revision": "7296e8e395f81aaa87dfc51f464e24a5"
  },
  {
    "url": "src/images/main-image-sm.jpg",
    "revision": "177d207b57a09b89ff941658b8408bb8"
  },
  {
    "url": "src/images/main-image.jpg",
    "revision": "73c2bcd3c34ad972ae2c6341351c8366"
  },
  {
    "url": "src/images/icons/app-icon-144x144.png",
    "revision": "f91b1894dc1ee5e5cfeffe349e063729"
  }
]);