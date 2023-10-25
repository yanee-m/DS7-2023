<?php

require_once('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dbConnection = new conexionDB();

  if (!$dbConnection->_db->connect_error) {
    $title = mysqli_real_escape_string($dbConnection->_db, $_POST['title']);
    $description = mysqli_real_escape_string($dbConnection->_db, $_POST['description']);
    $status = mysqli_real_escape_string($dbConnection->_db, $_POST['status']);
    $due_date = $_POST['due_date'];
    $responsible = mysqli_real_escape_string($dbConnection->_db, $_POST['responsible']);
    $type = mysqli_real_escape_string($dbConnection->_db, $_POST['type']);

    $sql = "INSERT INTO checklist_tasks (title, description, status, due_date, responsible, type) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $dbConnection->_db->prepare($sql);
    $stmt->bind_param("ssssss", $title, $description, $status, $due_date, $responsible, $type);

    if ($stmt->execute()) {
      // Task added successfully, you can redirect back to the index page
      header("Location: ../index.php");
      exit;
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Database connection failed.";
  }

  $dbConnection->_db->close();
}
?>