<h1>Finances</h1>
<p>
<div class="newbox">
    <table>
        All finances of <? session_start();
        echo $_SESSION['user']->name; ?>
        <tr>
            <td>Date</td>
            <td>Value</td>
            <td>Description</td>
            <td>Type</td>
            <td></td>
        </tr>
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
    </table>
</div>
</p>