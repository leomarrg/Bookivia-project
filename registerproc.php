<?php
require_once 'connections.php';
if(isset($_SESSION['cEmail']) & !empty($_SESSION['cEmail'])){
	header('location: index.php');
	}
	if(isset($_POST) & !empty($_POST))
	{
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
	  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $status = mysqli_real_escape_string($db, $_POST['status']);
	  //$sql = "SELECT * FROM customer WHERE cEmail = '$email' AND cPassword = '$password'";
    echo $sql = "INSERT INTO bookivia_customers (cFirstName, cLastName, cEmail, cPassword, cStatus) VALUES ('$first_name', '$last_name', '$email', '$password', '$status')";
	  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
	  //$count = mysqli_num_rows($result);
	  if ($result)
	  {
	    $_SESSION['cEmail'] = $email;
			$_SESSION['customerid'] = mysqli_insert_id($db);
	    header("location: index.php");
	  }
	  else
	  {
    //header("location: signup.php?message=2");
	  }
	}
?>
