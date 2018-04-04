<h1>Charts</h1>
<p>
</p>

<?php extract($data); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php $data["IncomeOutcomeChart"]?>);
        var options = {
            title: 'Finance Performance',
            curveType: 'function',
            legend: {position: 'bottom'}
        };
        var chart = new google.visualization.LineChart(document.getElementById('all_curve_chart'));
        chart.draw(data, options);


        data = google.visualization.arrayToDataTable(<?php $data["IncomeChart"]?>);
        options = {
            title: 'Income Finance Performance',
            curveType: 'function',
            legend: {position: 'bottom'}
        };
        chart = new google.visualization.LineChart(document.getElementById('income_curve_chart'));
        chart.draw(data, options);


        data = google.visualization.arrayToDataTable(<?php $data["OutcomeChart"]?>);
        options = {
            title: 'Outcome Finance Performance',
            curveType: 'function',
            legend: {position: 'bottom'}
        };
        chart = new google.visualization.LineChart(document.getElementById('outcome_curve_chart'));
        chart.draw(data, options);
    }
</script>
<div id="all_curve_chart" style="width: 900px; height: 500px"></div>
<div id="income_curve_chart" style="width: 900px; height: 500px"></div>
<div id="outcome_curve_chart" style="width: 900px; height: 500px"></div>
