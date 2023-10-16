document.addEventListener("DOMContentLoaded", function () {
    const activityForm = document.getElementById("activityForm");
    const successModal = document.getElementById("successModal");
    const errorModal = document.getElementById("errorModal");

    activityForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(activityForm);

        // Send form data to the PHP backend using fetch or AJAX
        fetch("add_activity.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessModal();
                } else {
                    showErrorModal();
                }
            })
            .catch(() => {
                showErrorModal();
            });
    });

    function showSuccessModal() {
        successModal.style.display = "block";
    }

    function showErrorModal() {
        errorModal.style.display = "block";
    }

    // Close modals when the close button is clicked
    const closeButtons = document.querySelectorAll(".close");
    closeButtons.forEach(button => {
        button.addEventListener("click", function () {
            successModal.style.display = "none";
            errorModal.style.display = "none";
        });
    });
});
