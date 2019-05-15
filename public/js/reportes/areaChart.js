function areaChart (container, titleText, data) {
  data = getPreparedDataLine(data);
  Highcharts.chart(container, {
      chart: {
          type: 'area'
      },
      title: {
          text: titleText
      },
      xAxis: {
          tickmarkPlacement: 'on',
          title: {
              enabled: false
          }
      },
      yAxis: {
          title: {
              text: ''
          },
          labels: {
              formatter: function () {
                  return this.value;
              }
          }
      },
      tooltip: {
          split: true,
          valueSuffix: ' '
      },
      plotOptions: {
          area: {
              stacking: 'normal',
              lineColor: '#666666',
              lineWidth: 1,
              marker: {
                  lineWidth: 1,
                  lineColor: '#666666'
              }
          }
      },
      series: data
  });
}