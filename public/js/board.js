$(document).ready(function () {
    $('img.emoji').click(function (event) {
        event.preventDefault();

        //Change emojis
        img = this.src.split('/')[5];
        emojis = ['0.png', '1.png', '2.png'];
        n = emojis.indexOf(img);
        if ((n + 1) <= (emojis.length - 1)) {
            emoji = emojis[n + 1];
            n++;
        } else {
            emoji = emojis[0];
            n = 0;
        }
        value = n.toString();
        this.src = '/img/boards/' + emoji;

        //Send post
        id = this.dataset.id;
        day = this.dataset.day;
        code = document.getElementById('code').value;

        axios.post('/api/atividades/marcar', {
                board: code,
                activity: id,
                day: day,
                value: value
            })
            .then(function (response) {
                return response.json();
            }).then(function (data) {
                console.log(data);
            }).catch(function (error) {
                console.log(error);
            });
    })
});
