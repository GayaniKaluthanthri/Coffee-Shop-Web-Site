function validate_user_details() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;

    const pa_name = /^[a-z A-Z]{0,255}$/;
    const pa_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (name === "") {
        swal("Empty field", "You have to fill Name field to continue", "warning");
        return false;
    }

    if (!(pa_name.test(name))) {
        swal("Invalid field", "Name can only contain A-Z a-z and Space", "warning");
        return false;
    }

    if (email === "") {
        swal("Empty field", "You have to fill Email field to continue", "warning");
        return false;
    }

    if (!(pa_email.test(email))) {
        swal("Invalid field", email + " is not a valid Email Address. Enter a valid Email Address to continue", "warning");
        return false;
    }

    if (subject === "") {
        swal("Empty field", "You have to fill Subject field to continue", "warning");
        return false;
    }

    if (!(pa_name.test(subject))) {
        swal("Invalid field", "Subject can only contain A-Z a-z and Space", "warning");
        return false;
    }

    if (message === "") {
        swal("Empty field", "You have to fill Mesasge field to continue", "warning");
        return false;
    }

    return true;

}