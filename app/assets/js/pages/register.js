
$(document).ready(function() {           
    // Process form 
    $("#register").ufForm({
        validators: page.validators,
        msgTarget: $("#userfrosting-alerts")
    }).on("submitSuccess", function() {
        // Forward to login page on success
        window.location.replace(site.uri.public + "/account/login");
    }).on("submitError", function() {
        // Reload captcha
        $("#captcha").captcha();
    });
});  