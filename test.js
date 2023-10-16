
    var editDialog = document.getElementById('editDialog');
    var editButtons = document.querySelectorAll('button[data-action="edit"]');
    var closeDialogButton = document.getElementById('closeDialog');

    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            openDialog(this.dataset.activityId, this.dataset.name, this.dataset.month, this.dataset.date, this.dataset.time, this.dataset.location, this.dataset.ootd);
        });
    });

    function openDialog(activityId, name) {
        document.getElementById('editId').value = activityId;
        document.getElementById('editName').value = name;
        document.getElementById('editmonth').value = month;
        document.getElementById('editdate').value = date;
        document.getElementById('edittime').value = time;
        document.getElementById('editlocation').value = location;
        document.getElementById('editootd').value = ootd;

        editDialog.showModal();
    }

    closeDialogButton.addEventListener('click', function() {
        editDialog.close();
    });

    editDialog.addEventListener('close', function() {
        // Reset form inputs when the dialog is closed
        document.getElementById('editForm').reset();
    });

