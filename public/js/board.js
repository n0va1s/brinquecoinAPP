function postActivity(opts) {
    console.log('Sending post...');
    fetch('/atividades/marcar/{codigo}', {
      method: 'post',
      body: JSON.stringify(opts)
    }).then(function(response) {
      return response.json();
    }).then(function(data) {
      console.log('SUCCESS - mark created', data.html_url);
    });
  }
  
  function markActivity(id, day) {
    console.log('Data received: id: '+id+' day '+day);
    if (id && day) {
        postActivity(
            {
                id: id,
                day: day
            }
        );
    } else {
      console.log('ERROR - id: '+id+' day: '+day);
    }
  }