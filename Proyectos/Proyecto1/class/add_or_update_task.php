<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection class
    require_once('conn.php');
    
    // Create a new instance of the database connection class
    $dbConnection = new conexionDB();
    
    // Check for a successful database connection
    if (!$dbConnection->_db->connect_error) {
        if (isset($_POST['edit_task'])) {
            // Handle the edit operation
            $taskId = $_POST['taskId'];
            
            // Retrieve the task details based on the task ID
            $sql = "SELECT * FROM checklist_tasks WHERE id = ?";
            $stmt = $dbConnection->_db->prepare($sql);
            $stmt->bind_param("i", $taskId);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $taskDetails = $result->fetch_assoc();
                
                // You can use $taskDetails to populate the edit form fields
                $title = $taskDetails['title'];
                $description = $taskDetails['description'];
                $status = $taskDetails['status'];
                $dueDate = $taskDetails['due_date'];
                $responsible = $taskDetails['responsible'];
                $type = $taskDetails['type'];
                
                // You can then display the edit form with the task details pre-populated
            } else {
                echo "Task not found.";
            }
            
            $stmt->close();
            
            // Redirect to index.php after handling the edit operation
            header("Location: ../index.php");
            exit;
        } elseif (isset($_POST['create_task'])) {
            // Handle the create operation
            $title = $_POST['title'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $dueDate = $_POST['due_date'];
            $responsible = $_POST['responsible'];
            $type = $_POST['type'];
            
            // Insert a new task into the database
            $sql = "INSERT INTO checklist_tasks (title, description, status, due_date, responsible, type) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $dbConnection->_db->prepare($sql);
            $stmt->bind_param("ssssss", $title, $description, $status, $dueDate, $responsible, $type);
            
            if ($stmt->execute()) {
                // Task created successfully
                // You can redirect to index.php or perform other actions as needed
                header("Location: ../index.php");
                exit;
            } else {
                echo "Error creating the task: " . $stmt->error;
            }
            
            $stmt->close();
        }
        // Optionally, you can add an "else" block here to handle other cases or errors.
    } else {
        echo "Database connection failed.";
    }
    
    $dbConnection->_db->close();
}
?>
