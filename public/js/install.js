'use strict';

let deferredInstallPrompt = null;
const installButton = document.getElementById('install');
installButton.addEventListener('click', installPWA);

window.addEventListener('beforeinstallprompt', saveBeforeInstallPromptEvent);

function saveBeforeInstallPromptEvent(evt) {
    deferredInstallPrompt = evt;
    installButton.removeAttribute('hidden');

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
    evt.srcElement.setAttribute('hidden', true);
}

function logAppInstalled(evt) {
    console.log('Brinque Coin as installed.', evt);
}