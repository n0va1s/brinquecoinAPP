let deferredPrompt;
const btnAdd;

window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;
    btnAdd = document.getElementById('optInstall');
    if (btnAdd) {
        // Installation must be done by a user gesture! Here, the button click
        btnAdd.addEventListener('click', (e) => {
            // Show the prompt
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            deferredPrompt.userChoice
                .then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User confirmed installation');
                        // hide our user interface that shows our A2HS button
                        btnAdd.style.visibility = 'hidden';
                    } else {
                        console.log('User cancelled installation');
                        // show our user interface that shows our A2HS button
                        btnAdd.style.visibility = 'visible';
                    }
                    deferredPrompt = null;
                });
        });
    }
});

window.addEventListener('appinstalled', (e) => {
    console.log('Brinque Coin instalado');
    btnAdd = document.getElementById('optInstall');
    btnAdd.style.visibility = 'hidden';
});
