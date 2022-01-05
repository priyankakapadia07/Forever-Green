<?php
$username = $_POST['uname'];
$password = $_POST['psname'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['ename'];
$province = $_POST['pname'];
$zip = $_POST['zname'];
$phone = $_POST['nname'];
$address = $_POST['aname'];



if (!empty($firstname)
	|| !empty($lastname)
	|| !empty($username) 
	|| !empty($password) 
	|| !empty($email) 
	|| !empty($province) 
	|| !empty($zip) 
	|| !empty($phone) 
	|| !empty($address))
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
  $SELECT = "SELECT username From Customer Where username = ? Limit 1";
  $INSERT = "INSERT Into Customer (firstname, lastname, username, email, phone, address, password, province, zip) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->bind_result($username);
  $stmt->store_result();
  $rnum = $stmt->$num_rows;

  if ($rnum==0) {
    $stmt->close();

    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sssssssss", $firstname, $lastname, $username, $email, $phone, $address, $password, $province, $zip);
  
    $stmt->execute();
    echo "New record inserted successfully";
  }
  else {
    echo "Someone already registered using this email";
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