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
        //token = sessionStorage.getItem("AUTH_TOKEN");

        postData = JSON.stringify({
            board: document.getElementById('code').value,
            activity: this.dataset.id,
            day: this.dataset.day,
            value: value
        })

        config = {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*',
                'Authorization': 'Bearer ' + $('meta[name="csrf-token"]').attr('content')
            },
            withCredentials: true
        }

        //Send post
        axios.post('/api/atividades/marcar', {
            postData,
            config
        }).then(function (response) {
            return response.json();
        }).then(function (data) {
            console.log(data);
        }).catch(function (error) {
            console.log(error);
        });
    })
});
