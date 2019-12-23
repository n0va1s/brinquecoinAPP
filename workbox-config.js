module.exports = {
    "globDirectory": "public/",
    "globPatterns": [
        "**/*.{css,js,png,svg,jpg,jpeg,ico,php}",
        "offline.html"
    ],
    "swDest": "public/sw.js",
    "swSrc": "public/sw-base.js",
    "globIgnores": [
        '../workbox-cli-config.js']
};
