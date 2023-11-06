const first = document.getElementById('mensal');
const second = document.getElementById('anual');
const meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];


const nome = centrocusto.map(item => item.Nome);
const valor = centrocusto.map(item => item.valplanejado);
const valorgasto = centrocusto.map(item => item.valatual);

new Chart(first, {
  type: 'doughnut',
  data: {
    labels: nome,
    datasets: [{
      label: 'Entradas e Saidas do Mes',
      data: valor,
      backgroundColor:[
        'rgba(255, 99, 132, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 205, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 205, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(153, 102, 255, 1)'
      ]
    }]
  },
  options: {
    responsive: true,
  }
});

const mixedChart = new Chart(second, {

  data: {
    datasets: [{
      type: 'line',
      label: 'Valor Programado',
      data: valor,
      showLine: false,
      borderColor: 'rgb(0, 0, 0)',
      backgroundColor: 'rgb(0, 0, 0)',
      borderWidth: 10,
    }, {
      type: 'bar',
      label: 'Valor Gasto',
      data: valorgasto,
      backgroundColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 205, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 205, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(153, 102, 255, 1)'
      ]
    }],
    labels: nome
},
options: {
  responsive: true,
  indexAxis: 'y',
}

});

  /*const mixedChart = new Chart(second, {
    data: {
        datasets: [{
          type: 'line',
          label: 'Media mensal do saldo',
          data: [2186, 2186, 2186, 2186, 2186, 2186, 2186, 2186, 2186, 2186, 2186, 2186],
          borderColor: 'rgb(0, 0, 0)',
        }, {
          type: 'bar',
          label: 'Valor mensal do saldo',
          data: [1000, 1500, 2000, 1300, 1400, 4000, 3200, 1760, 1578, 1000, 1200, 1500],
          backgroundColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
          ]
        }],
        labels: meses
    },
    options: {
      responsive: true,
    }
});*/