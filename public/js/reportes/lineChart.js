function lineChart (container, titleText, data) {
  data = getPreparedDataLine(data); // obteniendo la data seteada para poder utilizarla dentro de la grafica
  Highcharts.chart(container, {

      title: {
          text: titleText
      },

      yAxis: {
          title: {
              text: ''
          }
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
      },

      plotOptions: {
          series: {
              label: {
                  connectorAllowed: false
              },
          }
      },
      credits: {
          enabled: false
      },
      series: data, // Agregando la data que se va a mostrar en la grafica
      responsive: {
          rules: [{
              condition: {
                  maxWidth: 500
              },
              chartOptions: {
                  legend: {
                      layout: 'horizontal',
                      align: 'center',
                      verticalAlign: 'bottom'
                  }
              }
          }]
      }

  });
}