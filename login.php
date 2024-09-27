<?php
include("/common/Database.php");
$username = $_POST['username']; 
$password = $_POST['password'];
$result = mysqli_query($conn, "SELECT * FROM  `registration`
    WHERE username IN ('$username') AND Password IN ('$password')");
    while ($row = mysqli_fetch_array($result))
    {
        session_start(); 
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
    
    if($_SESSION['password'] == $password)
    {
        header("Location: /TechLead/index.html?username=$username");
    
    }
    mysqli_close($conn);
    exit;
    }
    $error="Invalid login!";
    echo $error;
    mysqli_close($conn);
    exit;
?>