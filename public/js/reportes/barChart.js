function barChart (container, titleText, data) {
  data = getPreparedData(data);
  // Create the chart
  Highcharts.chart(container, {
    chart: {
      type: 'column'
    },
    title: {
      text: titleText
    },
    xAxis: {
      type: 'category'
    },
    yAxis: {
      title: ''
    },
    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 0,
        dataLabels: {
          enabled: true,
          format: '{point.y:.1f}%'
        }
      }
    },
    credits: {
        enabled: false
    },
    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b> {point.y:.2f}% </b>'
    },
    series: [
      {
        name: "Porcentaje:",
        colorByPoint: true,
        data: data
      }
    ]
  });
}