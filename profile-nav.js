// Function to toggle a dropdown by its ID
function toggleDropdown(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
}

// Add event listeners to the dropdown buttons to toggle their respective dropdowns
document.getElementById('dropdown1-btn').addEventListener('click', function () {
    toggleDropdown('dropdown1-content');
});

document.getElementById('profile-pic').addEventListener('click', function (event) {
    var dropdown = document.getElementById('dropdown2-content');
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
    event.stopPropagation(); // Prevent the click event from propagating to the window
});

// Close the dropdowns when clicking outside of them
window.addEventListener('click', function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName('dropdown-content');
        for (var i = 0; i < dropdowns.length; i++) {
            var dropdown = dropdowns[i];
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    }
});
