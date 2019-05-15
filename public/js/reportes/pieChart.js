function pieChart (container, titleText, data) {
  data = getPreparedData(data);
// Build the chart
Highcharts.chart(container, {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: titleText
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: false
      },
      showInLegend: true
    }
  },
  credits: {
      enabled: false
  },
  series: [{
    name: 'Porcentaje',
    colorByPoint: true,
    data: data
  }]
});
}