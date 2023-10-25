document.addEventListener("DOMContentLoaded", function () {
  const addButton = document.getElementById("add-task-button");
  const taskForm = document.getElementById("task-form");

  addButton.addEventListener("click", function () {
    taskForm.style.display = "block";
  });

  document.addEventListener("click", function (event) {
    if (event.target !== addButton && event.target !== taskForm) {
      taskForm.style.display = "none";
    }
  });
});
document.addEventListener("DOMContentLoaded", function () {
  const addTaskButton = document.getElementById("add-task-button");
  const addTaskForm = document.getElementById("add-task-form");
  const formFields = document.querySelectorAll(
    "#add-task-form input, #add-task-form textarea"
  );

  addTaskButton.addEventListener("click", function () {
    addTaskForm.style.display = "block"; // Show the form
  });

  // Prevent form closing when interacting with form fields
  formFields.forEach(function (field) {
    field.addEventListener("click", function (event) {
      event.stopPropagation();
    });
  });
});
