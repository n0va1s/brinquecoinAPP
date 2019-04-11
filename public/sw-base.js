
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

workbox.precaching.precacheAndRoute([]);