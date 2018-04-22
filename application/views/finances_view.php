<h1>Finances</h1>
<p>
<table>
    All finances of <? session_start(); echo $_SESSION['user']->name;?>
    <tr><td>Date</td><td>Value</td><td>Description</td><td>Type</td></tr>
<?php

	foreach($data as $row)
    {
        echo '<tr><td>'.$row['Date'].'</td><td>'.$row['Value'].'</td><td>'.$row['Description'].'</td><td>'.$row['Type']['Value'].'</td></tr>';
    }
    echo '<form id="add", action="finances/add", method="post">
            <tr><td><input type="date", name="Date"></td>
            <td><input type="number", name="Value"></td>
            <td><input type="text", name="Description"></td>
            <td><input type="text", name="Type"></td></tr>
          </form>';
?>
<form>
    <button form="add">Add</button>
</form>
</p>