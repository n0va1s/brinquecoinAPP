var frmCriarQuadro = document.querySelector('#criar-quadro');
var frmPesquisarQuadro = document.querySelector('#pesquisar-quadro');
var listaQuadros = document.querySelector('#lista-quadros');

document.querySelector('#botao-modal-cadastro').addEventListener('click', function(){
  frmPesquisarQuadro.style.display = "none";
  frmCriarQuadro.style.display = frmCriarQuadro.style.display === "block" ? "none" : "block";

  if (deferredPrompt) {
    deferredPrompt.prompt();

    deferredPrompt.userChoice.then(function(choiceResult) {
      console.log(choiceResult.outcome);

      if (choiceResult.outcome === 'dismissed') {
        console.log('User cancelled installation');
      } else {
        console.log('User added to home screen');
      }
    });

    deferredPrompt = null;
  }
});
document.querySelector('#botao-fechar-cadastro').addEventListener('click', function(){
  frmCriarQuadro.style.display = "none";
});
document.querySelector('#botao-modal-pesquisa').addEventListener('click', function(){
  frmCriarQuadro.style.display = "none";
  frmPesquisarQuadro.style.display = frmPesquisarQuadro.style.display === "block" ? "none" : "block";
});
document.querySelector('#botao-fechar-pesquisa').addEventListener('click', function(){
  frmPesquisarQuadro.style.display = "none";
});

function criarCartao() {
  var cartao = document.createElement('div');
  cartao.className = 'quadro mdl-card mdl-shadow--4dp';
  var divTitulo = document.createElement('div');
  divTitulo.className = 'mdl-card__title';
  var titulo = document.createElement('h1'); 
  titulo.className = 'mdl-card__title-text';
  titulo.textContent = 'João Pedro';
  titulo.style.color = 'black';
  divTitulo.appendChild(titulo);
  cartao.appendChild(divTitulo);
  var divGrid = document.createElement('div');
  divGrid.className = 'mdl-grid';
  var divIcone = document.createElement('div');
  divIcone.className = 'mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--1-col-phone';
  var icone = document.createElement('i');
  icone.className = 'material-icons';
  icone.textContent = 'attach_money';
  divIcone.appendChild(icone);
  divGrid.appendChild(divIcone);
  var divIdade = document.createElement('div')
  divIdade.className = 'mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--1-col-phone';
  divIdade.textContent = '10 anos';
  divGrid.appendChild(divIdade);
  var divData = document.createElement('div');
  divData.className = 'mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--2-col-phone';
  divData.textContent = '10/10/2019';
  divGrid.appendChild(divData);
  var divRecompensa = document.createElement('div')
  divRecompensa.className = 'mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone';
  divRecompensa.textContent = 'Andar de bicicleta no Eixão do Lazer no domingo';
  divGrid.appendChild(divRecompensa);
  cartao.appendChild(divGrid);
  var divAcao = document.createElement('div')
  divAcao.className = 'mdl-card__actions mdl-card--border';
  var acesse = document.createElement('span');
  acesse.className = 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect';
  acesse.textContent = 'Acesse';
  divAcao.appendChild(acesse);
  var separador = document.createElement('div');
  separador.className = 'mdl-layout-spacer';
  divAcao.appendChild(separador);
  var botao = document.createElement('button');
  botao.className = 'mdl-button mdl-button--icon mdl-button--colored';
  var icone = document.createElement('i');
  icone.className = 'material-icons';
  icone.textContent = 'open_in_browser';
  var link = document.createElement('a');
  link.href = '/quadro/index.html';
  icone.appendChild(link);
  botao.appendChild(icone);
  divAcao.appendChild(botao);
  cartao.appendChild(divAcao);
  componentHandler.upgradeElement(cartao);
  listaQuadros.appendChild(cartao);
}

fetch('https://httpbin.org/get')
  .then(function(res) {
    return res.json();
  })
  .then(function(data) {
    criarCartao();
  });