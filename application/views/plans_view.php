<h1>Plans</h1>

<p>
<div class="newbox">
    <select name = "Export">
        <option>
            <button><a href="#" onClick="$('#plans').tableExport({type:'excel',escape:'false'});"> <img
                            src='icons/xls.png' width='24px'> XLS</a></button>
        </option>
        <option>
            <button><a href="#" onClick="$('#plans').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img
                            src='icons/pdf.png' width='24px'> PDF</a></button>
        </option>
    </select>
    <table id="plans">
        <caption>All plans of <? session_start();
            echo $_SESSION['user']->name; ?></caption>
        <thead>
        <tr>
            <th>Date</th>
            <th>Value</th>
            <th>Description</th>
            <th>Type</th>
            <th>Goal</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($data as $row) {
            echo '<tr><td>' . $row['Date'] . '</td><td>' . $row['Value'] . '</td><td>' . $row['Description'] . '</td><td>' . $row['Type']['Value'] . '</td><td>' . $row['Goal']['Value'] . '</td><td>Delete/Edit</td></tr>';
        }
        echo '<form id="add", action="/plans/add", method="post">
            <tr align = "left"><td><input type="date", name="Date" required></td>
            <td><input type="number", name="Value" required></td>
            <td><input type="text", name="Description" required></td>
            <td><input type="text", name="Type" required></td>
            <td><input type="text", name="Goal" required></td>
            <td><button form="add">Add</button></td></tr>
          </form>';
        ?>
        </tbody>
    </table>
</div>
</p>
<script type="text/javascript" src="/js/tableExport.js"></script>
<script type="text/javascript" src="/js/jquery.base64.js"></script>
<script type="text/javascript" src="/js/html2canvas.js"></script>
<script type="text/javascript" src="/js/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="/js/jspdf/jspdf.js"></script>
<script type="text/javascript" src="/js/jspdf/libs/base64.js"></script>
<script type="text/javaScript">
    $(document).ready(function () {
    });
</script>