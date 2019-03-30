var listaDias = document.querySelector('#lista-dias');

function criarCartaoDia() {
  var cartao = document.createElement('div');
  cartao.className = 'dia mdl-card mdl-shadow--4dp';
  var divGrid = document.createElement('div');
  divGrid.className = 'mdl-grid';
  var divDiaDaSemana = document.createElement('div'); 
  divDiaDaSemana.className = 'mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--2-col-phone';
  divDiaDaSemana.textContent = 'Segunda';
  divGrid.appendChild(divDiaDaSemana);
  var divData = document.createElement('div');
  divData.className = 'mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--2-col-phone';
  divData.textContent = '25/03/2019';
  divGrid.appendChild(divData);
  cartao.appendChild(divGrid);
  componentHandler.upgradeElement(cartao);
  listaDias.appendChild(cartao);
}

fetch('https://httpbin.org/get')
  .then(function(res) {
    return res.json();
  })
  .then(function(data) {
    criarCartaoDia();
  });