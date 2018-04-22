<h1>Finances</h1>
<p>
<table>
    All finances of <? session_start(); echo $_SESSION['user']->name;?>
    <tr><td>Date</td><td>Value</td><td>Description</td><td>Type</td><td></td></tr>
<?php

	foreach($data as $row)
    {
        echo '<tr><td>'.$row['Date'].'</td><td>'.$row['Value'].'</td><td>'.$row['Description'].'</td><td>'.$row['Type']['Value'].'</td><td>Delete/Edit</td></tr>';
    }
    echo '<form id="add", action="/finances/add", method="post">
            <tr align = "left"><td><input type="date", name="Date"></td>
            <td><input type="number", name="Value"></td>
            <td><input type="text", name="Description"></td>
            <td><input type="text", name="Type"></td>
            <td><button form="add">Add</button></td></tr>
          </form>';
?>
</table>
</p>