$(document).ready(function () {
    // Click on emoji
    $('img.emoji').click(function (event) {
        event.preventDefault();
        //Change emojis
        const img = this.src.split('/')[5];
        const emojis = ['0.png', '1.png', '2.png'];
        let n = emojis.indexOf(img);
        if ((n + 1) <= (emojis.length - 1)) {
            emoji = emojis[n + 1];
            n++;
        } else {
            emoji = emojis[0];
            n = 0;
        }
        this.src = '/img/boards/' + emoji;
        //Send post
        axios.post('https://app.brinquecoin.com/api/atividades/marcar', {
            board: document.getElementById('code').value,
            activity: this.dataset.id,
            day: this.dataset.day,
            value: n.toString(),
            withcredentials: true
        }).then(function (response) {
            console.log(JSON.stringify(response.data));
        }).catch(function (error) {
            console.log(error);
        });
    })
});
