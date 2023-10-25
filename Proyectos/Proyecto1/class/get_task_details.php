<?php
// Include your database connection code
require_once('conn.php');

// Check if taskId is provided through a GET request
if (isset($_GET['taskId'])) {
    $taskId = $_GET['taskId'];

    // Query to retrieve task details by taskId
    $sql = "SELECT * FROM checklist_tasks WHERE id = ?";
    $stmt = $_db->prepare($sql);
    $stmt->bind_param("i", $taskId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $taskDetails = $result->fetch_assoc();

        // Return task details as JSON
        echo json_encode($taskDetails);
    } else {
        echo json_encode(array('error' => 'Error fetching task details.'));
    }
} else {
    echo json_encode(array('error' => 'Task ID not provided.'));
}
?>
