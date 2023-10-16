// Fetch data from the PHP script
fetch('getData.php')
    .then(response => response.json())
    .then(data => {
        const genders = Object.keys(data);
        const genderCounts = Object.values(data);

        // Create the pie chart
        const canvas = document.getElementById('genderChart');
        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: genders,
                datasets: [{
                    data: genderCounts,
                    backgroundColor: ['#FF5733', '#33FF57', '#3366FF', '#FF33E3'], // You can customize colors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Gender Distribution'
                }
            }
        });
    })
    .catch(error => console.error(error));
