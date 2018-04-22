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
        <?php if(count($data['IncomeOutcomeChart'])>0){?>
        chart(<?php echo json_encode($data['IncomeOutcomeChart']) ?>, 'income_outcome', 'Total finances');
        chart(<?php echo json_encode($data['IncomeChart']) ?>, 'income', 'Income finances');
        chart(<?php echo json_encode($data['OutcomeChart']) ?>, 'outcome', 'Outcome finances');
        <?}
        else {
            echo "<p>There is nothing to show</p>";
        }?>
    }
</script>
<h1>Charts</h1>
<div id="stats">
    <h3>Statistics</h3>
    <ul>
        <li>Saldo: <?php echo $data["Statistic"]["saldo"]?></li>
        <li>Avg income: <?php echo $data["Statistic"]["avg_income"]?></li>
        <li>Avg outcome: <?php echo $data["Statistic"]["avg_outcome"]?></li>
    </ul>
</div>
<div id="income_outcome"></div>
<div id="income"></div>
<div id="outcome"></div>