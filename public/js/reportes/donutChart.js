function donutChart (container, titleText, data) {
  data = getPreparedData(data);
  Highcharts.chart(container, {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: 0,
      plotShadow: false
    },
    title: {
      text: titleText,
      align: 'center',
      y: 40
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        dataLabels: {
          enabled: true
        },
        showInLegend: true,
        startAngle: -90,
        endAngle: 90,
        center: ['50%', '75%'],
        size: '110%'
      }
    },
    credits: {
        enabled: false
    },
    series: [{
      type: 'pie',
      name: 'Porcentaje',
      innerSize: '50%',
      data: data
    }]
  });
}