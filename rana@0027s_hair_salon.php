<?php
// Get form data
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date = $_POST['date'];
    $message =$_POST['message'];

    // Insert data into table
    $conn = new mysqli('localhost','root', '', 'rana@0027s_hair_salon');
if ($conn->connect_error){
    die('connection Failed :' .$conn->connect_error);
    
} else {
    $stmt = $conn->prepare ("insert into booking from (full name, email, phone number, date, 
    message) values(?,?,?,?,?)");
    $stmt->bind_param ("sissssss", $$full_name, $email, $phone_number, $date, 
    $message);
    $stmt->execute();
    echo "Thank you for booking, we will get back to you as soon as possible";
    $stmt->close();
    $conn->close();
}
}
?> 