<?php
require_once('conn.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the updated task details from the form
    $taskId = $_POST['task_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $dueDate = $_POST['due_date'];
    $responsible = $_POST['responsible'];
    $type = $_POST['type'];

    // Connect to the database
    $dbConnection = new conexionDB();

    if (!$dbConnection->_db->connect_error) {
        // Prepare and execute an SQL update statement to update the task
        $sql = "UPDATE checklist_tasks SET title=?, description=?, status=?, due_date=?, responsible=?, type=? WHERE task_id=?";
        $stmt = $dbConnection->_db->prepare($sql);
        $stmt->bind_param("ssssssi", $title, $description, $status, $dueDate, $responsible, $type, $taskId);

        if ($stmt->execute()) {
            // Task updated successfully
            // Redirect back to the index page or send a success message
            header("Location: index.php");
            exit;
        } else {
            // Handle the error, e.g., display an error message
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $dbConnection->_db->close();
    } else {
        // Handle database connection error
        echo "Database connection failed.";
    }
}
?>
