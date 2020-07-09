<html>
    <head>
        <title>Contact Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
    <body>

        <div class="container">

            <form action="success.php" method="post" enctype="multipart/form-data">
                <div class="elem-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="John" pattern=[A-Z\sa-z]{3,20} required>
                </div>
                <div class="elem-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Doe" pattern=[A-Z\sa-z]{3,20} required>
                </div>
                <div class="elem-group">
                    <label for="gender">Gender</label>
                    <input type="radio" id="male" name="gender" value="male" checked>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
                <div class="elem-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" required placeholder="0553587896" pattern=[0-9\s]{8,60}>
                </div>

                <div class="elem-group">
                    <label for="country">Country</label>
                    <select id="country" name="country" required>
                        <option value="">Select Country</option>
                        <option value="India">India</option>
                        <option value="UAE">UAE</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                    </select>
                </div>
                <div class="elem-group" id="city_response">
                    <label for="city">City</label>
                    <select id="city" name="city" required>
                        <option value="">Select City</option>
                    </select>
                </div>

                <div class="elem-group">
                    <label for="user_image">Image</label>
                    <input type="file" id="user_image" name="user_image" accept="image/*" required>
                </div>
                <button type="submit">Send Message</button>
            </form>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#country").change(function () {
                var selectedCountry = $("#country option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "city_details.php",
                    data: {country: selectedCountry}
                }).done(function (data) {
                    $("#city_response").html(data);
                });
            });
        });
    </script>
</html>
