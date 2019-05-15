function columnChart (container, titleText, data) {
  data = getPreparedDataColumn(data);
  Highcharts.chart(container, {
    chart: {
      type: 'bar'
    },
    title: {
      text: titleText
    },
    xAxis: {
      categories: ['Porcentaje:']
    },
    yAxis: {
      min: 0,
      title: {
        text: ''
      }
    },
    legend: {
      reversed: true
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    credits: {
        enabled: false
    },
    series: data
  });
}