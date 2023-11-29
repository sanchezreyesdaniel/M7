<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
<head>
    <title>Movie database</title>
    <style type="text/css">
        th { background-color: #999;}
        .odd_row { background-color: #EEE; }
        .even_row { background-color: #FFF; }
    </style>
</head>
<body>
    <table style="width:100%;">
        <tr>
            <th colspan="2">Employees <a href="employees.php?action=add">[ADD]</a></th>
        </tr>
        <?php
        $query = 'SELECT * FROM employees';
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $odd = true;
        while ($row = mysqli_fetch_assoc($result)) {
            echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
            $odd = !$odd; 
            echo '<td style="width:75%;">'; 
            echo $row['first_name'] . ' ' . $row['last_name'];
            echo '</td><td>';
            echo ' <a href="employees.php?action=edit&id=' . $row['emp_no'] . '"> [EDIT]</a>'; 
            echo ' <a href="delete.php?type=user&id=' . $row['emp_no'] . '"> [DELETE]</a>';
            echo '</td></tr>';
        }
        ?>
        <tr>
            <th colspan="2">Departments <a href="prueba.php?action=add">[ADD]</a></th>
        </tr>
        <?php
        $query = 'SELECT * FROM departments';
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $odd = true;
        while ($row = mysqli_fetch_assoc($result)) {
            echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
            $odd = !$odd; 
            echo '<td style="width: 25%;">'; 
            echo $row['dept_name'];
            echo '</td><td>';
            echo ' <a href="edit.php?action=edit&id=' . $row['dept_no'] . '"> [EDIT]</a>'; 
            echo ' <a href="delete.php?type=department&id=' . $row['dept_no'] . '"> [DELETE]</a>';
            echo '</td></tr>';
        }
        ?>
    </table>
</body>
</html>
