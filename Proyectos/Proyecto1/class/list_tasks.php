<?php
require_once('class/config.php'); // Include your configuration file

// Include the database connection class
require_once('class/conn.php');

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
            echo '<p>Description: ' . htmlspecialchars($row['description']) . '</p>';
            echo '<p>Status: ' . htmlspecialchars($row['status']) . '</p>';
            echo '<p>Due Date: ' . htmlspecialchars($row['due_date']) . '</p>';
            echo '<p>Responsible: ' . htmlspecialchars($row['responsible']) . '</p>';
            echo '<p>Type: ' . htmlspecialchars($row['type']) . '</p>';
            echo '<button>Edit</button>';
            echo '<button>Delete</button>';
            echo '</li>';
        }
        
        echo '</ul>';
    } else {
        echo 'No tasks found.';
    }
    mysqli_close($dbConnection->_db);
} else {
    echo 'Database connection failed.';
}
?>