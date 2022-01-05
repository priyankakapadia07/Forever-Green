<?php
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['ename'];
$number = $_POST['nname'];
$message = $_POST['mname'];



if (!empty($firstname)
	|| !empty($lastname) 
	|| !empty($email) 
	|| !empty($number) 
	|| !empty($message))
{ 


  $host = "localhost";
  $dbUsername = "ttelang";
  $dbPassword = "jouft<Cr";
  $dbname = "ttelang";
//create conection
$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

if (mysqli_connect_error()) {
	die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
}

else {
  $SELECT = "SELECT * From Contact;
  $INSERT = "INSERT Into Contact (firstname, lastname, email, number, message) values(?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum = $stmt->$num_rows;

  if ($rnum==0) {
    $stmt->close();

    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $number, $message);
  
    $stmt->execute();
    echo "Your message has been received";
  }
  else {
    echo "Oops, there was a problem! Try again!";
  }
 $stmt->close();
 $conn->close();  


}
}
else {
  echo "All fields are required";
  die();
}

?>