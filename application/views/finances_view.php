<h1>Finances</h1>

<p>
<div class="newbox">
    <div class="btn-group">
        <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
        <ul class="dropdown-menu " role="menu">
            <li><a href="#" onClick ="$('#finances').tableExport({type:'json',escape:'false'});"> <img src='icons/json.png' width='24px'> JSON</a></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src='icons/json.png' width='24px'> JSON (ignoreColumn)</a></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'json',escape:'true'});"> <img src='icons/json.png' width='24px'> JSON (with Escape)</a></li>
            <li class="divider"></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'xml',escape:'false'});"> <img src='icons/xml.png' width='24px'> XML</a></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'sql'});"> <img src='icons/sql.png' width='24px'> SQL</a></li>
            <li class="divider"></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'csv',escape:'false'});"> <img src='icons/csv.png' width='24px'> CSV</a></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'txt',escape:'false'});"> <img src='icons/txt.png' width='24px'> TXT</a></li>
            <li class="divider"></li>

            <li><a href="#" onClick ="$('#finances').tableExport({type:'excel',escape:'false'});"> <img src='icons/xls.png' width='24px'> XLS</a></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'doc',escape:'false'});"> <img src='icons/word.png' width='24px'> Word</a></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'powerpoint',escape:'false'});"> <img src='icons/ppt.png' width='24px'> PowerPoint</a></li>
            <li class="divider"></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'png',escape:'false'});"> <img src='icons/png.png' width='24px'> PNG</a></li>
            <li><a href="#" onClick ="$('#finances').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src='icons/pdf.png' width='24px'> PDF</a></li>


        </ul>
    </div>
    <table id="finances">
        <caption>All finances of <? session_start();
            echo $_SESSION['user']->name; ?></caption>
        <thead>
        <tr>
            <th>Date</th>
            <th>Value</th>
            <th>Description</th>
            <th>Type</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($data as $row) {
            echo '<tr><td>' . $row['Date'] . '</td><td>' . $row['Value'] . '</td><td>' . $row['Description'] . '</td><td>' . $row['Type']['Value'] . '</td><td>Delete/Edit</td></tr>';
        }
        echo '<form id="add", action="/finances/add", method="post">
            <tr align = "left"><td><input type="date", name="Date" required></td>
            <td><input type="number", name="Value" required></td>
            <td><input type="text", name="Description" required></td>
            <td><input type="text", name="Type" required></td>
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
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javaScript">
    $(document).ready(function(){
    });
</script>