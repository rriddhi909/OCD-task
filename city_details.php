<?php

if (isset($_POST["country"])) {
    // Capture selected country
    $country = $_POST["country"];

    // Define country and city array
    $countryArr = array(
        "United States" => array("New York", "Los Angeles", "California"),
        "India" => array("Mumbai", "New Delhi", "Bangalore"),
        "United Kingdom" => array("London", "Manchester", "Liverpool"),
        "UAE" => array("Dubai", "Sharjah", "Abu Dhabi")
    );

    // Display city dropdown based on country name
    if ($country !== 'Select') {
        echo "<label for='city'>City</label>
                <select id='city' name='city' required>                    
                    <option value=''>Select City</option>";
        foreach ($countryArr[$country] as $value) {
            echo "<option value='" . $value . "'>" . $value . "</option>";
        }
        echo "</select>";
    }
}
?>