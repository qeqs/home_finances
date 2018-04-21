<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function chart(chartData, div_class) {
        var data = google.visualization.arrayToDataTable(chartData);
        var options = {
            title: 'Total Finances',
            curveType: 'function',
            legend: {position: 'bottom'}
        };
        var chart = new google.visualization.LineChart(document.getElementById(div_class));
        chart.draw(data, options);
    }

    function drawCharts() {
        <?php if($data != null){?>
        chart(<?php echo json_encode($data['IncomeOutcomeChart']) ?>, 'income_outcome');
        chart(<?php echo json_encode($data['IncomeChart']) ?>, 'income');
        chart(<?php echo json_encode($data['OutcomeChart']) ?>, 'outcome');
        <?}
        else {
            echo "<p>There is nothing to show</p>";
        }?>
    }
</script>
<br/>
    <div id="income_outcome" style="position: center; width: 900px; height: 500px"></div>
    <div id="income" style="position: center; width: 900px; height: 500px"></div>
    <div id="outcome" style="position: center; width: 900px; height: 500px"></div>