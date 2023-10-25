<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist Tracker</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>
    <!-- Navigation bar -->
    <div id="navbar">
        <h2>My Tasks</h2>
        <a href="#">All Tasks</a>
        <a href="#">Pending Tasks</a>
        <a href="#">In Progress Tasks</a>
        <a href="#">Completed Tasks</a>
    </div>

    <!-- Main content -->
    <div id="content">
        <h1>Welcome to Checklist Tracker</h1>
        <!-- Add Task button -->
        <button id="add-task-button">Add Task</button>

        <!-- Task form -->
        <div id="add-task-form">
            <form id="task-form" action="/class/add_task.php" method="POST">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
                <label for="due_date">Due Date:</label>
                <input type="date" id="due_date" name="due_date">
                <label for="responsible">Responsible:</label>
                <input type="text" id="responsible" name="responsible">
                <label for="type">Type:</label>
                <input type="text" id="type" name="type">
                <button type="submit">Create Task</button>
        </div>
        <div id="task-list">
        <?php include "class/list_tasks.php"; ?>
        </div>
</body>

</html>