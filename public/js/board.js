$(document).ready(function () {
    // Click on emoji
    $('img.emoji').click(function (event) {
        event.preventDefault()
        //Change emojis
        const img = this.src.split('/')[5]
        const emojis = ['0.png', '1.png', '2.png']
        const emoji = (img, emojis) => {
            return emojis.indexOf(img) + 1 < emojis.length ? emojis.indexOf(img) + 1 : 0
        }
        const n = emoji(img, emojis)
        this.src = '/img/boards/' + emojis[n];
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
