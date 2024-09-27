<?php
include("/common/Database.php");
if(isset($_POST["button1"])){
    $uname = mysqli_real_escape_string($conn, $_POST["username"]);
    $name = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $phoneno = mysqli_real_escape_string($conn, $_POST["phone-number"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $age = mysqli_real_escape_string($conn, $_POST["age-group"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);
    $sql = "INSERT INTO registration (username, `full_name`, email, phone_no, age, `password`)
            VALUES ('$uname', '$name', '$email', '$phoneno', '$age', '$pass')"; 
     if (mysqli_query($conn, $sql)) {
        header("Location: /TechLead/index.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
