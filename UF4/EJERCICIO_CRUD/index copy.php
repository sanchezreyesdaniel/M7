<?php

function createTable($tableName, $columnNames, $columnTypes, $pdo) {
    if (!empty($columnNames) && !empty($columnTypes)) {
        $sql = "CREATE TABLE $tableName (id SERIAL PRIMARY KEY, ";
        foreach ($columnNames as $index => $columnName) {
            $columnType = $columnTypes[$index];
            $sql .= "$columnName $columnType, ";
        }
        $sql = rtrim($sql, ", ");
        $sql .= ")";

        try {
            
            $pdo->exec($sql);
            
            echo "<p style='font-family: Arial, sans-serif; margin-top: 20px; color: #4CAF50;'>Table $tableName created successfully.</p>";
        } catch (PDOException $e) {
            echo "<p style='font-family: Arial, sans-serif; margin-top: 20px; color: #f44336;'>Error creating table: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='font-family: Arial, sans-serif; margin-top: 20px; color: #f44336;'>Please provide column names and types.</p>";
    }
}

function readTable($tableName, $rowId, $pdo) {
    if (isset($rowId) && $rowId !== 'all') {
        $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE id = :id");
        $stmt->bindParam(':id', $rowId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            echo '<h3 style="font-family: Arial, sans-serif; margin-top: 20px; color: #333;">Row from table ' . $tableName . ':</h3>';
            echo '<table style="width: 100%; border-collapse: collapse; margin-top: 20px; border: 1px solid #ddd;" border="1">';
            echo '<tr style="background-color: #f2f2f2;">';
            foreach ($row as $key => $value) {
                echo '<th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">' . $key . '</th>';
            }
            echo '</tr>';
            echo '<tr>';
            foreach ($row as $value) {
                echo '<td style="padding: 8px; border-bottom: 1px solid #ddd;">' . $value . '</td>';
            }
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<p style="font-family: Arial, sans-serif; margin-top: 20px; color: #f44336;">No row found in table ' . $tableName . ' with ID ' . $rowId . '</p>';
        }
    } else {
        
        $stmt = $pdo->query("SELECT * FROM $tableName");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($rows) {
            echo '<h3 style="font-family: Arial, sans-serif; margin-top: 20px; color: #333;">Rows from table ' . $tableName . ':</h3>';
            echo '<table style="width: 100%; border-collapse: collapse; margin-top: 20px; border: 1px solid #ddd;" border="1">';
            echo '<tr style="background-color: #f2f2f2;">';
            foreach ($rows[0] as $key => $value) {
                echo '<th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">' . $key . '</th>';
            }
            echo '</tr>';
            foreach ($rows as $row) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td style="padding: 8px; border-bottom: 1px solid #ddd;">' . $value . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p style="font-family: Arial, sans-serif; margin-top: 20px; color: #f44336;">No rows found in table ' . $tableName . '</p>';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["createTable"])) {
        $tableName = $_POST["customTableName"];
        $columnNames = $_POST["customColumnName"];
        $columnTypes = $_POST["customColumnType"];

        try {
            $pdo = new PDO("pgsql:host=localhost;dbname=usuaris", "postgres", "root");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            createTable($tableName, $columnNames, $columnTypes, $pdo);
        } catch (PDOException $e) {
            echo "<p style='font-family: Arial, sans-serif; margin-top: 20px; color: #f44336;'>Database connection error: " . $e->getMessage() . "</p>";
        }
    } elseif (isset($_POST["readTable"])) {
        $tableName = $_POST["customTableName"];
        $rowId = isset($_POST["customRowId"]) ? $_POST["customRowId"] : null;
    
        try {
            $pdo = new PDO("pgsql:host=localhost;dbname=usuaris", "postgres", "root");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            readTable($tableName, $rowId, $pdo);
        } catch (PDOException $e) {
            echo "<p style='font-family: Arial, sans-serif; margin-top: 20px; color: #f44336;'>Database connection error: " . $e->getMessage() . "</p>";
        }
    
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntelForm</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            font-size: 60px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">CRUD</h2>
        <form class="mt-5" method="post">
            <div class="form-row align-items-center justify-content-center">
                <div class="col-auto">
                    <input type="text" class="form-control" name="userInput" placeholder="Enter command">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userInput"])) {
            $commandParts = explode(" ", $_POST["userInput"]);
            $action = $commandParts[0];
            $customTableName = isset($commandParts[1]) ? $commandParts[1] : null;

            if ($action === 'create' && $customTableName !== null) {
                echo '
                    <h3 class="mt-5">Create ' . $customTableName . ':</h3>
                    <form class="mt-3" method="post">
                        <input type="hidden" name="createTable" value="1">
                        <input type="hidden" name="customTableName" value="' . $customTableName . '">
                        <div class="form-group">
                            <label for="customColumnName">Column Name:</label>
                            <input type="text" class="form-control" id="customColumnName" name="customColumnName[]" placeholder="Column Name">
                        </div>
                        <div class="form-group">
                            <label for="customColumnType">Data Type:</label>
                            <select class="form-control" id="customColumnType" name="customColumnType[]">
                                <option value="VARCHAR">VARCHAR</option>
                                <option value="INT">INT</option>
                                <option value="TEXT">TEXT</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" id="addColumnBtn">Add Column</button>
                        <button type="submit" class="btn btn-primary">Create Table</button>
                    </form>
                ';
            } elseif ($action === 'read' && $customTableName !== null) {
                $idOrAll = isset($commandParts[2]) ? $commandParts[2] : null;
                if ($idOrAll === 'all') {
                    echo '
                        <form class="mt-5" method="post">
                            <input type="hidden" name="readTable" value="1">
                            <input type="hidden" name="customTableName" value="' . $customTableName . '">
                            <button type="submit" class="btn btn-primary">Read all rows from table ' . $customTableName . '</button>
                        </form>
                    ';
                } elseif (is_numeric($idOrAll)) {
                    $customRowId = $idOrAll;
                    echo '
                        <form class="mt-5" method="post">
                            <input type="hidden" name="readTable" value="1">
                            <input type="hidden" name="customTableName" value="' . $customTableName . '">
                            <input type="hidden" name="customRowId" value="' . $customRowId . '">
                            <button type="submit" class="btn btn-primary">Read row with ID ' . $customRowId . ' from table ' . $customTableName . '</button>
                        </form>
                    ';
                }
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('addColumnBtn').addEventListener('click', function() {
            var columnInputsDiv = document.getElementById('columnInputs');

            var newColumnNameInput = document.createElement('input');
            newColumnNameInput.type = 'text';
            newColumnNameInput.classList.add('form-control');
            newColumnNameInput.name = 'customColumnName[]';
            newColumnNameInput.placeholder = 'Column Name';
            columnInputsDiv.appendChild(newColumnNameInput);
            
            var newColumnTypeInput = document.createElement('select');
            newColumnTypeInput.classList.add('form-control');
            newColumnTypeInput.name = 'customColumnType[]';
            newColumnTypeInput.innerHTML = `
                <option value="VARCHAR">VARCHAR</option>
                <option value="INT">INT</option>
                <option value="TEXT">TEXT</option>
                <!-- Add more options as needed -->
            `;
            columnInputsDiv.appendChild(newColumnTypeInput);
            
            columnInputsDiv.appendChild(document.createElement('br'));
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault();
                var userInput = document.querySelector('input[name="userInput"]').value.trim();
                var commandParts = userInput.split(" ");
                var action = commandParts[0];
                var customTableName = commandParts[1];
                var id = commandParts[2];

                if (action === 'read' && id === 'all') {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', window.location.href, true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 400) {
                            var responseDiv = document.createElement('div');
                            responseDiv.innerHTML = xhr.responseText;
                            document.body.appendChild(responseDiv);
                        } else {
                            console.error('Error al procesar la solicitud.');
                        }
                    };
                    xhr.onerror = function() {
                        console.error('Error al realizar la solicitud.');
                    };
                    xhr.send('readTable=1&customTableName=' + customTableName);
                }
            });
        });
    </script>
</body>
</html>

