document.addEventListener("DOMContentLoaded", function () {
  const addTaskButton = document.getElementById("add-task-button");
  const addTaskForm = document.getElementById("task-form");
  const submitButton = document.getElementById("submit-button");
  const taskForm = document.getElementById("task-form");
  const editButtons = document.querySelectorAll(".edit-button");
  const editTaskForm = document.getElementById("edit-task-form");
  const editTask = document.getElementById("edit-task");
  const editTaskId = document.getElementById("edit-task-id");
  const editTitle = document.getElementById("edit-title");
  const editDescription = document.getElementById("edit-description");
  const editStatus = document.getElementById("edit-status");
  const editDueDate = document.getElementById("edit-due_date");
  const editResponsible = document.getElementById("edit-responsible");
  const editType = document.getElementById("edit-type");

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

  // Function to open the edit task form
  function openEditForm(
    taskId,
    title,
    description,
    status,
    dueDate,
    responsible,
    type
  ) {
    editTaskForm.style.display = "block";
    editTaskId.value = taskId;
    editTitle.value = title;
    editDescription.value = description;
    editStatus.value = status;
    editDueDate.value = dueDate;
    editResponsible.value = responsible;
    editType.value = type;
  }

  // Function to close the edit task form
  function closeEditForm() {
    editTaskForm.style.display = "none";
  }

  // Event listener for form submission
  editTask.addEventListener("submit", function (e) {
    e.preventDefault();
    // Add code to send the updated task details to the server (via AJAX or form submission)
    // Upon successful update, close the edit form
    closeEditForm();
  });

  // Event listener to close the form when clicking outside of it
  document.addEventListener("click", function (event) {
    if (event.target !== editTaskForm) {
      closeEditForm();
    }
  });

  editButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const taskId = button.getAttribute("data-task-id");

      fetchTaskDetails(taskId).then(function (taskDetails) {
        populateEditForm(taskDetails);
        editTaskForm.style.display = "block";
      });
    });
  });

  // Function to fetch task details using AJAX
  function fetchTaskDetails(taskId) {
    return fetch("get_task_details.php?taskId=" + taskId)
      .then((response) => response.json())
      .catch((error) => console.error(error));
  }

  // Function to populate the edit form with task details
  function populateEditForm(taskDetails) {
    document.getElementById("edit-task-id").value = taskDetails.id;
    document.getElementById("edit-title").value = taskDetails.title;
    document.getElementById("edit-description").value = taskDetails.description;
    document.getElementById("edit-status").value = taskDetails.status;
    document.getElementById("edit-due_date").value = taskDetails.due_date;
    document.getElementById("edit-responsible").value = taskDetails.responsible;
    document.getElementById("edit-type").value = taskDetails.type;
  }
});
