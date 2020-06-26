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

        postActivity({
            board: code,
            activity: id,
            day: day,
            value: value
        });
    })
});

function postActivity(opts) {
    //console.log('Sending post: ' + JSON.stringify(opts));
    //console.log(getCookie('XSRF-TOKEN'));

    fetch('https://app.brinquecoin.com/api/atividades/marcar', {
        headers: {
            'Content-Type': 'application/json',
            'Cookie': getCookie('XSRF-TOKEN')
        },
        method: 'post',
        body: JSON.stringify(opts)
    }).then(function (response) {
        return response.json();
    }).then(function (data) {
        console.log(data);
    }).catch(function (error) {
        console.log(error);
    });
}

/**
 * Its very importante pick the cookie to 
 * authenticate on API request
 * @param {*} name 
 */
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}
