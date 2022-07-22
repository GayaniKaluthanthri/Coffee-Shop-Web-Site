function validate_cart_details(x) {
    var fullname = document.getElementById("fullname").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("address").value;
    var address2 = document.getElementById("address2").value;
    var nameoncard = document.getElementById("cc-name").value;
    var cardnumber = document.getElementById("cc-number").value;
    var expiration = document.getElementById("cc-expiration").value;
    var cvv = document.getElementById("cc-cvv").value;
    const pa_fullname = /^[a-z A-Z]{0,120}$/;
    const pa_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const pa_address = /^[a-z A-Z 0-9 , . -]+$/;
    const pa_cardnumber = /^[0-9]{16}$/;
    const pa_expiration = /^((0[1-9])|(1[0-2]))[\/]*((2[5-9])|(5[0-9]))$/;
    const pa_cvv = /^[1-9]{3}$/;
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
    if (address === "") {
        swal("Empty field", "You have to fill Address field to continue", "warning");
        return false;
    }
    if (!(pa_address.test(address))) {
        swal("Invalid field", address + " is not a valid Address. Enter a valid Address to continue", "warning");
        return false;
    }
    if (address2 !== "") {
        if (!(pa_address.test(address2))) {
            swal("Invalid field", address2 + " is not a valid Address. Enter a valid Address to continue", "warning");
            return false;
        }
    }
    if (nameoncard === "") {
        swal("Empty field", "You have to fill Name On Card field to continue", "warning");
        return false;
    }

    if (!(pa_fullname.test(nameoncard))) {
        swal("Invalid field", nameoncard + " is not a valid Name. Enter a valid Name to continue", "warning");
        return false;
    }
    if (cardnumber === "") {
        swal("Empty field", "You have to fill Card Number field to continue", "warning");
        return false;
    }
    if (!(pa_cardnumber.test(cardnumber))) {
        swal("Invalid field", cardnumber + " is not a valid Card Number. Enter a valid Card Number to continue", "warning");
        return false;
    }
    if (expiration === "") {
        swal("Empty field", "You have to fill Expire Date field to continue", "warning");
        return false;
    }
    if (!(pa_expiration.test(expiration))) {
        swal("Invalid field", expiration + " is not a valid Expire Date. Enter a valid Expire Date to continue", "warning");
        return false;
    }
    if (cvv === "") {
        swal("Empty field", "You have to fill CVV field to continue", "warning");
        return false;
    }
    if (!(pa_cvv.test(cvv))) {
        swal("Invalid field", cvv + " is not a valid CVV. Enter a valid CVV to continue", "warning");
        return false;
    }
    return true;
}