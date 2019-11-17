$(document).ready(function() {
    $.ajax({
        type: "get",
        url: "https://opentdb.com/api_category.php",
        beforeSend: function() {
            $("#topics").html("Loading...");
        },
        timeout: 10000,
        error: function(xhr, status, error) {
            alert("Error: " + xhr.status + " - " + error);
        },
        dataType: "json",
        success: function(data) {
            $("#topics").html("");
            $.each(data, function() {
                $.each(this, function(key, value) {
                    $("#topics").append(
                        value.name + "<br>"
                    );
                });
            });
        }
    });
});

function openForm() {
    document.getElementById("myForm").style.display = "block";
}
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}