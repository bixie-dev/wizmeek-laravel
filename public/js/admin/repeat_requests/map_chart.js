$(document).ready(function(){
    google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      /* Get data for the cart */
      var countByStateParse = JSON.parse($('#regions_div').attr('chart-data'))
      var chartDataArray = new Array(['State', 'Requests'])
      $.each(countByStateParse, function(index, value){
        chartDataArray.push([`${value.region_name}`, + value.total])
      })

      /* Draw Chart - US only, provices */
      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable(chartDataArray);

        var options = {
          region: 'US',
          displayMode: 'regions',
          resolution: 'provinces',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
})