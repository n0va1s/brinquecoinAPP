'use strict';

let deferredInstallPrompt = null;
const installButton = document.getElementById('butInstall');
installButton.addEventListener('click', installPWA);

window.addEventListener('beforeinstallprompt', saveBeforeInstallPromptEvent);

function saveBeforeInstallPromptEvent(evt) {
    evt.preventDefault();
    deferredInstallPrompt = evt;
    installButton.setAttribute('visibility', 'visible');

    deferredInstallPrompt.userChoice
        .then((choice) => {
            if (choice.outcome === 'accepted') {
                console.log('User accepted the A2HS prompt', choice);
            } else {
                console.log('User dismissed the A2HS prompt', choice);
            }
            deferredInstallPrompt = null;
        });
}

function installPWA(evt) {
    deferredInstallPrompt.prompt();
    window.addEventListener('appinstalled', logAppInstalled);
    evt.srcElement.setAttribute('visibility', 'hidden');
}

function logAppInstalled(evt) {
    console.log('Brinque Coin as installed.', evt);
}
