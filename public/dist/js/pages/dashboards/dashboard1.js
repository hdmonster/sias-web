$(function () {

      // =============
      // Bar Chart
      // =============
      async function getDataSubjectScore(apiSubjectScore){
        let response = await fetch(apiSubjectScore)
        let data = await response.json()  
        let labels = data.labels;
        let scores = data.scores;
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

    // ============================================================== 
    // Visit By Location
    // ==============================================================
    jQuery('#visitbylocate').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        borderColor: '#000',
        borderOpacity: 0,
        borderWidth: 0,
        zoomOnScroll: false,
        color: '#d5dce5',
        regionStyle: {
            initial: {
                fill: '#d5dce5',
                'stroke-width': 1,
                'stroke': 'rgba(255, 255, 255, 0.5)'
            }
        },
        enableZoom: true,
        hoverColor: '#bdc9d7',
        hoverOpacity: null,
        normalizeFunction: 'linear',
        scaleColors: ['#d5dce5', '#d5dce5'],
        selectedColor: '#bdc9d7',
        selectedRegions: [],
        showTooltip: true,
        onRegionClick: function (element, code, region) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
            alert(message);
        }
    });

    // ==============================================================
    // Earning Stastics Chart
    // ==============================================================
    var chart = new Chartist.Line('.stats', {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June'],
        series: [
            [1.4, 1.6, 1.5, 1.64, 1.66, 1.68, 1.7]
        ]
    }, {
        low: 0.0,
        high: 2.0,
        showArea: true,
        fullWidth: true,
        plugins: [
            Chartist.plugins.tooltip()
        ],
        axisY: {
            onlyInteger: true,
            scaleMinSpace: 40,
            offset: 20,
            labelInterpolationFnc: function (value) {
                return (value / 1);
            }
        },
    });

    // Offset x1 a tiny amount so that the straight stroke gets a bounding box
    chart.on('draw', function (ctx) {
        if (ctx.type === 'area') {
            ctx.element.attr({
                x1: ctx.x1 + 0.001
            });
        }
    });

    // Create the gradient definition on created event (always after chart re-render)
    chart.on('created', function (ctx) {
        var defs = ctx.svg.elem('defs');
        defs.elem('linearGradient', {
            id: 'gradient',
            x1: 0,
            y1: 1,
            x2: 0,
            y2: 0
        }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(255, 255, 255, 1)'
        }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(80, 153, 255, 1)'
        });
    });

    $(window).on('resize', function () {
        chart.update();
    });
})