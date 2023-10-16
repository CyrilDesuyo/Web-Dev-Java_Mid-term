function editActivity(activityId) {
    const newValues = prompt("Enter the updated values for this activity (name, month, date, time, location, ootd, update, remarks)");

    if (newValues !== null) {
        // Split the entered values into an array
        const valuesArray = newValues.split(',');

        // Ensure there are enough values for the update
        if (valuesArray.length === 8) {
            const name = valuesArray[0].trim();
            const month = valuesArray[1].trim();
            const date = valuesArray[2].trim();
            const time = valuesArray[3].trim();
            const location = valuesArray[4].trim();
            const ootd = valuesArray[5].trim();
            const update = valuesArray[6].trim();
            const remarks = valuesArray[7].trim();

            // Send an AJAX request to update the activity in the database
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_activity.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the table row and database if the update was successful
                    if (xhr.responseText === "success") {
                        const activityRow = document.querySelector('tr[data-id="' + activityId + '"]');
                        if (activityRow) {
                            activityRow.innerHTML = `
                                <td>${name}</td>
                                <td>${month}</td>
                                <td>${date}</td>
                                <td>${time}</td>
                                <td>${location}</td>
                                <td>${ootd}</td>
                                <td>${update}</td>
                                <td>${remarks}</td>
                                <td><button class="edit-button" onclick="editActivity(${activityId})">Edit</button></td>
                                <td><button class="set-activity-button" onclick="setActivity(<?php echo $row['id']; ?>)">Set Activity</button></>
                            `;
                        }
                    } else {
                        alert("Failed to update the activity in the database.");
                    }
                }
            };
            xhr.send("activityId=" + activityId + "&name=" + encodeURIComponent(name) + "&month=" + encodeURIComponent(month) + "&date=" + encodeURIComponent(date) + "&time=" + encodeURIComponent(time) + "&location=" + encodeURIComponent(location) + "&ootd=" + encodeURIComponent(ootd) + "&update=" + encodeURIComponent(update) + "&remarks=" + encodeURIComponent(remarks));
        } else {
            alert("Please enter all required values (name, month, date, time, location, ootd, update, remarks)");
        }
    }
}