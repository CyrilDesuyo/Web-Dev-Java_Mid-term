function setActivity(activityId) {
    // Get the modal and its elements
    const setActivityModal = document.getElementById("setActivityModal");
    const setActivityForm = document.getElementById("setActivityForm");
    const resultSelect = document.getElementById("result");
    const remarksTextarea = document.getElementById("remarks");
    const activityIdInput = document.getElementById("activityId");

    // Set the form's action URL to the appropriate PHP script
    setActivityForm.action = "set_activity_result.php";

    // Populate the hidden activityId input field
    activityIdInput.value = activityId;

    // Get the current values of result and remarks from the table
    const resultCell = document.querySelector(`td[data-id='${activityId}'][data-field='result']`);
    const remarksCell = document.querySelector(`td[data-id='${activityId}'][data-field='remarks']`);
    const currentResult = resultCell.textContent;
    const currentRemarks = remarksCell.textContent;

    // Set the select box and textarea values to the current values
    resultSelect.value = currentResult;
    remarksTextarea.value = currentRemarks;

    // Display the modal
    setActivityModal.style.display = "block";

    // Close the modal when the close button is clicked
    const setActivityModalClose = document.getElementById("setActivityModalClose");
    setActivityModalClose.addEventListener("click", function () {
        setActivityModal.style.display = "none";
    });
}

// Function to edit activity
function editActivity(activityId) {
    // Implement your code for editing an activity here
    // You can use the activityId to identify the activity to edit
    console.log("Editing activity with ID: " + activityId);
}