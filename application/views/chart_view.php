<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function chart(chartData, div_class, title) {
        if (chartData.length > 0) {
            var data = google.visualization.arrayToDataTable(chartData);
            var options = {
                title: title,
                curveType: 'function',
                legend: {position: 'bottom'}
            };
            var chart = new google.visualization.LineChart(document.getElementById(div_class));
            chart.draw(data, options);
        }
    }

    function drawCharts() {
        <?php if($data != null){?>
        chart(<?php echo json_encode($data['IncomeOutcomeChart']) ?>, 'income_outcome', 'Total finances');
        chart(<?php echo json_encode($data['MergedCharts']) ?>, 'income', 'Income/Outcome');
        <?}
        else {
            echo "<p>There is nothing to show</p>";
        }?>
    }
</script>
<div id="income_outcome"></div>
<div id="income"></div>