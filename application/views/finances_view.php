<h1>Finances</h1>
<p>
<table>
    All finances of <? session_start(); echo $_SESSION['user']->name;?>
    <tr><td>Date</td><td>Value</td><td>Description</td><td>Type<td>Name</td><td>Description</td></td></tr>
<?php

	foreach($data as $row)
    {
        echo '<tr><td>'.$row['Date'].'</td><td>'.$row['Value'].'</td><td>'.$row['Description'].'</td><td><td>'.$row['Type']['Value'].'</td><td>'.$row['Type']['Description'].'</td></td></tr>';
    }
?>
</table>
</p>