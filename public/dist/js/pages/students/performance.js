$(function () {

  async function getDataPerformance(apiPerformance){
    let response = await fetch(apiPerformance)
    let data = await response.json()  
    let labels = data.labels;
    let scores = data.scores;
    let finalTerm = Object.values(scores.final_term);
    let midTerm = Object.values(scores.mid_term);
    let others = Object.values(scores.others);
    // console.log(Object.values(scores.final_term))
    performanceChart(labels,finalTerm,midTerm,others)

    // academicChart(labels, scores)
  }
  getDataPerformance(apiPerformance)

  function performanceChart(labels, finalTerm, midTerm, others){
    chart = new Chart(document.querySelector("#radar-chart"), {
      type: 'radar',
      data: {
        labels: labels,
        datasets: [
        {
          label: "Other",
          fill: true,
          backgroundColor: "rgba(255, 79, 112,0.2)",
          borderColor: "rgba(255, 79, 112,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(1, 202, 241,1)",
          data: others
        }, 
        {
          label: "Mid",
          fill: true,
          backgroundColor: "rgba(1, 202, 241,0.2)",
          borderColor: "rgba(1, 202, 241,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(1, 202, 241,1)",
          data: midTerm
        }, 
        {
          label: "Final",
          fill: true,
          backgroundColor: "rgba(95, 118, 232,0.2)",
          borderColor: "rgba(95, 118, 232,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(95, 118, 232,1)",
          pointBorderColor: "#fff",
          data: finalTerm
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
  }


  // =============
  // Bar Chart
  // =============
  async function getDataSubjectScore(apiSubjectScore){
    let response = await fetch(apiSubjectScore)
    let data = await response.json()  
    let labels = data.labels;
    let scores = Object.values(data.scores);
    // console.log(scores)
    // console.log(Object.values(scores.final_term))
    subjectChart(labels,scores)

    // academicChart(labels, scores)
  }
  getDataSubjectScore(apiSubjectScore)

  function subjectChart(labels,scores){
    var data = {
      labels: labels,
      series: [
          scores
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
  }



  $(window).on('resize', function () {
      chart.update();
  });
})