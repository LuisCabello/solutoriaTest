<script>
  // Inicio de html
  $(document).ready(function() {
    getDataChart();
  });

  function getDataChart() {

    $.ajax({
      url: "indicadores/getIndicadores",
      type: "GET",
      dataType: "json",
      success: function(data) {
        if (data.length > 0) {
          getChart(data);
        } else {
          window.alert("No se encontro data en la base de datos");
        }
      }
    })
  }

  function getFilterDataChart(startDate, endDate) {

    if (startDate && endDate) {
      $.ajax({
        url: "indicadores/getFilterIndicadores",
        type: "POST",
        dataType: "json",
        data: {
          startDate: startDate,
          endDate: endDate
        },
        success: function(data) {
          if (data.length > 0) {
            getChart(data);
          } else {
            window.alert("No se encontro data para la fecha seleccionada");
          }
        }
      })
    } else {
      window.alert("Se necesitan las fechas desde y hasta para filtrar");
    }

  }

  // Grafico
  function getChart(chartData) {
    var ctx = document.getElementById("myChart").getContext("2d");

    // Refresh chart
    let chartStatus = Chart.getChart("myChart");
    if (chartStatus != undefined) {
      chartStatus.destroy();
    }

    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        datasets: [{
          label: 'Ventas',
          backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(0, 0, 0, 0.2)'
          ],
          borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(0, 0, 0, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            min: 0,
          },
          y: {
            beginAtZero: true,
            min: 0
          }
        },
      }
    });

    if (chartData.length > 0) {
      chartData.forEach(element => {
        myChart.data['labels'].push(element.fechaIndicador)
        myChart.data['datasets'][0].data.push(element.valorIndicador)
      });
    } else {
      window.alert("No se encontro data para la fecha seleccionada");
    }

    // Refresh the chart because is not showing the data
    setTimeout(function() {
      myChart.update();
    }, 1000);
  }

  // Boton filtro para las fechas
  $(document).on('click', '#filterButton', function(event) {

    let startDate = $('#startDate').val();
    let endDate = $('#endDate').val();

    getFilterDataChart(startDate, endDate);

  });

  //Cambiar la vista al Crud
  document.getElementById("crudButton").addEventListener("click", function() {
    window.location.href = "/crud";
  });
</script>