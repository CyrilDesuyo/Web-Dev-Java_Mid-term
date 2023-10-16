javascript
$(document).ready(function() {
    // Add your PHP code to fetch data from the database and display it in the table here

    // Open the modal when the edit button is clicked
    $('body').on('click', '.edit', function() {
        var activityId = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'fetch.php',
            data: { activityId: activityId },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                $('#activityId').val(result.activityId);
                $('#name').val(result.name);
                $('#month').val(result.month);
                $('#date').val(result.date);
                $('#time').val(result.time);
                $('#location').val(result.location);
                $('#ootd').val(result.ootd);
                $('#result').val(result.result);
                $('#remarks').val(result.remarks);
                $('#myModal').modal('show');
            }
        });
    });

    // Save the updated data when the save button is clicked
    $('#save').click(function() {
        var activityId = $('#activityId').val();
        var name = $('#name').val();
        var month = $('#month').val();
        var date = $('#date').val();
        var time = $('#time').val();
        var location = $('#location').val();
        var ootd = $('#ootd').val();
        var result = $('#result').val();
        var remarks = $('#remarks').val();
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: {
                activityId: activityId,
                name: name,
                month: month,
                date: date,
                time: time,
                location: location,
                ootd: ootd,
                result: result,
                remarks: remarks
            },
            success: function(data) {
                $('#myModal').modal('hide');
                location.reload();
            }
        });
    });
});