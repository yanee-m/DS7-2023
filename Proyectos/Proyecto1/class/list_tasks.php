<?php

// Include the database connection class
require_once('conn.php');

// Create a new instance of the database connection class
$dbConnection = new conexionDB();

// Check for a successful database connection
if (!$dbConnection->_db->connect_error) {
    // Query to retrieve tasks
    $sql = "SELECT * FROM checklist_tasks";

    $result = mysqli_query($dbConnection->_db, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<ul id="task-list">';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>';
            echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
            echo '<p>Descripción: ' . htmlspecialchars($row['description']) . '</p>';
            echo '<p>Estado: ' . htmlspecialchars($row['status']) . '</p>';
            echo '<p>Vencimiento: ' . htmlspecialchars($row['due_date']) . '</p>';
            echo '<p>Responsable: ' . htmlspecialchars($row['responsible']) . '</p>';
            echo '<p>Tipo: ' . htmlspecialchars($row['type']) . '</p>';
            echo '<form method="post" action="class/add_or_update_task.php">';
            echo '<input type="hidden" name="taskId" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Editar">';
            echo '</form>';
            echo '<form method="post" action="class/delete_task.php">';
            echo '<input type="hidden" name="taskId" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Eliminar">';
            echo '</form>';
            echo '</li>';
        }
        
        echo '</ul>';
    } else {
        echo 'No se encontraron Tareas.';
    }
    mysqli_close($dbConnection->_db);
} else {
    echo 'Database connection failed.';
}
?>