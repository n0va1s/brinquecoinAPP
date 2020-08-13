let deferredPrompt;
let btnAdd = document.getElementById('optInstall');

window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;
    if (btnAdd) {
        // Installation must be done by a user gesture! Here, the button click
        btnAdd.addEventListener('click', (e) => {
            // Show the prompt
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            deferredPrompt.userChoice
                .then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('USER: confirmed');
                        // hide our user interface that shows our A2HS button
                        btnAdd.style.display = 'none';
                    } else {
                        console.log('USER: cancelled');
                        // show our user interface that shows our A2HS button
                        btnAdd.style.display = 'block';
                    }
                    deferredPrompt = null;
                });
        });
    }
});

window.addEventListener('appinstalled', (e) => {
    if (btnAdd) {
        btnAdd.style.display = 'none';
    }
    console.log('INSTALL: success');
});

// To know the display mode to analytics and hidden button on mobile standalone
window.addEventListener('DOMContentLoaded', () => {
    let displayMode = 'browser tab';
    let pwa = false;
    if (navigator.standalone) {
        displayMode = 'standalone-ios';
        pwa = true;
    }
    if (window.matchMedia('(display-mode: standalone)').matches) {
        displayMode = 'standalone';
        pwa = true;
    }
    if (btnAdd && pwa) {
        btnAdd.style.display = 'none';
    }
    // Log launch display mode to analytics
    console.log('DISPLAY_MODE_LAUNCH:', displayMode);
});
