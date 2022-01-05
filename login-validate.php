<?php
$username = $_POST['uname'];
$password = $_POST['psname'];


if (!empty($username) 
	|| !empty($password))
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
  $QUERY = "SELECT COUNT(username) FROM Customer WHERE username = 'uname' AND password = 'psname' LIMIT 0, 1";
  
  $rnum = mysql_num_rows($QUERY);


  if ($rnum!=0) {
    while ($row = mysql_fetch_assoc($QUERY))
	{
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
		echo "Logged in successfully";
	}
    
  }
  else {
    echo "Incorrect username or password! Please try again!";
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