var listaAtividades = document.querySelector('#lista-atividades');

function criarCartaoAtividade() {
  var cartao = document.createElement('div');
  cartao.className = 'dia mdl-card mdl-shadow--4dp';
  var divGrid = document.createElement('div');
  divGrid.className = 'mdl-grid';
  var divIcone = document.createElement('div'); 
  divIcone.className = 'mdl-cell mdl-cell--2-col mdl-cell--2-col-tablet mdl-cell--1-col-phone';
  var icone = document.createElement('i');
  icone.className = 'material-icons';
  icone.textContent = 'home';
  divIcone.appendChild(icone);
  divGrid.appendChild(divIcone);
  var divAtividade = document.createElement('div'); 
  divAtividade.className = 'mdl-cell mdl-cell--8-col mdl-cell--4-col-tablet mdl-cell--2-col-phone';
  divAtividade.textContent = 'Fazer uma tarefa doméstica';
  divGrid.appendChild(divAtividade);
  var divEmoticon = document.createElement('div'); 
  divEmoticon.className = 'mdl-cell mdl-cell--2-col mdl-cell--2-col-tablet mdl-cell--1-col-phone';
  var emoticon = document.createElement('img'); 
  emoticon.src = '/src/images/emoticon/emoticon-neutral-outline.svg';
  emoticon.alt = 'emoticon neutro';
  divEmoticon.appendChild(emoticon);
  divGrid.appendChild(divEmoticon);
  cartao.appendChild(divGrid);
  componentHandler.upgradeElement(cartao);
  listaAtividades.appendChild(cartao);
}

fetch('https://httpbin.org/get')
  .then(function(res) {
    return res.json();
  })
  .then(function(data) {
    criarCartaoAtividade();
  });