<?php
if (isset($_POST['name'])) {
    $insert = false;
    $submit = true;

    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "us-trip"; // Replace with your actual database name

    // Create a connection
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check the connection
    if (!$conn) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    // Retrieve data from the POST request---collect post variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $other = isset($_POST['desc']) ? $_POST['desc'] : ''; // Changed 'other' to 'desc' as per the form field

    // SQL query to insert data into the database
    $sql = "INSERT INTO `trip` (`fname`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Flag for successful insertion
        $insert = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to US Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img class="bg" src="bg.jpg" alt="background image">
        <h1 style="text-align: center; font-size: 20px;">Welcome to the US Travel Form</h1>
        <p>Enter your details to confirm your participation and submit this form.</p>
        
        <?php
        if ($insert == true) {
            echo "<p class='submit-msg'>Thanks for submitting your form for the US trip!</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="text" name="class" id="class" placeholder="Enter your class" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button type="submit" class="btn">Submit</button>
            <button type="reset" class="btn">Reset</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
