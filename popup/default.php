<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Popup Example</title>
</head>
<body>
    <div class="button-container">
        <button id="openPopupBtn" class="show-popup">Open Popup</button>
    </div>
    <div id="popupContainer" class="popup-container">
        <div class="popup-content">
            <span class="close-popup" id="closePopupBtn">&times;</span>
            <div id="alert" hidden></div>
            <h2>Submit Form</h2>
            <form id="popupForm">
                <label for="dropdown">Dropdown:</label>
                <select id="dropdown" name="dropdown">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select><br>

                <label class="container">Checkbox
                    <input type="checkbox" id="checkbox" name="checkbox" value="true">
                    <span class="checkmark"></span>
                </label>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="file">File Upload:</label>
                <input type="file" id="file" name="file" accept=".pdf, .jpg, .png" required><br>

                <label class="container">One
                    <input type="radio" name="radio_option" value="radio1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Two
                    <input type="radio" name="radio_option" value="radio2">
                    <span class="checkmark"></span>
                </label>

                <button type="button" id="formBtn">Submit</button>
            </form>

    </div>

    <script src="js/script.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</body>
</html>
