$(document).ready(function () {

});

function delete_dia (e) {

    $.ajax({
        method: "POST",
        url: "/logic/ajax/deleteDiagnosis.ajax.php",
        data: {
            dia_id: $($(e).parent().parent().children()[0]).text()
        },
        success: function () {
            location.reload();
        }
    });

}