<?php
require_once('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbConnection = new conexionDB();

    if (!$dbConnection->_db->connect_error) {
        $taskId = mysqli_real_escape_string($dbConnection->_db, $_POST['taskId']);

        $sql = "DELETE FROM checklist_tasks WHERE id = ?";
        $stmt = $dbConnection->_db->prepare($sql);
        $stmt->bind_param("i", $taskId);

        if ($stmt->execute()) {
            // Task deleted successfully
            header("Location: ../index.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Database connection failed.";
    }

    $dbConnection->_db->close();
}
