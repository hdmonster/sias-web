$(function () {

    var chart = new Chart(document.querySelector("#radar-chart"), {
		type: 'radar',
		data: {
		  labels: ['Math', 'Social Studies', 'Magic & Spells', 'Rocket Science'],
		  datasets: [
			{
			  label: "Mid",
			  fill: true,
			  backgroundColor: "rgba(1, 202, 241,0.2)",
			  borderColor: "rgba(1, 202, 241,1)",
			  pointBorderColor: "#fff",
			  pointBackgroundColor: "rgba(1, 202, 241,1)",
			  data: [90,61,76,85]
			}, 
			{
			  label: "Quiz",
			  fill: true,
			  backgroundColor: "rgba(255, 79, 112,0.2)",
			  borderColor: "rgba(255, 79, 112,1)",
			  pointBorderColor: "#fff",
			  pointBackgroundColor: "rgba(1, 202, 241,1)",
			  data: [96,72,82,88]
			}, 
			{
			  label: "Final",
			  fill: true,
			  backgroundColor: "rgba(95, 118, 232,0.2)",
			  borderColor: "rgba(95, 118, 232,1)",
			  pointBorderColor: "#fff",
			  pointBackgroundColor: "rgba(95, 118, 232,1)",
			  pointBorderColor: "#fff",
			  data: [96,54,71,80]
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

    $(window).on('resize', function () {
        chart.update();
    });
})