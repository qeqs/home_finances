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
        <?php if($data!=null){ ?>
        chart(<?php $data['IncomeOutcomeChart'] ?>, 'income_outcome');
        chart(<?php $data['IncomeChart'] ?>, 'income');
        chart(<?php $data['OutcomeChart'] ?>, 'outcome');
        <?}
            else{
            echo "<p>There is nothing to show</p>";
            }?>
    }
</script>
<div id="income_outcome" style="width: 900px; height: 500px"></div>
<div id="income" style="width: 900px; height: 500px"></div>
<div id="outcome" style="width: 900px; height: 500px"></div>