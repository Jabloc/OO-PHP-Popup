// script.js
document.addEventListener("DOMContentLoaded", function () {
    const formButton = document.getElementById("formBtn");
    const openPopupBtn = document.getElementById("openPopupBtn");
    const closePopupBtn = document.getElementById("closePopupBtn");
    const popupContainer = document.getElementById("popupContainer");

    openPopupBtn.addEventListener("click", function() {
        popupContainer.style.display = "flex";
    });

    closePopupBtn.addEventListener("click", function() {
        popupContainer.style.display = "none";
    });

    formButton.addEventListener("click", function () {
        var valid = true;

        // Only validated email and file upload as these were the only required inputs and aren't preset like the select or radios
        // Email validation
        var emailInput = $('#email');
        var emailValue = emailInput.val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailValue === '' || !emailRegex.test(emailValue)) {
            valid = false;
            var rtnTxt = 'Please enter a valid email address.';
        }

        // File validation
        var fileInput = $('#file');
        var file = fileInput[0].files[0];
        
        if (!file) {
            valid = false;
            var rtnTxt = 'Please select a file.';
        } else {
            var fileSize = file.size / 1024 / 1024;
            var allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];

            if (fileSize > 2) {
                valid = false;
                var rtnTxt = 'File size must be under 2MB.';
            } else if (allowedTypes.indexOf(file.type) === -1) {
                valid = false;
                var rtnTxt = 'Only PDF, JPEG, and PNG files are allowed.';
            }
        }

        // If not valid, prevent form submission
        if (!valid) {
            $("#alert").html(rtnTxt);
            $("#alert").css({"background-color": "rgb(206, 136, 136)", "border-color": "rgb(211, 0, 0)"});
            $("#alert").show().delay(3000).hide(1);
        }else{
            var formData = new FormData(document.getElementById("popupForm"));

            $.ajax({
                url: "ajax/handleForm.php",
                type: 'POST',
                data: formData,
                success: function (data) {
                    //console.log(data);
                    if (data == '') {
                        $("#alert").html("Data Submitted.");
                        $("#alert").css({"background-color": "rgb(139, 206, 136)", "border-color": "rgb(7, 211, 0)"});
                        $("#alert").show().delay(3000).hide(1);
                    }else{
                        $('#alert').html(data);
                        $("#alert").css({"background-color": "rgb(206, 136, 136)", "border-color": "rgb(211, 0, 0)"});
                        $("#alert").show().delay(3000).hide(1);
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }

        
    });
});
