<!DOCTYPE html>
<html lang="ES">

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
        <h2>Mis Tareas</h2>
        <a href="#">Todas las Tareas</a>
        <a href="#">Tareas Pendientes</a>
        <a href="#">Tareas en Proceso</a>
        <a href="#">Tareas Completadas</a>
        <h2>Informes</h2>
        <a href="#">Tareas por Tipo</a>
        <a href="#">Tareas por Responsable</a>
        <a href="#">Tareas por Vencimiento</a>
    </div>

    <!-- Main content -->
    <div id="content">
        <h1>Checklist Tracker</h1>
        <!-- Add Task button -->
        <button id="add-task-button">Agregar Tarea</button>
        <!-- Task form -->
        <form id="task-form" action="class/add_task.php" method="POST" style="display: none;">
            <label for="title">Titulo:</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Descripción:</label>
            <textarea id="description" name="description"></textarea>
            <label for="status">Estado:</label>
            <select id="status" name="status">
                <option value="pending">Pendiente</option>
                <option value="in_progress">En Proceso</option>
                <option value="completed">Completada</option>
            </select>
            <label for="due_date">Vencimiento:</label>
            <input type="date" id="due_date" name="due_date">
            <label for="responsible">Responsable:</label>
            <input type="text" id="responsible" name="responsible">
            <label for="type">Tipo:</label>
            <input type="text" id="type" name="type">
            <button type="submit">Crear Tarea</button>
        </form>
        <form id="edit-task-form" action="update_task.php" method="POST">
            <input type="hidden" id="edit-task-id" name="task_id" value="">
            <label for="edit-title">Title:</label>
            <input type="text" id="edit-title" name="title" required>
            <label for="edit-description">Description:</label>
            <textarea id="edit-description" name="description"></textarea>
            <label for="edit-status">Status:</label>
            <select id="edit-status" name="status">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            <label for="edit-due_date">Due Date:</label>
            <input type="date" id="edit-due_date" name="due_date">
            <label for="edit-responsible">Responsible:</label>
            <input type="text" id="edit-responsible" name="responsible">
            <label for="edit-type">Type:</label>
            <input type="text" id="edit-type" name="type">
            <button type="submit">Update Task</button>
        </form>

        <div id="task-list">
            <?php include "class/list_tasks.php"; ?>
        </div>
    </div>
    <!-- Footer -->
    <div id="footer">
        Desarrollado por Yanellys Aguilar | Alvaro Alvarez | Juan Carlos Lozano
    </div>
</body>

</html>