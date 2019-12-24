"use strict";

let installPromptEvent;

window.addEventListener('beforeinstallprompt', (event) => {
    // Prevent Chrome <= 67 from automatically showing the prompt
    event.preventDefault();
    // Stash the event so it can be triggered later.
    installPromptEvent = event;
    addToHomeScreen();
    return false;
});

function addToHomeScreen() {
    if (installPromptEvent) {
        installPromptEvent.prompt();
        installPromptEvent.userChoice.then(function (choiceResult) {
            console.log(choiceResult.outcome);
            if (choiceResult.outcome === 'dismissed') {
                console.log('User cancelled installation');
            } else {
                console.log('User added to home screen');
            }
        });
        installPromptEvent = null;
    } else {
        console.log('Prompt fail ' + installPromptEvent);
    }
}

window.addEventListener('appinstalled', (event) => {
    console.log('Brinque Coin installed');
});
