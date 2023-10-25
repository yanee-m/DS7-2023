document.addEventListener("DOMContentLoaded", function () {
  const addTaskButton = document.getElementById("add-task-button");
  const addTaskForm = document.getElementById("task-form");
  const submitButton = document.getElementById("submit-button");
  const taskForm = document.getElementById("task-form");

  addTaskButton.addEventListener("click", function (event) {
    event.preventDefault();
    if (addTaskForm.style.display === "block") {
      addTaskForm.style.display = "none"; // Hide the form
    } else {
      addTaskForm.style.display = "block"; // Show the form
    }
  });

  // Close the form only when clicking outside it
  document.addEventListener("click", function (event) {
    if (event.target !== addTaskButton && event.target !== addTaskForm) {
      addTaskForm.style.display = "none";
    }
  });

  // Prevent form closing when interacting with form fields
  addTaskForm.addEventListener("click", function (event) {
    event.stopPropagation();
  });

  taskForm.addEventListener("submit", function () {
    submitButton.disabled = true;
  });
});
