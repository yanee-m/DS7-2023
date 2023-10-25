document.addEventListener("DOMContentLoaded", function () {
  const addTaskButton = document.getElementById("add-task-button");
  const taskForm = document.getElementById("task-form");

  addTaskButton.addEventListener("click", function (event) {
    event.preventDefault();
    // Toggle the form display
    taskForm.style.display =
      taskForm.style.display === "block" ? "none" : "block";
    // Reset the form fields
    taskForm.reset();
    // Update the form submit button text
    document.getElementById("add-task-button").textContent = "Crear Tarea";
  });

  // Handle "Editar" (Edit) button clicks
  const editButtons = document.querySelectorAll(".edit-button");
  editButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      // Get the task ID from the button's data attribute
      const taskId = button.getAttribute("data-task-id");

      // Make an AJAX request to fetch task details
      fetchTaskDetails(taskId);
    });
  });
});

function fetchTaskDetails(taskId) {
  // Make an AJAX request to fetch task details from a PHP script
  fetch("class/get_task_details.php?task_id=" + taskId)
    .then((response) => response.json())
    .then((data) => {
      // Populate the form fields with task details
      document.getElementById("task-id").value = taskId;
      document.getElementById("title").value = data.title;
      // Populate other fields similarly
      // Toggle the form display
      taskForm.style.display = "block";
      // Update the form submit button text
      document.getElementById("submit-button").textContent = "Update Task";
    })
    .catch((error) => console.error("Error fetching task details: " + error));
}
