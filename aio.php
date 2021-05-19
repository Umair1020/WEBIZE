<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname = "practice");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO action  ( email)
VALUES ('john@example.com');";
$sql .= "INSERT INTO action ( email)
VALUES ('mary@example.com');";
$sql .= "INSERT INTO action ( email)
VALUES ('julie@example.com')";
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

$connection = mysql_connect("localhost", "root", ""); // Establishing connection with server..
$db = practice("action", $connection); // Selecting Database.
$email=$_POST['email1']; // Fetching Values from URL.
$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
// check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Invalid Email.......";
}else{
// Matching user input email and password with stored email and password in database.
$result = mysql_query("SELECT * FROM registration WHERE email='$email' AND password='$password'");
$data = mysql_num_rows($result);
if($data==1){
echo "Successfully Logged in...";
}else{
echo "Email or Password is wrong...!!!!";
}
}
mysql_close ($connection); // Connection Closed.
?>