"use strict";

var deferredPrompt;

window.addEventListener('beforeinstallprompt', function (e) {
    console.log('beforeinstallprompt' + e);
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;

    showAddToHomeScreen();

});

function showAddToHomeScreen() {
    console.log('showAddToHomeScreen');
    var optInstall = document.querySelector('#optInstall');
    // Show the user interface that shows the install option
    optInstall.style.display = 'block';
    // Set event to click
    optInstall.addEventListener('click', addToHomeScreen);

}

function addToHomeScreen() {
    console.log('addToHomeScreen');
    // Hide the user interface that shows the install option
    var optInstall = document.querySelector('#optInstall');
    optInstall.style.display = 'none';
    // Show the prompt
    deferredPrompt.prompt();
    // Wait user to respond to the prompt
    deferredPrompt.userChoice
        .then(function (choiceResult) {
            if (choiceResult.outcome === 'accepted') {
                console.log('User accepted the A2HS prompt');
            } else {
                console.log('User dismissed the A2HS prompt');
            }
            deferredPrompt = null;
        });
}

window.addEventListener('appinstalled', function (e) {
    console.log('Brinque Coin installed');
    var optInstall = document.querySelector('#optInstall');
    optInstall.style.display = 'none';
});
