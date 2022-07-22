function validate_user_details(x) {
    var fullname = document.getElementById("fullname").value;
    var email = document.getElementById("email").value;
    var password;
    var confirm;
    if (x == 1) {
        password = document.getElementById("password").value;
        confirm = document.getElementById("confirmPassword").value;
    }
    var nic = document.getElementById("nic").value;
    var mobile = document.getElementById("mobile").value;
    var role = document.getElementById("role").value;

    const pa_fullname = /^[a-z A-Z]{0,120}$/;
    const pa_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const pa_password = /^[a-zA-Z0-9!@#$%^&*\(\)]{8,}$/;
    const pa_nic = /^([0-9]{12}|[0-9]{9}V|[0-9]{9}v)$/;
    const pa_mobile = /^0[0-9]{9}$/;

    if (fullname === "") {
        swal("Empty field", "You have to fill Fullname field to continue", "warning");
        return false;
    }

    if (!(pa_fullname.test(fullname))) {
        swal("Invalid field", "Fullname can only contain A-Z a-z and Space", "warning");
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

    if (role === "3" && x == 1) {
        if (password === "") {
            swal("Empty field", "You have to fill Password field to continue", "warning");
            return false;
        }

        if (!(pa_password.test(password))) {
            swal("Invalid field", "Your password is not a valid Password. Enter a valid Password to continue", "warning");
            return false;
        }

        if (confirm === "") {
            swal("Empty field", "You have to fill Confirm Password field to continue", "warning");
            return false;
        }

        if (password !== confirm) {
            swal("Invalid field", "Your passwords does not match. Enter the correct password to continue", "warning");
            return false;
        }
    }

    if (nic === "") {
        swal("Empty field", "You have to fill NIC Number field to continue", "warning");
        return false;
    }

    if (!(pa_nic.test(nic))) {
        swal("Invalid field", nic + " is not a valid NIC Number. Enter a valid NIC Number to continue", "warning");
        return false;
    }

    if (mobile === "") {
        swal("Empty field", "You have to fill Mobile Number field to continue", "warning");
        return false;
    }

    if (!(pa_mobile.test(mobile))) {
        swal("Invalid field", mobile + " is not a valid Mobile Number. Enter a valid Mobile Number to continue", "warning");
        return false;
    }

    return true;

}