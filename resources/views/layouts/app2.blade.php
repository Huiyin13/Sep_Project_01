<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example Testing</title>
  </head>
  <body>
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>

    <!-- E-Charting library
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script> -->
    <!-- E-Chartisan
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>  -->

    <!-- chartjs Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- chartjs Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    
    <!-- Your application script -->

    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('status_chart')",
        hooks: new ChartisanHooks()
        .beginAtZero()
        .colors()
        .datasets([{type:'line',  borderColor:'orange'},'bar'])
      });
    </script>
    @stack('js') 
  </body>
</html>