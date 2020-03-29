$(function() {
    var today = new Date();
    var day = today.getFullYear() + "-" + String(today.getMonth() + 1).padStart(2, '0') + "-" + String(today.getDate()).padStart(2, '0');
    $('#birthDatePicker').datetimepicker({
        viewMode: 'years',
        format: 'DD-MM-YYYY',
        useCurrent: false,
        maxDate: day
    });

    $("#registration").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        if(document.getElementById('registrationForm').checkValidity())
            submitRegistration(e);
        $("#registrationForm").addClass('was-validated');
    });

    $('#registrationForm').find('input').each(function () {
        if ($(this).prop("pattern") || $(this).prop("required"))
            $(this).parent().find("div").append($(this).attr("title"));
    });

    $("body").addClass("stallsBackground");
});

function submitRegistration(e) {
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var passwordconfirmation = $('#passwordconfirmation').val();
    var password = $('#password').val();
    var fiscalCode = $('#CF').val();
    var birth = $('#birthDatePicker input').val();
    var userType = $("input[name='userType']:checked").val();

    if (passwordconfirmation != password) {
        $('#passwordconfirmation').val("");
        Swal.fire({'title': 'Errors', 'text': 'La password non corrisponde.', 'icon': 'error'});
        return false;
    }

    $.ajax({ url : './../api/validationReg.php',
        dataType: 'JSON',
        type : 'POST',
        data: { firstname: firstname, lastname: lastname, fiscalCode: fiscalCode, birth: birth, userType: userType, email: email, password: password },
        success: function(data){
            if(data['error']) {
                Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
            }else{
                Swal.fire({'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1500})
                    .then((result) => { window.location = './login.php'; });
            }
        },
        error: function(jqXHR, exception){
            Swal.fire({'title': 'Errors', 'text': 'There were errors while saving the data.', 'type': 'error'});
        }
    });
}
