$(function () {

  var chart = new Chart(document.querySelector("#radar-chart"), {
    type: 'radar',
    data: {
      labels: ['Math', 'Science', 'Social', 'Magic & Spells'],
      datasets: [
      {
        label: "Other",
        fill: true,
        backgroundColor: "rgba(255, 79, 112,0.2)",
        borderColor: "rgba(255, 79, 112,1)",
        pointBorderColor: "#fff",
        pointBackgroundColor: "rgba(1, 202, 241,1)",
        data: [76,78,82,78]
      }, 
      {
        label: "Mid",
        fill: true,
        backgroundColor: "rgba(1, 202, 241,0.2)",
        borderColor: "rgba(1, 202, 241,1)",
        pointBorderColor: "#fff",
        pointBackgroundColor: "rgba(1, 202, 241,1)",
        data: [80,85,76,85]
      }, 
      {
        label: "Final",
        fill: true,
        backgroundColor: "rgba(95, 118, 232,0.2)",
        borderColor: "rgba(95, 118, 232,1)",
        pointBorderColor: "#fff",
        pointBackgroundColor: "rgba(95, 118, 232,1)",
        pointBorderColor: "#fff",
        data: [82,90,75,80]
      }
      ]
    },
    options: {
      title: {
      display: true,
      text: 'Subject Dominance'
      }
    }
  });

  // =============
  // Bar Chart
  // =============
  var data = {
    labels: ['Math', 'Science', 'Social', 'Magic & Spells'],
    series: [
        [88.8,85,87,90]
    ]
  };

  var options = {
      axisX: {
          showGrid: false
      },
      seriesBarDistance: 1,
      chartPadding: {
          top: 15,
          right: 15,
          bottom: 5,
          left: 0
      },
      plugins: [
          Chartist.plugins.tooltip()
      ],
      width: '100%'
  };

  var responsiveOptions = [
      ['screen and (max-width: 640px)', {
          seriesBarDistance: 5,
          axisX: {
              labelInterpolationFnc: function (value) {
                  return value[0];
              }
          }
      }]
  ];
  new Chartist.Bar('.net-income', data, options, responsiveOptions);


  $(window).on('resize', function () {
      chart.update();
  });
})